<?php

namespace app\Helpers;

use App\Contracts\VideoServiceContract;
use App\Video;
use App\VideoTypes;

class VideoService implements VideoTypeServiceContract
{

    public function generatePayload(Video $video)
    {
    	// $type = VideoTypes::find($video_type_id)

    	$video_type = $video->video_type_id

    }

}