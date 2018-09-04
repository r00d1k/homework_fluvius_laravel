<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'author_id', 'quote_text',
    ];

    protected $hidden = ['author_id'];

    protected $with = ['author:id,name'];

    public function author() {
        return $this->belongsTo(Author::class);
    }
}
