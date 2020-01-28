<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{

	protected $fillable = [
    	'comment_id',
    	'name',
    	'email',
    	'reply'
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }


}
