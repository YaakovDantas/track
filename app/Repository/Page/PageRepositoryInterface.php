<?php

namespace App\Repository\Page;

use App\Entities\PageEntity;
use App\Models\Page;

interface PageRepositoryInterface
{
    public function save(PageEntity $entitie): Page;
}
