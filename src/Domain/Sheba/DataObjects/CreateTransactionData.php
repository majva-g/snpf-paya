<?php

namespace Domain\Sheba\DataObjects;

use Domain\Sheba\Enums\TransactionType;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
final class CreateTransactionData extends Data
{
    public function __construct(
        public int $shebaRequestId,
        public int $amount,
        #[WithCast(EnumCast::class, type: TransactionType::class)]
        public TransactionType $transactionType,
    ) {}
}
