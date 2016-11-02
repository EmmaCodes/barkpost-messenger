<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Video;
use App\AudioClip;

class PayloadController extends Controller
{

    /**
     * Returns FB payload for video
     *
     * @return Response
     */
    public function mediaAttachment(Request $request, $media_type, $id)
    {
        $user_id = $request->get('user_id');

        $payload_url = '';

        if ($media_type == 'video') {
            $video = Video::find($id);
            $payload_url = $video->payload;
        } 

        if ($media_type == 'audio') {
            $audio = AudioClip::find($id);
            $payload_url = $audio->source;
        } 
        
        
        $message = [
            [
                'attachment' => [
                    'type' => $media_type,
                    'payload' => [
                        'url' => $payload_url
                    ]
                ]
            ]
        ];

        return response()->json($message);
    }
}