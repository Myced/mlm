<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\UserData;
use Illuminate\Http\Request;
use App\Classes\GeneologyManager;

class UserGeneologyController extends Controller
{
    protected $user;

    public function index()
    {
        //get the geneology of the currently logged in user

        $user = $this->getUser();

        $manager = new GeneologyManager($user);
        $geneology = $manager->getGeneologyTree();

        $geneologyJSON = json_encode($geneology);

        return view('user.geneology_tree', compact('geneologyJSON'));
    }

    public function tabular()
    {
        $user = $this->getUser();

        $manager = new GeneologyManager($user);
        $geneology = $manager->getGeneologyTree();

        $data = $manager->levelData;

        return view('user.geneology_tabular', compact('data'));
    }

    public function statistics()
    {
        $manager = new \App\Classes\GeneologyManager($this->getUser());
        $stats = new \App\Classes\GeneologyStatistics($manager);

        return view('user.geneology_statistics', compact('stats'));
    }

    public function getUser()
    {
        if(!is_null($this->user))
        {
            return $this->user;
        }
        else {
            $this->setUser();
        }

        return $this->user;
    }

    private function setUser()
    {
        $this->user = auth()->user();
    }
}
