<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Post
{

    public $title;
    public $excerpt;
    public $slug;
    public $date;

    public function __construct($title, $excerpt, $slug, $date)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->slug = $slug;
        $this->date = $date;
    }


    public static function all(){
       $files = File::files(resource_path("posts/"));
       return array_map(function ($file){
           return $file->getContents();
       }, $files);
    }


    public static function find($slug): string{
        $path = resource_path("posts/{$slug}.html");
        if (! file_exists($path)){
        return redirect('/');
        }
        return cache()->remember("posts.{$slug}", 5, function () use ($path){
                            return file_get_contents($path);
                            });
    }


}
