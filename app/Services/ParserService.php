<?php

namespace App\Services;

use App\Models\Billboard;
use DiDom\Document;
use DiDom\Exceptions\InvalidSelectorException;
use DiDom\Query;

class ParserService
{

    /**
     * @throws InvalidSelectorException
     */
    public function parseMap()
    {
        $document = new Document();
        $document->loadHtmlFile('https://mediabaza.uz/map');
        $tags = $document->find(".object-location");
        $tags2 = $document->find("//span[contains(@class, 'location-')]", Query::TYPE_XPATH);
        foreach($tags as $item) {
            Billboard::query()->updateOrCreate([
                'latitude'  => $item->getAttribute('data-m-lat'),
                'langitude' => $item->getAttribute('data-m-lng'),
                'type' => $item->getAttribute('data-m-sidetype'),
                'address' => $item->getAttribute('data-m-address'),
                'number' => $item->getAttribute('data-m-number'),
                'size' => $item->getAttribute('data-m-sidesize'),
                'img' => $item->getAttribute('data-m-img'),
            ]);
        }
        foreach ($tags2 as $item2){
            Billboard::query()->updateOrCreate([
                'type' => $item2->getAttribute('data-m-sidetype'),
                'number' => substr($item2->getAttribute('class'), 9),
                'img' => $item2->getAttribute('data-m-img'),
            ]);
        }
        return "Parsing finished successfully!";
    }
}
