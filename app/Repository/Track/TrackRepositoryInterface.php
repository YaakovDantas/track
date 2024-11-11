<?php

namespace App\Repository\Track;

use App\Dto\TrackIndexDto;
use App\Entities\TrackEntity;
use Illuminate\Database\Eloquent\Collection;

interface TrackRepositoryInterface
{
    public function save(TrackEntity $entitie): bool;
    public function findByHash(string $hash): bool;
    public function getRecords(TrackIndexDto $dto): Collection;
}
