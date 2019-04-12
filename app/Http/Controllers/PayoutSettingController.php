<?php

namespace App\Http\Controllers;

use App\Functions;
use Illuminate\Http\Request;
use App\Models\PayoutSetting;

class PayoutSettingController extends Controller
{
    public function index()
    {
        $payout = PayoutSetting::find(1);

        return view('admin.settings_payout', compact('payout'));
    }

    public function store(Request $request)
    {
        $payout = PayoutSetting::find(1);

        if(is_null($payout))
        {
            $payout = new PayoutSetting;

            $payout->id = 1;
        }

        $payout->minimum = Functions::getMoney($request->minimum);
        $payout->maximum = Functions::getMoney($request->maximum);

        $payout->save();

        session()->flash('success', 'Payout Amounts updated');

        return back();
    }
}
