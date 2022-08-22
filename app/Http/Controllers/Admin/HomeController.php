<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    public function index()
    {
        $images = Image::all();

        return view('admin' , compact('images'));
    }

    public function download(Image $image)
    {
        $file_name = public_path('uploads'). '/' . $image->image;
        return Response::download($file_name);
    }
}
