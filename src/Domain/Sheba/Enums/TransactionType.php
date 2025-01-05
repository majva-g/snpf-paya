<?php

namespace Domain\Sheba\Enums;

enum TransactionType:string
{
    case DEBIT = 'debit';
    case CREDIT = 'credit';
    case REFUND = 'refund';
}
