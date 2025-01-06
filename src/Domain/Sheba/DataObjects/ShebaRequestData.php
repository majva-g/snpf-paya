<?php

namespace Domain\Sheba\DataObjects;

use DateTime;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;

use Spatie\LaravelData\Data;

final class ShebaRequestData extends Data
{
    public function __construct(
        public int $id,
        public int $price,
        public string $fromShebaNumber,
        public string $toShebaNumber,
        public string $status,
        #[WithCast(DateTimeInterfaceCast::class)]
        public DateTime $createdAt
    ) {}
}
