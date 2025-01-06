<?php

namespace Domain\Sheba\Models;

use Database\Factories\ShebaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Sheba extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'number',
        'balance',
    ];

    protected static function newFactory(): ShebaFactory
    {
        return ShebaFactory::new();
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
