<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuthAttempt extends Model
{

    protected $guarded = [
        'id',
        'created_at',
    ];
    protected $fillable = [
        'ip_address_id',
        'user_agent_id',
        'username',
        'event',
        'created_at',
    ];

    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
        ];
    }

    const UPDATED_AT = null;

    public function ipAddress(): BelongsTo
    {
        return $this->belongsTo(IpAddress::class);
    }

    public function userAgent(): BelongsTo
    {
        return $this->belongsTo(UserAgent::class);
    }
}
