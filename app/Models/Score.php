<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    public function mediaPosts()
    {
        return $this->belongsTo(Media::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
