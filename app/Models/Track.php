<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = [
        'hash',
        'ip',
        'page_id',
        'datetime',
        'user_agent',
        'timezone',
    ];

    protected $casts = [
        'datetime' => 'datetime:Y-m-d H:i:s',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
