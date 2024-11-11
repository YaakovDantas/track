<?php

namespace App\Http\Controllers;

use App\Dto\TrackIndexDto;
use App\Dto\TrackStoreDto;
use App\Http\Requests\TrackIndexFormRequest;
use App\Http\Requests\TrackStoreFormRequest;
use App\Models\Track;
use App\UseCase\TrackIndexUseCase;
use App\UseCase\TrackStoreUseCase;

class TrackController extends Controller
{
    public function __construct(
        private TrackStoreUseCase $storeUseCase,
        private TrackIndexUseCase $indexUseCase
    ) {
    }

    public function index(TrackIndexFormRequest $request)
    {
        $dto = new TrackIndexDto(
            startDate: $request->input('start_date', null),
            endDate: $request->input('end_date', null)
        );
        $response = $this->indexUseCase->execute($dto);

        return response()->json($response->list);
    }

    public function store(TrackStoreFormRequest $request)
    {
        $dto = new TrackStoreDto(
            dateTime: $request->date_time,
            userAgent: $request->user_agent,
            timezone: $request->timezone,
            pageNumber: $request->page_number,
            ip: $request->ip,
        );
        $this->storeUseCase->execute($dto);

        return response()->json(['success' => true], 200);
    }
}
