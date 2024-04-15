<?php

namespace App\Http\Controllers;

abstract class PhotoController
{
    //
}

public function index(Request $request)
    {
        $photos = \Auth::user()->photos()->latest()->paginate(10);
        $data = [
            'photos' => $photos,
        ];
        return view('photos.index', $data);
    }