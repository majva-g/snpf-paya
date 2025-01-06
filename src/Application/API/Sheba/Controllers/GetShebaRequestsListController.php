<?php

namespace Application\API\Sheba\Controllers;

use Domain\Sheba\DataObjects\ShebaRequestData;
use Domain\Sheba\Models\ShebaRequest;

final class GetShebaRequestsListController
{
    public function __invoke()
    {
        $requests = ShebaRequestData::collect(ShebaRequest::orderBy('created_at', 'asc')->get());

        return response()->json(['requests' => $requests], 200);     
    }
}
