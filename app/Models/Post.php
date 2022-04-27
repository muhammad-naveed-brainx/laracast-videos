<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

    public $title;
    public $excerpt;
    public $slug;
    public $date;
    public $body;

    public function __construct($title, $excerpt, $slug, $date, $body)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->slug = $slug;
        $this->date = $date;
        $this->body = $body;
    }


    public static function all(){
        $files = File::files(resource_path("posts/"));

        return array_map(function ($file){
            $doc = YamlFrontMatter::parseFile($file);
            return new Post(
                $doc->title,
                $doc->excerpt,
                $doc->slug,
                $doc->date,
                $doc->body()
                );
            },$files);
    }


    public static function find($slug){
        $posts = collect(static :: all());
        return $posts->firstWhere('slug', $slug);
    }


}
