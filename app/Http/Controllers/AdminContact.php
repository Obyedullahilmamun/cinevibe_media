<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminContact extends Controller
{
    public function index()
    {
        return view('admin-contact');
    }
}
