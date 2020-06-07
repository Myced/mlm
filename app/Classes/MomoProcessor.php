<?php
namespace App\Classes;

ini_set('max_execution_time', 180); // 120 (seconds) = 2 Minutes
ini_set('default_socket_timeout', 180);

class MomoProcessor
{
    protected $amount;
    protected $number;

    private $momoEmail = 'tncedric@yahoo.com';

    private $url;

    public function __construct($number, $amount, $momoEmail)
    {
        $this->number = $number;
        $this->amount = $amount;
        $this->momoEmail = $momoEmail;

        $this->prepareURL();
    }

    private function prepareURL()
    {
        $url  = "https://developer.mtn.cm/OnlineMomoWeb/faces/transaction/transactionRequest.xhtml"."?idbouton=2&typebouton=PAIE&_amount="
                . $this->amount . "&_tel="
                . $this->number ."&_clP=Cedric@2017"."&_email="
                . $this->momoEmail . "&submit.x=104&submit.y=70";

        $this->url = $url;
    }

    public function pay()
    {
        // $response = @file_get_contents($this->url);

        // $response = $this->makeRequest();


        $response = '{"ReceiverNumber":"237673901939","StatusCode":"01",
                    "Amount":"80500","TransactionID":null,
                    "ProcessingNumber":"152951799903033605854680843",
                    "OpComment":"Transaction failed",
                    "StatusDesc":"TARGET_AUTHORIZATION_ERROR",
                    "SenderNumber":"237673901939",
                    "OperationType":"RequestPaymentIndividual"}';

        $this->response = $response;

        return $response;
    }

    protected function makeRequest()
    {
        $ch = curl_init($this->url); // such as http://example.com/example.xml
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);

        // $ch = curl_init();
        //
        // //setup url
        // curl_setopt($ch, CURLOPT_URL, $this->url); // the url already contains the arguments.
        //
        // // Make sure we can access the response when we execute the call
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //
        // $data = curl_exec($ch);
        //
        // if ($data === false) {
        //     return array('error' => 'API call failed with cURL error: ' . curl_error($ch));
        // }
        //
        // //close the curl call
        // curl_close($ch);

        //else return the result
        return $data;
    }
}
?>
