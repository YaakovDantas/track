<?php

namespace App\Dto;

use Illuminate\Support\Collection;

class TrackRecordsListDto
{
    public function __construct(
        public Collection $list,
    ) { }
}
