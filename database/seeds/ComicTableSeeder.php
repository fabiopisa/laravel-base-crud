<?php

use App\Comic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ComicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_comics = config('comics');
        foreach($array_comics as $comic_item){
            $new_comic = new Comic();
            $new_comic->title=$comic_item['title'];
            $new_comic->slug= Str::slug($new_comic->title, '-');
            $new_comic->description=$comic_item['description'];
            $new_comic->image=$comic_item['thumb'];
            $new_comic->price=$comic_item['price'];
            $new_comic->series=$comic_item['series'];
            $new_comic->date=$comic_item['sale_date'];
            $new_comic->type=$comic_item['type'];
            $new_comic->save();
        }
    }
}
