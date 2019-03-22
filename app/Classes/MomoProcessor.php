<?php
namespace App\Classes;

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
                . $this->number ."&_clP=tncedric"."&_email="
                . $this->momoEmail . "&submit.x=104&submit.y=70";

        $this->url = $url;
    }

    public function pay()
    {
        // $response = file_get_contents($this->url);


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
}
?>
