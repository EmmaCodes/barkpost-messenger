<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Video;

class VideosController extends Controller
{

    /**
     * Display a list of all Videos
     *
     * @param  Request  $request
     * @return Response
     */
    public function list(Request $request)
    {
        $videos = Video::all();

        return view('videos.list', [
            'videos' => $videos,
        ]);   
    }
}
