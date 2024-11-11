<?php

namespace App\Dto;

class TrackStoreDto
{
    public function __construct(
        public string $dateTime,
        public string $userAgent,
        public string $pageNumber,
        public string $timezone,
        public string $ip
    ) { }
}
