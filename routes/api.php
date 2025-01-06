<?php

use Application\API\Sheba\Controllers\CreateShebaRequestController;
use Illuminate\Support\Facades\Route;


 Route::post('/sheba', CreateShebaRequestController::class);

