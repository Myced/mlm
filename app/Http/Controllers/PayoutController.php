<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\UserData;
use App\Models\UserPayout;
use Illuminate\Http\Request;
use App\Models\PayoutSetting;

class PayoutController extends Controller
{
    protected $months = [];
    protected $years = [];

    public function __construct()
    {
        // initialise the month and $years
        $startYear = 2019;
        $endYear = date("Y");

        for($i = $startYear; $i <= $endYear; $i++)
        {
            array_push($this->years, $i);
        }

        $months = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December'
        ];

        $this->months = $months;
    }

    public function orange()
    {

        return User::find(1);
    }

    public function mtn()
    {
        $beneficiaries = $this->getBeneficiaries("mtn");

        $amountPaid = 0;

        foreach($beneficiaries as $payout)
        {
            if($payout->paid == true)
            {
                $amountPaid += $payout->amount;
            }
        }

        $amountLeft = $beneficiaries->sum('amount') - $amountPaid;

        $months  = $this->months;
        $years = $this->years;

        return view("admin.payout_mtn", compact('months', 'years',
                                                'beneficiaries', 'amountPaid',
                                                'amountLeft'));
    }

    public function refresh()
    {
        //first get the payouts for this month.
        $month = date("m");
        $year = date("Y");
        $network = request()->network;

        $beneficiaries = UserPayout::where('month', '=', $month)
                                    ->where('year', '=', $year)
                                    ->get();
        $beneficiaryArray = $beneficiaries->pluck('user_id')->all();

        //get the payout settings.
        $payoutSetting = PayoutSetting::find(1);

        //get all the customers for this network
        //then process them in chunks
        $customers = UserData::where('payout_network', '=', $network)->get();

        foreach($customers->chunk(200) as $chunk)
        {
            //loop through each chunk
            foreach($chunk as $userData)
            {
                //chck that the user has commissions.
                if($userData->user == null)
                {
                    //avoid any errors
                    continue;
                }

                if(in_array($userData->user_id, $beneficiaryArray))
                {
                    //this user payout is already set.
                    //check that he is not paid yet.
                    $userPayout = UserPayout::where('month', '=', $month)
                                                ->where('year', '=', $year)
                                                ->where('user_id', '=', $userData->user_id)
                                                ->first();

                    if($userPayout->paid == true)
                    {
                        continue;
                    }
                    else {

                        //seee if there is a change in his commissions
                        $commissions = $userData->user->unpaidCommissions();
                        $commAmount = $commissions->sum('commission');
                        $commString = $this->serialiseCommissions($commissions);

                        if(round($commAmount, 0) > $userPayout->amount)
                        {
                            //the amount has change. Update it
                            $userPayout->amount = round($commission, 0);
                            $userPayout->commissions = $commString;
                            $userPayout->save();
                            continue;
                        }
                    }
                }

                $commissions = $userData->user->unpaidCommissions();

                $commAmount = $commissions->sum('commission');

                $comString = $this->serialiseCommissions($commissions);

                if($commAmount >= $payoutSetting->minimum)
                {
                    $userPayout = $this->saveUserPayout($userData->user, $commAmount, $network, $comString);

                }
            }
        }

        session()->flash('success', 'Table Refreshed and updated');
        return back();
    }

    public function failed()
    {
        $payouts = UserPayout::where('failed_at', '<>', 'null')->get()->sortByDesc('failed_at');

        return view('admin.payouts_failed', compact('payouts'));
    }

    private function getBeneficiaries($network)
    {
        if(isset(request()->month))
        {
            $month = request()->month;
        }
        else {
            $month  = date("m");
        }

        if(isset(request()->year))
        {
            $year  = request()->year;
        }
        else {
            $year = date("Y");
        }

        $beneficiaries = UserPayout::where('month', '=', $month)
                                    ->where('year', '=', $year)
                                    ->get();

        if($beneficiaries->count() == 0)
        {
            //if its the current month, then try to create those
            // payouts
            if($month == date('m') && $year == date("Y"))
            {
                //move previous beneficiaries
                $this->movePreviousPayouts($month, $year);

                $this->createPayouts($network);

                $beneficiaries = UserPayout::where('month', '=', $month)
                                            ->where('year', '=', $year)
                                            ->get();
            }
        }

        return $beneficiaries;
    }

    private function movePreviousPayouts($month, $year)
    {
        $previousMonth = $month -1;

        if(strlen($previousMonth) == 1)
        {
            $previousMonth = '0' . $previousMonth;
        }

        //get the payouts for that period
        $payouts = UserPayout::where('month', '=', $previousMonth)
                                    ->where('year', '=', $year)
                                    ->get();

        foreach($payouts as $payout)
        {
            if($payout->paid == false)
            {
                $payout->markAsMoved();
            }
        }
    }

    private function createPayouts($network)
    {
        //get the payout settings.
        $payoutSetting = PayoutSetting::find(1);

        //get all the customers for this network
        //then process them in chunks
        $customers = UserData::where('payout_network', '=', $network)->get();

        foreach($customers->chunk(200) as $chunk)
        {
            //loop through each chunk
            foreach($chunk as $userData)
            {
                //chck that the user has commissions.
                if($userData->user == null)
                {
                    //avoid any errors
                    continue;
                }

                $commissions = $userData->user->unpaidCommissions();

                $commAmount = $commissions->sum('commission');

                $comString = $this->serialiseCommissions($commissions);

                if($commAmount >= $payoutSetting->minimum)
                {
                    $userPayout = $this->saveUserPayout($userData->user, $commAmount, $network, $comString);

                }
            }
        }
    }

    private function saveUserPayout($user, $amount, $network, $commissionsString)
    {
        //check that it has not been paid for this month
        $month = date('m');
        $year  = date("Y");

        $monthName = $this->months[$month];


        //check that the statistics do not exist for this month
        $userPayout = UserPayout::where('month', '=', $month)
                                    ->where('year', '=', $year)
                                    ->where('user_id', '=', $user->id)
                                    ->first();

        if(is_null($userPayout))
        {
            $userPayout = new UserPayout;

            $userPayout->user_id = $user->id;
            $userPayout->month = $month;
            $userPayout->month_name = $monthName;
            $userPayout->year = $year;
            $userPayout->network = $network;
            $userPayout->amount = round($amount, 0);
            $userPayout->commissions = $commissionsString;

            $userPayout->save();

        }
        else {
            if($userPayout->paid == false)
            {
                $userPayout->amount = round($amount, 0);
                $userPayout->network = $network;
                $userPayout->commissions = $commissionsString;

                $userPayout->save();
            }
            else {
                //do not save the new amount
                // since it the previous one has already been paid
            }
        }

        return $userPayout;

    }

    private function serialiseCommissions($commissions)
    {
        $string = '';
        for($i = 0; $i < $commissions->count(); $i++)
        {
            $string .= $commissions[$i]->id;

            if($i < $commissions->count() - 1)
                $string .=',';
        }

        return $string;
    }
}
