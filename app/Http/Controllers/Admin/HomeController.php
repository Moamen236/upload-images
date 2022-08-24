<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $images = Image::paginate(10);

        return view('admin' , compact('images'));
    }

    public function download(Image $image)
    {
        // $file_name = public_path('uploads'). '/' . $image->image;
        $image_url = file_get_contents($image->image);
        // dd($image_url);
        return Response::download($image_url);
    }
}
