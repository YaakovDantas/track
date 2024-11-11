<?php

namespace App\Dto;

class TrackRecordDto
{
    public function __construct(
        public int $pageNumber,
        public string $datetime,
        public string $timezone,
        public string $ip,
        public string $hash,
        public string $userAgent,
    ) { }
}
