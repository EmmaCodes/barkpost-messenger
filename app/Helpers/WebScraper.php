<?php

namespace app\Helpers;

use App\Contracts\WebScraperContract;

class WebScraper implements WebScraperContract
{

    public function getMetaTag($url, $property)
    {

        $meta_tags = get_meta_tags($url);

        return $meta_tags[$property];

    }

}