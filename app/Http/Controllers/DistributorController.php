<?php

namespace App\Http\Controllers;

use App\User;
use App\UserLevel;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Classes\DistributorManager;

class DistributorController extends Controller
{
    public function index()
    {
        $level = UserLevel::DISTRIBUTOR;
        $distributors = User::where('level', '=', $level)->get();

        return view('admin.distributors', compact('distributors'));
    }

    public function create()
    {
        $regions = Region::all();

        return view('admin.add_distributor', compact('regions'));
    }

    public function store(Request $request)
    {
        $distributor = new User;

        $manager = new DistributorManager($distributor);
        $manager->save($request);

        session()->flash('success', 'Distributor Registered');
        return back();
    }

    public function view($id)
    {
        $user = User::find($id);

        $manager = new \App\Classes\GeneologyManager($user);
        $stats = new \App\Classes\GeneologyStatistics($manager);

        return view('admin.distributor', compact('user', 'stats'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $regions = Region::all();

        return view('admin.edit_distributor', compact('user', 'regions'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $manager = new DistributorManager($user);
        $manager->update($request);

        session()->flash('success', 'Distributor Information updated');

        return back();
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $avatar = $user->userData->avatar;

        $this->deleteAvatar($avatar);

        $user->delete();

        session()->flash('success', 'Distributor Deleted');

        return back();
    }

    private function deleteAvatar($avatar)
    {
        if($avatar != User::DEFAULT_AVATAR)
        {
            $length = strlen($avatar);

            $name = substr($avatar, 1, $length);

            if(file_exists($name))
            {
                unlink($name);
            }
        }
    }
}
