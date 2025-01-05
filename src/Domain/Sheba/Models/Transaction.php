<?php

namespace Domain\Sheba\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'sheba_request_id',
        'amount',
        'transaction_type',
        'note',
    ];

    public function shebaRequest()
    {
        return $this->belongsTo(ShebaRequest::class);
    }
}
