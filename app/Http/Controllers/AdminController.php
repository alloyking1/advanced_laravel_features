<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Handles all admin functionalities
     */

    public function Index(){
        return view('admin/AdminUi');
    }
}
