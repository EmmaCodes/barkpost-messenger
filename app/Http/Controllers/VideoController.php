<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Video;
use App\VideoTypes;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $video_types = VideoTypes::pluck('name', 'id')->toArray();

        return View::make('videos.create', compact('video_types', $video_types));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $rules =[
            'source' => 'required|unique:videos',
            'payload' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('videos/create')
                ->withErrors($validator)
                ->withInput();
        } 

        $video = new Video();
        $video->name = $request->name;
        $video->description = $request->description;
        $video->video_type_id = $request->video_type_id;
        $video->source = $request->source;
        $video->payload = $request->payload;
        $video->save();

        Session::flash('message', 'Successfully created video!');
        return Redirect::to('videos');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $video = Video::find($id);

        return View::make('videos.show')
            ->with('video', $video);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $video = Video::find($id);
        $video_types = VideoTypes::pluck('name', 'id')->toArray();

        return View::make('videos.edit', compact('video_types', $video_types))
            ->with('video', $video);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
