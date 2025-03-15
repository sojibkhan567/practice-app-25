<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function uploadImage()
    {
        return view('image-upload');
    }

    public function storeImage(Request $request)
    {
        info($request->all());
    }
}
