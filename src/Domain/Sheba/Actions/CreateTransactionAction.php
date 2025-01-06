<?php

namespace Domain\Sheba\Actions;

use Domain\Sheba\DataObjects\CreateTransactionData;
use Domain\Sheba\Models\Transaction;
use GuzzleHttp\Promise\Create;

final readonly class CreateTransactionAction
{
    public function execute(CreateTransactionData $data): void
    {
        Transaction::create($data->toArray());
    }
}
