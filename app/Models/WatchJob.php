<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','url','is_active','user_id','last_tag_count','slug','tags'
    ];
}
