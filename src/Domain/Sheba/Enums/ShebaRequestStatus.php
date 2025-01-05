<?php

namespace Domain\Sheba\Enums;

enum ShebaRequestStatus:string
{
    case CONFIRMED = 'confirmed';
    case CANCELED = 'canceled';
}
