<?php

namespace App\Contracts;

use App\Video;

Interface VideoServiceContract
{
	public function generatePayload(Video $video);
}