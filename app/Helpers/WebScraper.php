<?php

namespace App\Helpers;

use App\Contracts\WebScraperContract;

use DomDocument;
use DOMXPath;

class WebScraper implements WebScraperContract
{

    public function getMetaTag($url, $property)
    {
        $html = file_get_contents($url);

        libxml_use_internal_errors(true); // Yeah if you are so worried about using @ with warnings

		$doc = new DomDocument();
		$doc->loadHTML($html);

		$xpath = new DOMXPath($doc);
		$query = '//*/meta[(@property=\''.$property.'\')]';
		$metas = $xpath->query($query);

		$data = array();
		foreach ($metas as $meta) {
		    $property = $meta->getAttribute('property');
		    $content = $meta->getAttribute('content');
		    $data[$property] = $content;
		}

        return $data[$property];

    }

}