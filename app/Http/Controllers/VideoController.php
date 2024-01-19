<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function show(){
        $video = Video::find(1);



        return view('videos.show',[
            'video' => $video
        ]);
    }
}
