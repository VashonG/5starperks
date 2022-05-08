<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    protected $fillable = [
        'body'
    ];

    public function user()
    {
        $this->belongsTo('App\Models\User');
    }

    public function anouncement()
    {
        $this->belongsTo('App\Models\Announcement');
    }
}




?>
