<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Video;
use App\VideoTypes;

class PayloadController extends Controller
{

    /**
     * Returns FB payload for video
     *
     * @return Response
     */
    public function video(Request $request, $id)
    {
        $user_id = $request->get('user_id');
        $video = Video::find($id);
        
        $message = [
            'recipient' => [
                'id' => $user_id
            ],
            'message' => [
                'attachment' => [
                    'type' => 'video',
                    'payload' => [
                        'url' => $video->payload
                    ]
                ]
            ]
        ];

        return response()->json($message);
    }
}