<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Validator;

class BulkSmsController extends Controller
{
    /*
    *Method receives a request, with phone numbers and a text message
    *sends a message to the numbers passed and redirects back to the message page
    *code done following the tutorial bellow
    *https://www.twilio.com/blog/send-bulk-sms-twilio-laravel-php
    */
    
    public function sendSms( Request $request )
    {
       // Your Account SID and Auth Token from twilio.com/console
       $sid    = env( 'TWILIO_SID' );
       $token  = env( 'TWILIO_TOKEN' );
       $client = new Client( $sid, $token );

       $validator = Validator::make($request->all(), [
           'numbers' => 'required',
           'message' => 'required'
       ]);

       if ( $validator->passes() ) {

           $numbers_in_arrays = explode( ',' , $request->input( 'numbers' ) );

           $message = $request->input( 'message' );
           $count = 0;

           foreach( $numbers_in_arrays as $number )
           {
               $count++;

               $client->messages->create(
                   $number,
                   [
                       'from' => env( 'TWILIO_FROM' ),
                       'body' => $message,
                   ]
               );
           }

           return view('message.create')->with( 'success', $count . " messages sent!" );
              
       } else {
           return view('message.create')->withErrors( $validator );
       }
   }
}
