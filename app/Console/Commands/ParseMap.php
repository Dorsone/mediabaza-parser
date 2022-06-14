<?php

namespace App\Console\Commands;

use App\Services\ParserService;
use DiDom\Exceptions\InvalidSelectorException;
use Illuminate\Console\Command;

class ParseMap extends Command
{
    /**
     * @var ParserService
     */
    protected $parserService;

    /**
     * @var string
     */
    protected $signature = 'parse:map';

    /**
     * @var string
     */
    protected $description = 'Parsing map from mediabaza.uz';

    /**
     * @param ParserService $parserService
     */
    public function __construct(ParserService $parserService)
    {
        parent::__construct();
        $this->parserService = $parserService;
    }

    /**
     * @throws InvalidSelectorException
     */
    public function handle()
    {
        dd($this->parserService->parseMap());
    }
}
