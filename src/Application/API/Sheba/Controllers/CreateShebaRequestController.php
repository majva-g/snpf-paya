<?php

namespace Application\API\Sheba\Controllers;

use Application\API\Sheba\Requests\CreateShebaRequestRequest;
use Domain\Sheba\Actions\CreateShebaRequestAction;
use Domain\Sheba\DataObjects\CreateShebaRequestData;
use Domain\Sheba\DataObjects\ShebaRequestData;
use Domain\Sheba\Exceptions\LowBalanceException;


final class CreateShebaRequestController
{
    public function __invoke(CreateShebaRequestRequest $request,CreateShebaRequestAction $action)
    {
        try {

            $shebaRequest = $action->execute(CreateShebaRequestData::from($request->validated()));

            return response()->json([
                'message' => 'Request is saved successfully and is in pending status',
                'request' => ShebaRequestData::from($shebaRequest)
            ], 200);


        } catch ( LowBalanceException $e) {
            return response()->json(['message' => 'Insufficient balance', 'code' => '400'], 400);
        }

        catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'code' => '500'], 500);
        }
        
    }
}
