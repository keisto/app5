<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Invoice;
use QuickBooksOnline\API\Facades\IPPInvoice;


class AccountingController extends Controller
{

  public function testing() {

// $response = Curl::to('https://appcenter.intuit.com/connect/oauth2')
//   ->withData(array('grant_type' => 'authorization_code',
//                     'client_id' => 'Q03tpCYmueyCRTLLpgrl2XgujqcYtdP3z89G1ntaeLIcmH2EIF',
//                     'respose_type' => 'code',
//                     'scope' => 'com.intuit.quickbooks.accounting',
//                     'state' => 'bearer',
//                   'redirect_uri' => 'https://developer.intuit.com/v2/OAuth2Playground/RedirectUrl'))
//   ->withHeaders(array('authorization: Basic ' .base64_encode('Q03tpCYmueyCRTLLpgrl2XgujqcYtdP3z89G1ntaeLIcmH2EIF'.':'.'m9s4IMFUOJwWd9zCABxosQWR6sVA4bXzLcldyTJF'),
//                       'accept: application/json',
//                       'content-type: application/x-www-form-urlencoded'));


  // ->asJsonRequest()
  // ->asJsonResponse()

    // $response = Curl::to('https://oauth.platform.intuit.com/oauth2/v1/tokens/bearer')
    //   ->withData(array('grant_type' => 'authorization_code',
    //                   'code' => 'code',
    //                   'redirect_uri' => '/connect'))
    //   ->withHeaders(array('authorization: Basic ' .base64_encode('Q03tpCYmueyCRTLLpgrl2XgujqcYtdP3z89G1ntaeLIcmH2EIF'.':'.'m9s4IMFUOJwWd9zCABxosQWR6sVA4bXzLcldyTJF'),
    //                       'accept: application/json',
    //                       'content-type: application/x-www-form-urlencoded'))
    //   ->returnResponseObject()
    //
    //   ->post();


      dd($response);


    }
    public function index()
    {
      // AccountingController::testing();

      $dataService = DataService::Configure(array(
         'auth_mode' => 'oauth2',
         'ClientID' => 'Q03tpCYmueyCRTLLpgrl2XgujqcYtdP3z89G1ntaeLIcmH2EIF',
         'ClientSecret' => 'm9s4IMFUOJwWd9zCABxosQWR6sVA4bXzLcldyTJF',
         'accessTokenKey' => 'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..ED-1VX5S0xP_d-0pKq8dmQ.4nwXmhFDqbjOkfSYhJJa4k1f9MVmgXhvOXxfhhhYeKkFWptz_x9V3BtKKLERqjQs0taWHW0L001jd1t9RlKw8s3NSnbVzMafjJnHjwVrEPHw0yl9btJyH5h1lqX7GHj__5JyH12XnIifrNpFYBtOz4EA3Q23ql6s2bcXfxdBYucbSHTIdRJli36iDnA2-3HBWQ5yRtPSLr05ahwIVfd3zjzHPjqsTC0LO4kWr-G3ClgtDSVGpMRr7sRy3OALmfB8rTocjGQf_iDtCnZx7NL3A6ppAgGlZ3mv_SFrXqhZXqdZ3dy8_uz84zDh8e6nn1AijB1SOdCYEnloyO9n22tLULIatgMqFLX9PZBLqiWwhmEqrBA4Tb0xX4fnkdzPOi68yth4WpSr3BOeBEgLPM0m0oCUattqk1-H2G0danm4Bn9KPWv3XitPL1grOV-NQuyOzqgp14ckGf0-Cj98hi8uIbOFgluXlfFzHlzKzng8L_xqWV6OiGzbTmnzj1WB3UwTl6witdCo1B8fuvvUtr6ZlJoRvSjlYtG5rvFq3mmDETLWN9b_HBFIzpGlA5qrnlzgkd8E3pclBDPAaFWgwwxkL7UVZXhEDxlwiySZu3eAvtZsIR2ftY8lOju7lrtG6OLIEleM4a6sc1dm_qoFd7Ukqp82bQi_R3OfG0-qjNf0JNGHR6J72ADkiqz8W2wRjcDk.ahrqFlIL8PMc4pL2A6DCkA',
         'refreshTokenKey' => 'Q011516335098jhdkjYo2ilyf24mQDChsegznpKoGgdx9iNsou',
         'QBORealmID' => "193514618129324",
         'baseUrl' => "https://sandbox-quickbooks.api.intuit.com/"
      ));
      $dataService->setMinorVersion("12");


      // if (session()->has('accounting')) {
      //   $start_time = session()->get('accouting.start_time');
      //   $current_time = Carbon::now();
      //   $time_diff = $current_time->diffInMinutes($start_time, true);
      //   $timeout_time = session()->get('accounting.expires_in');
      //
      //   if ($time_diff >= $timeout_time) {
      //     // Refresh session
      //     $start_time = session()->put('accouting.start_time', Carbon::now());
      //     $expires_in = session()->put('accouting.expires_in', 60);
      //     $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();
      //     $accessToken = $OAuth2LoginHelper->refreshToken();
      //   }
      //
      // } else {
      //     // New session
      //     $start_time = session()->put('accouting.start_time', Carbon::now());
      //     $expires_in = session()->put('accouting.expires_in', 60);
      //     $renew_in = session()->put('accouting.renew_in', 100);
      // }


      // Refresh Token
      $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();
      $accessToken = $OAuth2LoginHelper->refreshToken();
      $error = $OAuth2LoginHelper->getLastError();
      if ($error != null) {
          echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
          echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
          echo "The Response message is: " . $error->getResponseBody() . "\n";
          return;
      }
      $dataService->updateOAuth2Token($accessToken);

      // $allInvoices = $dataService->Query("SELECT * FROM Invoice");

      $serviceContext = $dataService->getServiceContext();
      $CompanyInfo = $dataService->getCompanyInfo();

      $allLines = $dataService->Query("SELECT * FROM Invoice where docNumber='1070'");
      // $allLines = $dataService->Query("SELECT * FROM Item");

      // $myInvoiceObj = Invoice::create([
      //   "DocNumber" => "1070",
      //   "LinkedTxn" => [],
      //   "Line" => [[
      //       "Id" => "1",
      //       "LineNum" => 1,
      //       "Amount" => 55.0,
      //       "DetailType" => "SalesItemLineDetail",
      //       "SalesItemLineDetail" => [
      //           "ItemRef" => [
      //               "value" => "9",
      //               "name" => "Roustabout"
      //           ],
      //           "TaxCodeRef" => [
      //               "value" => "NON"
      //           ]
      //       ]
      //   ], [
      //       "Amount" => 999999999999990.0,
      //       "DetailType" => "SubTotalLineDetail",
      //       "SubTotalLineDetail" => []
      //   ]],
      //   "CustomerRef" => [
      //       "value" => "1",
      //       "name" => "Keiser Construction"
      //   ]
      // ]);
      // $resultingInvoiceObj = $dataService->Add($myInvoiceObj);
      // dd($resultingInvoiceObj);

      dd($allLines);
      return view('accounting.quickbooks');
    }
}
