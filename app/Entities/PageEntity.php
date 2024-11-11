<?php

namespace App\Entities;

class PageEntity
{
    public function __construct(
        private int $pageNumber
    ) { }

    public function getNumber(): int
    {
        return $this->pageNumber;
    }
}
