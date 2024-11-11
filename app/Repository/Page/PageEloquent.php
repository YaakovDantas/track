<?php

namespace App\Repository\Page;

use App\Entities\PageEntity;
use App\Models\Page;

class PageEloquent implements PageRepositoryInterface
{
    private Page $model;

    public function __construct()
    {
        $this->model = new Page;
    }
    
    public function save(PageEntity $entity): Page
    {
        return $this->model->firstOrCreate(['number' => $entity->getNumber()]);
    }
}
