<?php

namespace App\Helpers;

use App\Contracts\VideoServiceContract;

use App\Helpers\WebScraper;

use App\Video;
use App\VideoTypes;

class VideoService implements VideoServiceContract
{

	protected $web_scraper;

	public function __construct(WebScraper $web_scraper)
	{
		$this->web_scraper = $web_scraper;
	}

    public function generatePayload(Video $video)
    {
    	$video_type = VideoTypes::find($video->video_type_id);

    	switch($video_type->slug){
    		case 'facebook':
    			return $video->source;
    		case 'instagram':
    			$url = $video->source;
    			$property = $video_type->meta_data_property;
    			$payload = $this->web_scraper->getMetaTag($url, $property);
    			return $payload;
    		case 'barkpost-hosted':
    			return $video->source;
    		default:
    			return $video->source;
    	}

    }

}