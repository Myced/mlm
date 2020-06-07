<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanySetting;

class SettingsController extends Controller
{
    public function index()
    {
        $company = CompanySetting::find(1);

        return view('admin.settings_company', compact('company'));
    }

    public function saveCompany(Request $request)
    {
        $company = CompanySetting::find(1);

        if(is_null($company))
        {
            $company = new CompanySetting;
        }

        //save the information
        $company->name = $request->name;
        $company->abbreviation = $request->abbreviation;
        $company->tel = $request->tel;
        $company->email = $request->email;
        $company->address = $request->address;

        if(!empty($request->logo))
        {
            $company->logo = $this->saveLogo($request->logo);
        }

        $company->save();

        session()->flash('success', 'Company Information Saved');

        return back();
    }

    private function saveLogo($file)
    {
        $name = time() . $file->getClientOriginalName();
        $path = CompanySetting::LOGO_PATH;

        $file->move($path, $name);

        return '/' . $path . $name;
    }
}
