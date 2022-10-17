<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Job extends Model
{
    use HasFactory;

    const PART_TIME = 1;
    const HALF_TIME = 2;
    const FULL_TIME = 3;
    const LOAD_AND_A_HALF = 4;

    protected $fillable = [
        'user_id',
        'position',
        'company',
        'workload',
        'description',
        'started_at',
        'finished_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public static function getWorkLoads(): array
    {
        return [
            self::PART_TIME => 'nepilna slodze',
            self::HALF_TIME => 'pusslodze',
            self::FULL_TIME => 'pilna slodze',
            self::LOAD_AND_A_HALF => 'pusotra slodze',
        ];

    }

    public static function getWorkLoad(int $value): string
    {
        $loads = self::getWorkLoads();

        return $loads[$value];
    }

}
