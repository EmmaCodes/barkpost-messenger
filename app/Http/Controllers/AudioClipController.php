<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\AudioClip;

class AudioClipController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $audio_clips = AudioClip::all();

        $chatfuel_param = "{{ fb_id }}";

        return View::make('audio_clips.index')
            ->with('audio_clips', $audio_clips)
            ->with('chatfuel_param', $chatfuel_param);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('audio_clips.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $rules =[
            'source' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('audio-clips/create')
                ->withErrors($validator)
                ->withInput();
        } 

        $audio_clip = new AudioClip();
        $audio_clip->name = $request->name;
        $audio_clip->description = $request->description;
        $audio_clip->source = $request->source;
        $audio_clip->save();

        Session::flash('message', 'Successfully created audio!');
        return Redirect::to('audio-clips');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $audio_clip = AudioClip::find($id);

        return View::make('audio_clips.show')
            ->with('audio_clip', $audio_clip);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $audio_clip = AudioClip::find($id);

        return View::make('audio_clips.edit')
            ->with('audio_clip', $audio_clip);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $rules =[
            'source' => 'required|unique:audio_clips' . ($id ? ",id,$id" : '')
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('audio-clips/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } 

        $audio_clip = AudioClip::find($id);
        $audio_clip->name = $request->name;
        $audio_clip->description = $request->description;
        $audio_clip->source = $request->source;
        $audio_clip->save();

        Session::flash('message', 'Successfully updated audio!');
        return Redirect::to('audio-clips');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $audio_clip = AudioClip::find($id);
        $audio_clip->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the audio!');
        return Redirect::to('audio-clips');
    }
}
