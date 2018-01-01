
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/Example.vue'));
//
//const app = new Vue({
//    el: '#app'
//});


//...

$(document).ready(function () {
    $('#notification').hide();
//    if(Laravel.userId) {
//        //...
//        window.Echo.private(`App.Doctor.${Laravel.userId}`)
//            .notification((notification) => {
//                addNotifications([notification], '#notifications');
//                console.log(notification);
//            });
//    }
    //alert(Laravel.userId);
    if (Laravel.userId) {
        Echo.channel(`doctorRequested${Laravel.userId}`).listen('DoctorRequested', function (e) {
            //alert(e.patient.name);
            // alert(Laravel.userId);
            $messageText = "Patient " + e.patient.name +" Needs a Doctor Near Your Location" ;
            $('#notification').show();
            $('#message').html($messageText);
            $('#patient_id').val(e.patient.id);

            // console.log(e);
        });
    }
});
