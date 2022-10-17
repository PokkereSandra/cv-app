<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    use HasFactory;

    const PRIMARY = 1;
    const SECONDARY = 2;
    const SECONDARY_PROFESSIONAL = 3;
    const COLLEGE = 4;
    const BACHELOR = 5;
    const MASTER = 6;
    const DOCTORATE = 7;

    const STARTED = 1;
    const INTERRUPTED = 2;
    const FINISHED = 3;

    protected $table = 'educations';

    protected $fillable = [
        'user_id',
        'level',
        'university',
        'faculty',
        'study_direction',
        'study_status',
        'started_at',
        'finished_at',
    ];

    public static function getEducationLevels(): array
    {
        return [
            self::PRIMARY => 'Pamatizglītība',
            self::SECONDARY => 'Vidējā izglītība',
            self::SECONDARY_PROFESSIONAL => 'Vidējā profesionālā',
            self::COLLEGE => '1. līmeņa augstākā',
            self::BACHELOR => 'Bakalaura grāds',
            self::MASTER => 'Maģistra grāds',
            self::DOCTORATE => 'Doktora grāds',
        ];
    }

    public static function getEducationLevel(int $value): string
    {
        $levels = self::getEducationLevels();

        return $levels[$value];

    }

    public static function getEducationStatuses(): array
    {
        return [
            self::STARTED => 'mācības uzsāktas',
            self::INTERRUPTED => 'mācības pārtrauktas',
            self::FINISHED => 'mācības pabeigtas'
        ];
    }

    public static function getEducationStatus(int $value): string
    {
        $statuses = self::getEducationStatuses();
        return $statuses[$value];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
