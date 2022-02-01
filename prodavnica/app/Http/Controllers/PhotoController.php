<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function deletePhoto($id) {
        $photo = Photo::findOrFail($id);
        $photo->delete();
    }
}
