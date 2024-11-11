<?php

namespace App\Entities;

class TrackEntity
{
    public function __construct(
        private string $dateTime,
        private string $userAgent,
        private string $timezone,
        private int $pageId,
        private string $ip
    ) { }

    public function getPageId(): int
    {
        return $this->pageId;
    }

    public function getDateTime(): string
    {
        return $this->dateTime;
    }

    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function getHash(): string
    {
        return md5($this->ip . $this->timezone . $this->userAgent . $this->pageId);
    }

    public function toArray(): array
    {
        return [
            'datetime' => $this->dateTime,
            'userAgent' => $this->userAgent,
            'timezone' => $this->timezone,
            'pageId' => $this->pageId,
            'ip' => $this->ip,
        ];
    }
}
