<?php

namespace App\UseCase;

use App\Dto\TrackStoreDto;
use App\Entities\PageEntity;
use App\Entities\TrackEntity;
use App\Repository\Page\PageRepository;
use App\Repository\Track\TrackRepository;
use Illuminate\Support\Facades\Log;

class TrackStoreUseCase
{
    public function __construct(
        private TrackRepository $trackRepository,
        private PageRepository $pageRepository
    ) {

    }
    public function execute(TrackStoreDto $dto)
    {
        $pageEntity = new PageEntity($dto->pageNumber);
        $pageModel = $this->pageRepository->save($pageEntity);

        $trackEntity = new TrackEntity(
            $dto->dateTime,
            $dto->userAgent,
            $dto->timezone,
            $pageModel->id,
            $dto->ip
        );

        if ($this->trackRepository->findByHash($trackEntity->getHash())) {
            Log::info('User not unique', [
                'data' => $trackEntity->toArray(),
            ]);
            return;
        }

        $this->trackRepository->save($trackEntity);
    }
}
