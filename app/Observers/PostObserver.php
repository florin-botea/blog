<?php

namespace App\Observers;

use \App\Article;
use Illuminate\Http\Request;

class PostObserver
{
    public function created(Post $post)
    {
        // if (!request()->tags){
            // return;
        // }
        // $tags = array_map( function($tag){ return $tag['value']; }, json_decode(request()->tags, true) );
        
        // foreach($tags as $tag){
            // $tag = \App\Tag::firstOrCreate(['name' => $tag]); //user_id = auth->>id
            // dd($tag);
            // \App\ModelHasTag::create([
                // 'model_id' => $post->id,
                // 'model' => '\App\Article',
                // 'tag_id' => $tag->id,
                // 'added_by' => 1
            // ]);
        // }
    }
    
    public function updated(Post $post)
    {
        // $tags = array_map( function($tag){ return $tag['value']; }, json_decode(request()->tags, true) );
        // \App\ModelHasTag::where('model_id', $post->id)->delete();
        
        // foreach($tags as $tag){
            // $tag = \App\Tag::firstOrCreate(['name' => $tag]); //user_id = auth->>id
            // \App\ModelHasTag::create([
                // 'model_id' => $post->id,
                // 'model' => '\App\Article',
                // 'tag_id' => $tag->id,
                // 'added_by' => 1
            // ]);
        // }
    }
}
