<?php

use App\Post;
use App\Video;
use App\Tag;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    
    $post = Post::create([
        'name'=>'My first post ',
    ]);

    $tag1 = Tag::find(1);

    $post->tags()->save($tag1);

    $video = Video::create([
        'name'=>'video.mov',
        ]);
    //creating a post & video

    $tag2 = Tag::find(2);
    //finding the tag

    $video->tags()->save($tag2);
    //above lines are saving the post & video and associating with respective tag
});

Route::get('read', function () {
    
    $post = Post::findOrFail(1);

    foreach($post->tags as $tag)
    {
        // return $tag;
        echo '$tag';
    }

});