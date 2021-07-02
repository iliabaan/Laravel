<?php


namespace App\Contracts;


use App\Models\Source;

interface ParserServiceContract
{
    public function getNews(Source $source): void;
}
