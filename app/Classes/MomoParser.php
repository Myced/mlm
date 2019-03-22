<?php
namespace App\Classes;

use App\Models\MomoLog;

class MomoParser
{
    private $response;

    public $receiverNumber;
    public $statusCode;
    public $amount;
    public $transactionID;
    public $processingNumber;

    public $success;
    public $message; // will contain the message for the result

    public function __construct($response)
    {
        $this->response = $response;
    }

    public function parse()
    {
        $decoded = json_decode($this->response);

        $this->extractData($decoded);
        $this->parseResult();
    }

    private function extractData($decoded)
    {
        //now get the fields from the momo response
        $amount = $decoded->{'Amount'};
        $receiverNumber = $decoded->{'ReceiverNumber'};
        $statusCode = $decoded->{'StatusCode'};
        $transactionID = $decoded->{'TransactionID'};
        $processingNumber = $decoded->{'ProcessingNumber'};

        //now put them in the variable
        $this->amount = $amount;
        $this->receiverNumber = $receiverNumber;
        $this->statusCode = $statusCode;
        $this->transactionID = $transactionID;
        $this->processingNumber = $processingNumber;
    }

    private function parseResult()
    {
        //get the status code
        $code = $this->statusCode;

        if($code == "01")
        {
            $this->success = true;
            $this->message = "Payment Successful";
        }
        elseif($code == "515")
        {
            $this->success = false;
            $this->message = "This number does not have a mobile money account";
        }
        elseif($code == "529")
        {
            $this->success = false;
            $this->message = "You don't have enough money in your account. Please Recharge";
        }
        elseif($code == "100")
        {
            $this->success = false;
            $this->message = "Transaction Failed. Declined by user.";
        }
        else{
            $this->success = false;
            $this->message = "Unknown Response";
        }
    }

    public function logResult($order, $number, $momoEmail)
    {
        $log = new MomoLog;

        $log->order_code = $order->order_code;
        $log->user_id = $order->user_id;
        $log->amount = $this->amount;
        $log->user_number = $number;
        $log->receiver_number = $this->receiverNumber;
        $log->momo_email = $momoEmail;
        $log->status_code = $this->statusCode;
        $log->transaction_id = $this->transactionID;
        $log->processing_number = $this->processingNumber;
        $log->raw_response = $this->response;

        //save the log
        $log->save();
    }
}
?>
