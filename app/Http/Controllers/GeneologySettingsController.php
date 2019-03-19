<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneologyDepth;
use App\Models\GeneologyLevel;

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

    public function levels()
    {
        $levels = GeneologyLevel::all()->toArray();
        $depth = GeneologyDepth::find(1)->depth;

        return view('admin.settings_levels', compact('levels', 'depth'));
    }

    public function saveLevels(Request $request)
    {
        // dd($request);
        $depth = GeneologyDepth::find(1)->depth;

        for($i = 1; $i <= $depth; $i++)
        {
            $name = "level" . $i;

            $value = $request->$name;

            $this->saveUniqueLevel($i, $value);
        }

        session()->flash('success', 'Level Benefits Saved');

        return back();
    }

    private function saveUniqueLevel($level, $value)
    {
        $level = GeneologyLevel::where('level', '=', $level)->first();

        if(is_null($level))
        {
            $level = new GeneologyLevel;

            $level->level = $level;
        }

        $level->benefit = $value;

        $level->save();
    }
}
