<?php

namespace App\Http\Controllers\Networkfleet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ixudra\Curl\Facades\Curl;

class AssetsController extends Controller
{
    public static function getAssets()
    {
      $response = Curl::to('https://api.networkfleet.com/vehicles')
        ->withHeaders(array('accept: application/vnd.networkfleet.api-v1+xml',
                            'authorization: Bearer ' . session()->get('networkfleet.access_token'),
                            'cache-control: no-cache',
                            'content-type: application/vnd.networkfleet.api-v1+json'))
        ->returnResponseObject()
        ->get();


        $xml = simplexml_load_string($response->content);


        $array = array();
        foreach($xml as $item) {
            if (isset($item->label)) {
                if (explode(" ", $item->label)[1] == "RT"){
//                        array_push($array, );
//                  dump('string: '. (string)$item->label);
                    $label = (string)$item->label;
                    $coordinates = AssetsController::getLocationforAsset($item->label);
//                    dd($coordinates);
                    if ($coordinates!=null) {
                        $array[] = array('label'=> $label, 'latitude' => explode(", ", $coordinates)[0],
                            'longitude' => explode(", ", $coordinates)[1]);

//
//                        array_push($array, $item);
                    }
                }
            }
        }
        asort($array);
        return $array;
        // if($response->access_token) {
        //   // set session variables
        //   SessionController::createSession($response);
        //   return true;
        // } else {
        //   // Verizon networkfleet session failed...
        //   return false;
        // }
    }

    public static function getLocationforAsset($value)
    {
      $safeValue = urlencode($value);
      $response = Curl::to('https://api.networkfleet.com/locations?with-label='. $safeValue)
        ->withHeaders(array('accept: application/vnd.networkfleet.api-v1+xml',
                            'authorization: Bearer ' . session()->get('networkfleet.access_token'),
                            'cache-control: no-cache',
                            'content-type: application/vnd.networkfleet.api-v1+json'))
        ->returnResponseObject()
        ->get();

        $xml = simplexml_load_string($response->content);
//        dump((string)$xml->gpsMessage->latitude);
//        dump((string)$xml->gpsMessage->longitude);
//        dd($xml);
        $array = array();
//        dump($value);
//        dd((string)$xml->gpsMessage->latitude);
        foreach($xml as $item) {
//            dump($item);
//            if (isset($item->label)) {
//                dump((string)$item->latitude);
//                dump((string)$item->longitude );
//                dd($item);
              return (string)$xml->gpsMessage->latitude . ', ' . (string)$xml->gpsMessage->longitude;
//          }
        }
        asort($array);
        dd("failed");
        return null;

    }
}
