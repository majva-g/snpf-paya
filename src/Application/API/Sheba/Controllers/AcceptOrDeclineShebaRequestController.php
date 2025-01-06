<?php

namespace Application\API\Sheba\Controllers;

use Application\API\Sheba\Requests\AcceptOrDeclineShebaRequestRequest;
use Domain\Sheba\Actions\AcceptOrDeclineShebaRequestAction;
use Domain\Sheba\DataObjects\AcceptOrDeclineShebaRequestData;
use Domain\Sheba\DataObjects\ShebaRequestData;
use Domain\Sheba\Enums\ShebaRequestStatus;
use Domain\Sheba\Exceptions\ShebaRequestIsNotInPendingStatusException;
use Domain\Sheba\Models\ShebaRequest;
use Exception;

final class AcceptOrDeclineShebaRequestController
{
    public function __invoke(
        ShebaRequest $shebaRequest,
        AcceptOrDeclineShebaRequestRequest $request,
        AcceptOrDeclineShebaRequestAction $action)
    {
        try {
            $shebaRequest = $action->execute($shebaRequest,AcceptOrDeclineShebaRequestData::from($request->validated()));

            return response()->json([
                'message' => $shebaRequest->status == ShebaRequestStatus::CONFIRMED ? 'Request is Confirmed!' : 'Request is Canceled!',
                'request' => ShebaRequestData::from($shebaRequest)
            ], 200);

        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'code' => '500'], 500);
        }
      
        
    }
}
