<?php


namespace App\Services;


use App\Contracts\ParserServiceContract;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Requests\CreateNews;
use App\Models\Source;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Symfony\Component\HttpFoundation\Request;

class ParserService implements ParserServiceContract
{

    public function getNews(Source $source): void
    {
        $xml = XmlParser::load($source->url);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,description,pubDate]'
            ],
        ]);

        foreach ($data['news'] as $news) {
            $news['category_id'] = $source->category_id;
            (new NewsController())->store((new CreateNews), $news);
        }
    }
}
