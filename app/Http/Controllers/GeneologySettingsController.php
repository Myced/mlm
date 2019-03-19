<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneologyDepth;

class GeneologySettingsController extends Controller
{
    public function index()
    {
        return 'index';
    }

    public function showDepth()
    {
        //get the settings first
        $depth =  GeneologyDepth::find(1); // the first row will be used
        return view('admin.settings_depth')->with('depth', $depth);
    }

    public function saveDepth(Request $request)
    {
        $depthValue = $request->depth;

        if(empty($depthValue))
        {
            session()->flash('success', 'Depth value is required');
            return back();
        }

        $depth  = GeneologyDepth::find(1);

        if(is_null($depth))
        {
            $depth = new GeneologyDepth;
        }

        $depth->depth = $depthValue;

        $depth->save();

        session()->flash('success', 'Geneology depth saved');
        return back();
    }
}
