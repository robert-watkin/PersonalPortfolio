<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class HomeController extends Controller
{
    //
    public function Index()
    {
        return view('index', [
            'projects' => Project::limit(2)->get()
        ]);
    }
}
