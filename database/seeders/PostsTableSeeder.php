<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<10;$i++){
            Post::create([
                'title'=>"post".$i,
                'body'=>"in post".$i."jfidgjighiooooogtgjionedcnsdunisncudbsuf",
                'user_id'=>1,
            'cover_image'=>"noimage.jpg"])->category()->attach(1);}
            $post=Post::find(1);
            $post->category()->attach(3);


            for($i=20;$i<30;$i++){
                Post::create([
                    'title'=>"post".$i,
                    'body'=>"in post".$i."jfidgjighiooooogtgjionedcnsdunisncudbsuf",
                    'user_id'=>1,
                    'cover_image'=>"noimage.jpg"
                ])->category()->attach(2);
        }
    }
}
