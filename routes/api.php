<?php

use Application\API\Sheba\Controllers\AcceptOrDeclineShebaRequestController;
use Application\API\Sheba\Controllers\CreateShebaRequestController;
use Application\API\Sheba\Controllers\GetShebaRequestsListController;
use Illuminate\Support\Facades\Route;


 Route::get('/sheba', GetShebaRequestsListController::class); 
 Route::post('/sheba', CreateShebaRequestController::class);
 Route::put('/sheba/{shebaRequest}', AcceptOrDeclineShebaRequestController::class);

