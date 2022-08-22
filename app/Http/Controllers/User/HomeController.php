<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image'
        ]);

        $fileOriginalName = $request->image->getClientOriginalName();
        $extension = pathinfo($fileOriginalName, PATHINFO_EXTENSION);
        $filename = pathinfo($fileOriginalName, PATHINFO_FILENAME) . '-' . time() . ($extension ? '.' . $extension : '');
        
        $path = Storage::disk('uploads')->putFileAs(
            'images',
            $request->image,
            $filename
        );

        $upload_image = Image::create([
            'name' => $filename,
            'image' => $path
        ]);

        if($upload_image)
            return back()->with(['status' => 'Added Successfully']);
        else
            abort(404);
    }
}
