<?php

namespace Domain\Sheba\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Domain\User\Models\User;

final class Sheba extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'number',
        'balance',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
