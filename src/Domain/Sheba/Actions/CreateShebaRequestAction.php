<?php

namespace Domain\Sheba\Actions;


use Domain\Sheba\DataObjects\CreateShebaRequestData;
use Domain\Sheba\DataObjects\CreateTransactionData;
use Domain\Sheba\Enums\TransactionType;
use Domain\Sheba\Exceptions\LowBalanceException;
use Domain\Sheba\Models\Sheba;
use Domain\Sheba\Models\ShebaRequest;
use Illuminate\Support\Facades\DB;

final readonly class CreateShebaRequestAction
{
    public function __construct(private CreateTransactionAction $createTransactionAction)
    {
    }
    public function execute(CreateShebaRequestData $data): ShebaRequest
    {
       
        $sheba = Sheba::where('number', $data->fromShebaNumber)->first();

        if ($sheba->balance < $data->price) {
           throw new LowBalanceException();
        }

        return DB::transaction(function () use ($sheba, $data) {

            $shebaRequest = ShebaRequest::create($data->toArray());

            $this->createTransactionAction->execute(CreateTransactionData::from([
                'shebaRequestId' => $shebaRequest->id,
                'amount' => $data->price,
                'transactionType' => TransactionType::DEBIT
            ]));


            $sheba->decrement('balance', $data->price);

            return $shebaRequest->refresh();
        });

    }
}
