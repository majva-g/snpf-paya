<?php

namespace Domain\Sheba\DataObjects;

use Domain\Sheba\Enums\ShebaRequestStatus;
use Spatie\LaravelData\Data;

final class AcceptOrDeclineShebaRequestData extends Data
{
    public function __construct(
        public ShebaRequestStatus $status,
        public ?string $note
    ) {}
}
