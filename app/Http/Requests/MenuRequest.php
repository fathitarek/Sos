<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
      switch($this->method())
      {
          case 'GET':
          case 'DELETE':
          {
              return [];
          }
          case 'POST':
          {
              return [
                  'name' => 'required',
                  'display_name' => 'required',
                  'url' => 'required',
              ];
          }
          case 'PUT':
          case 'PATCH':
          {
              return [
                'name' => 'required',
                'display_name' => 'required',
                'url' => 'required',
              ];
          }
          default:break;
      }
  }

 public  $messages = array(
                        'name.required' => 'Please enter menu name',
                        'display_name.required' => 'Please enter display name',
                        'url.required' => 'Please enter display name',

       );
}
