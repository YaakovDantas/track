<?php

namespace App\Repository\Page;

use App\Entities\PageEntity;
use App\Models\Page;

class PageRepository
{
    public function __construct(private PageRepositoryInterface $repository)
    {

    }

    public function save(PageEntity $entity): Page
    {
        return $this->repository->save($entity);
    }
}
