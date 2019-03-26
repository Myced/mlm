<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Classes\GeneologyManager;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::latest()->get();

        return view('admin.customers', compact('customers'));
    }

    public function view(User $user)
    {
        return view('admin.customer', compact('user'));
    }

    public function tree(User $user)
    {

        $manager = new GeneologyManager($user);
        $geneology = $manager->getGeneologyTree();

        $geneologyJSON = json_encode($geneology);

        return view('admin.customer_tree', compact('user', 'geneologyJSON'));
    }

    public function table(User $user)
    {
        $manager = new GeneologyManager($user);
        $geneology = $manager->getGeneologyTree();

        $data = $manager->levelData;

        return view('admin.customer_table', compact('user', 'data'));
    }

    public function commissions(User $user)
    {
        return view('admin.customer_commissions', compact('user'));
    }


}
