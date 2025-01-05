<?php

namespace Domain\Sheba\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class ShebaRequest extends Model
{
    use HasFactory;

    protected $guarded = [
        'price',
        'from_sheba_number',
        'to_sheba_number',
        'status',
        'note',
    ];

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
