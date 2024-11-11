<?php

namespace App\UseCase;

use App\Dto\TrackIndexDto;
use App\Dto\TrackRecordDto;
use App\Dto\TrackRecordsListDto;
use App\Repository\Track\TrackRepository;

class TrackIndexUseCase
{
    public function __construct(private TrackRepository $repository)
    {
        
    }

    public function execute(TrackIndexDto $dto): TrackRecordsListDto
    {
        $records = $this->repository->getRecords($dto);
        $recordsDto = $records->map(function($record) {
            return new TrackRecordDto(
                pageNumber: $record->page->number,
                datetime: $record->datetime,
                timezone: $record->timezone,
                ip: $record->ip,
                hash: $record->hash,
                userAgent: $record->user_agent,

            );
        });
        return new TrackRecordsListDto($recordsDto);
    }
}
