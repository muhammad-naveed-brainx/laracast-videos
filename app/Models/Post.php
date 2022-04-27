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
//        "Now the cache is not going to clear own its own we have to do it manually"
        // php artisan tinker to run shell for php and laravel app as a whole
        // to see cache in tinker type cache('posts.all') in shell
        //cache()->forget('posts.all') to clear a cash from terminal
        //cache()->get('key'), cache()->put('key', 'value')
        return cache()->rememberForever('posts.all', function (){
            $files = File::files(resource_path("posts/"));
            $posts_arr = array_map(function ($file){
                $doc = YamlFrontMatter::parseFile($file);
                return new Post(
                    $doc->title,
                    $doc->excerpt,
                    $doc->slug,
                    $doc->date,
                    $doc->body()
                );
            },$files);
            return collect($posts_arr)->sortByDesc('date');
        });
    }


    public static function find($slug){
        return static :: all()->firstWhere('slug', $slug);
    }


}
