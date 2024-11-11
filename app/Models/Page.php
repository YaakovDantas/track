<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'number',
    ];

    protected $casts = [
        'datetime' => 'datetime:Y-m-d H:i:s',
    ];

    public function tracks()
    {
        return $this->hasMany(Track::class);
    }
}
