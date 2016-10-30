<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Video;

class VideoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $videos = Video::all();

        // load the view and pass the nerds
        // return View::make('nerds.index')
        //     ->with('nerds', $nerds);
        //     
        return View::make('videos.index')
            ->with('videos', $videos);
        
    }
}
