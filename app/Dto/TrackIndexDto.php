<?php

namespace App\Dto;

class TrackIndexDto
{
    public function __construct(
        public ?string $startDate = null,
        public ?string $endDate = null
    ) { }
}
