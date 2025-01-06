<?php

namespace Domain\Sheba\Actions;

use Domain\Sheba\DataObjects\AcceptOrDeclineShebaRequestData;
use Domain\Sheba\DataObjects\CreateTransactionData;
use Domain\Sheba\Enums\ShebaRequestStatus;
use Domain\Sheba\Enums\TransactionType;
use Domain\Sheba\Exceptions\ShebaRequestIsNotInPendingStatusException;
use Domain\Sheba\Models\Sheba;
use Domain\Sheba\Models\ShebaRequest;

final readonly class AcceptOrDeclineShebaRequestAction
{
    public function __construct(private CreateTransactionAction $createTransactionAction) {}
    public function execute(ShebaRequest $shebaRequest,AcceptOrDeclineShebaRequestData $data):ShebaRequest
    {
        if ($shebaRequest->status != ShebaRequestStatus::PENDING) {
            throw new ShebaRequestIsNotInPendingStatusException('Request is not in pending status');
        }
        if ($data->status == ShebaRequestStatus::CONFIRMED) {
            $shebaRequest->status = ShebaRequestStatus::CONFIRMED;
    

            $this->createTransactionAction->execute(CreateTransactionData::from([
                'sheba_request_id' => $shebaRequest->id,
                'amount' => $shebaRequest->price,
                'transaction_type' => TransactionType::CREDIT,
            ]));

            $sheba = Sheba::where('number', $shebaRequest->to_sheba_number)->first();
            $sheba->increment('balance', $shebaRequest->price);
        } else {
            $shebaRequest->status = ShebaRequestStatus::CANCELED;
            
            $sheba = Sheba::where('number', $shebaRequest->from_sheba_number)->first();
            $sheba->increment('balance', $shebaRequest->price);

            $this->createTransactionAction->execute(CreateTransactionData::from([
                'sheba_request_id' => $shebaRequest->id,
                'amount' => $shebaRequest->price,
                'transaction_type' => TransactionType::CREDIT,
            ]));
        }

        $shebaRequest->save();
        return $shebaRequest;
    }
}
