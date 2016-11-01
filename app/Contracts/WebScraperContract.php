<?php

namespace App\Contracts;

Interface WebScraperContract
{
	public function getMetaTag($url, $property);
}