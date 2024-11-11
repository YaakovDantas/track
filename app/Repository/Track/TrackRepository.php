<?php

namespace App\Repository\Track;

use App\Dto\TrackIndexDto;
use App\Entities\TrackEntity;
use Illuminate\Database\Eloquent\Collection;

class TrackRepository
{
    public function __construct(private TrackRepositoryInterface $repository)
    {

    }

    public function save(TrackEntity $entity): bool
    {
        return $this->repository->save($entity);
    }

    public function findByHash(string $hash): bool
    {
        return $this->repository->findByHash($hash);
    }

    public function getRecords(TrackIndexDto $dto): Collection
    {
        return $this->repository->getRecords($dto);
    }
}
