<?php

namespace Domain\Sheba\DataObjects;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
final class CreateShebaRequestData extends Data
{
    public function __construct(
        public int $price,
        public string $fromShebaNumber,
        public string $toShebaNumber,
        public string $note
    ) {}
}
