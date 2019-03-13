<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['name', 'content', 'file'];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /*public function savePost($data)
    {

        $this->name = $data['name'];
        $this->content = $data['content'];
        $this->category_id = $data['category_id'];
        if ($data['file']) {
            $this->file = $data['file'];
        }
        $this->save();
        return 1;
    }

    public function updatePost($data)
    {
        $post = $this->find($data['id']);
        $post->name = $data['name'];
        $post->content = $data['content'];
        $this->category_id = $data['category_id'];
        if ($data['file'])
            $post->file = $data['file'];
        $post->save();
        return 1;
    }*/
}
