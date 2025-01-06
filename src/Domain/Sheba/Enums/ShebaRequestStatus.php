<?php

namespace Domain\Sheba\Enums;

enum ShebaRequestStatus:string
{
    case PENDING = 'pending';
    case CONFIRMED = 'confirmed';
    case CANCELED = 'canceled';
}
