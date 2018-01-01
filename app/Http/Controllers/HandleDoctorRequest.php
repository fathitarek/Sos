<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Patient;
use App\Events\DoctorRequested;
use App\Http\Controllers\GeneralClass;
use Auth ;
use App\Models\visit ;

class HandleDoctorRequest {

  public $database;
  public $patient ;

    public function __construct()
    {
        $firebase = GeneralClass::firebaseGenral();
        $this->database = $firebase->getDatabase();
        //$this->middleware('doctor_api_auth') ;
    }

    public function filter ($speciality_id , $patient)
    {

      // order the reference's children by the values in the field 'specialty_id' in ascending order
      $reference = $this->database->getReference('users')->orderByChild('specialty_id')->equalTo($speciality_id);
      $snapshot = $reference->getSnapshot();
      $value = $snapshot->getValue();
      $this->patient = $patient ;
      $doctors = $this->getDoctorWithinDistance($value);

      $visit = new visit();
      $visit->patient_id = $this->patient->id ;
      $visit->status = 1 ;
      $visit->start_time = date("G:i:s") ;

      return $visit ;
    }

    public function getDoctorWithinDistance($obj) {
        $arrayOfdoctors = [];
        foreach ($obj as $key => $value) {
            $id = $key;
            $latitude = $value['latitude'];
            $longitude = $value['longitude'];
            $doctor = array();
            $doctor['id'] = $id;
            $doctor['latitude'] = $latitude;
            $doctor['longitude'] = $longitude;
            $distance = $this->getDifrrentDistance('30.0444', '31.2357', $doctor['latitude'], $doctor['longitude']);
            if ($distance <= 10000) {
                array_push($arrayOfdoctors, $doctor);
                $this->requestDoctor($doctor['id'], "search");
            }
        }
        return $arrayOfdoctors;
    }

    public function getDifrrentDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
    {

        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
    }


        public function requestDoctor($id, $type)
        {
            $doctor = Doctor::find($id);
            $patient = Patient::find($this->patient);
            // dd($this->patient);
            if ($doctor) {
                if ($doctor->mobile_identifier && $doctor->isActive())
                    if ($type == "search") {
                        event(new DoctorRequested($doctor , $patient));
                        //$doctor->notify(new DoctorRequested());
                        // $this->sendNotification($doctor->mobile_identifier, "Search", "Doctor Needed", "Data");
                    } else if ($type == "request") {
                        event(new DoctorRequested($doctor , $patient));
                        // $doctor->notify(new DoctorRequested());
                        // $this->sendNotification($doctor->mobile_identifier, "Request", "Connet to Patient", "Data");
                    }
                return response()->json(['message' => 'Notification Sent to ' . $doctor->name]);
            } else {
                return response()->json(['message' => 'Requested Doctor Not Found']);
            }
        }

        public function sendNotification($userIdentifiers, $notification_title, $notification_body, $data)
        {
            $users = null;
            $content = array($notification_title => $notification_body);
            if (is_array($userIdentifiers))
                $users = $userIdentifier;
            else
                $users = [$userIdentifiers];

            $response = $this->sendMessage($users , $data);
        }

        public function sendMessage($users , $data)
        {

            $content = array(
                "en" => $data
            );

            $fields = array(
                'app_id' => "394c719f-6ff8-40ea-a91c-716284e412f0",
                'include_player_ids' => $users ,
                'data' => array("foo" => "bar"),
                'contents' => $content
            );

            $fields = json_encode($fields);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8','Authorization: Basic N2FkZDhiYTItMzA4Mi00Mzg0LTkwNTYtMzkxOGQ4MmM1NzQ1'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            $response = curl_exec($ch);
            curl_close($ch);

            return $response;

        }

}
