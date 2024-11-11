<?php

namespace App\Repository\Track;

use App\Dto\TrackIndexDto;
use App\Entities\TrackEntity;
use App\Models\Track;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class TrackEloquent implements TrackRepositoryInterface
{
    private Track $model;

    public function __construct()
    {
        $this->model = new Track;
    }
    public function findByHash(string $hash): bool
    {
        return $this->model->query()->where('hash', $hash)->exists();
    }

    public function getRecords(TrackIndexDto $dto): Collection
    {
        $query = $this->model->query()->with('page:id,number');
        if (!is_null($dto->startDate) && !is_null($dto->endDate)) {
            $startOfHour = Carbon::parse($dto->startDate)->startOfMinute();
            $endOfHour = Carbon::parse($dto->endDate)->endOfMinute();
            $query->whereBetween('datetime', [$startOfHour, $endOfHour]);
        }

        return $query->get();
    }
    
    public function save(TrackEntity $entity): bool
    {
        $this->model->hash = $entity->getHash();
        $this->model->ip = $entity->getIp();
        $this->model->page_id = $entity->getPageId();
        $this->model->datetime = $entity->getDateTime();
        $this->model->user_agent = $entity->getUserAgent();
        $this->model->timezone = $entity->getTimezone();
        
        return $this->model->save();
    }
}
