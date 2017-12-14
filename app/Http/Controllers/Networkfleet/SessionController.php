<?php

namespace App\Http\Controllers\Networkfleet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Carbon\Carbon;

class SessionController extends Controller
{
  /**
   * [connect to networkfleet api]
   * @method connect
   * @return [boolean]  [connection]
   */
  public static function connect()
  {
    $response = Curl::to('https://auth.networkfleet.com/token')
      ->withData(array('grant_type' => 'password',
                      'password' => 'titanadmin',
                      'username' => 'titanoil'))
      ->withHeaders(array('authorization: Basic dGl0YW5vaWw6dGl0YW5hZG1pbg==',
                          'cache-control: no-cache',
                          'content-type: application/x-www-form-urlencoded'))
      ->asJsonRequest()
      ->asJsonResponse()
      ->get();

      if($response->access_token) {
        // set session variables
        SessionController::createSession($response);
        return true;
      } else {
        // Verizon networkfleet session failed...
        return false;
      }
  }

  public static function reconnect()
  {
    $response = Curl::to('https://auth.networkfleet.com/token')
      ->withData(array('grant_type' => 'refresh_token',
                      'refresh_token' => session()->get('networkfleet.refresh_token')))
      ->withHeaders(array('authorization: Basic dGl0YW5vaWw6dGl0YW5hZG1pbg==',
                          'content-type: application/x-www-form-urlencoded' ))
      ->asJsonRequest()
      ->asJsonResponse()
      ->get();

      if($response->access_token) {
        // set session variables
        SessionController::createSession($response);
        return true;
      } else {
        // Verizon networkfleet session failed...
        return false;
      }
  }

  /**
   * [check if session to networkfleet api expired]
   * @method session
   * @return [boolean]  [connect or reconnect]
   */
  public static function session()
  {
    if (session()->has('networkfleet')) {
      // check timeout
      $start_time = session()->get('networkfleet.start_time');
      $current_time = Carbon::now();
      $time_diff = $current_time->diffInMinutes($start_time, true);
      $timeout_time = session()->get('networkfleet.expires_in');

      if ($time_diff >= $timeout_time) {
        return SessionController::reconnect();
      } else {
        return true;
      }
    } else {
      return SessionController::connect();
    }
  }

  public static function createSession($response)
  {
    if (session()->has('networkfleet')) {
      session()->forget('networkfleet.access_token');
      session()->forget('networkfleet.refresh_token');
      session()->forget('networkfleet.expires_in');
      session()->forget('networkfleet.start_time');
    } else {
      session()->put('networkfleet.access_token', $response->access_token);
      session()->put('networkfleet.refresh_token', $response->refresh_token);
      session()->put('networkfleet.expires_in', $response->expires_in);
      session()->put('networkfleet.start_time', Carbon::now());
    }
  }
}
