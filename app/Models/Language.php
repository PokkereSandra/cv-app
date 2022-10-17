<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Language extends Model
{
    use HasFactory;

    const ELEMENTARY = 1;
    const WORKING_PROFICIENCY = 2;
    const NATIVE = 3;

    protected $fillable = [
        'user_id',
        'language',
        'level',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function getLanguageSkillLevels(): array
    {
        return [
            self::ELEMENTARY => 'sarunvalodas līmenī',
            self::WORKING_PROFICIENCY => 'pārzinu labi',
            self::NATIVE => 'dzimtā',
        ];

    }

    public static function getLanguageSkillLevel(int $value): string
    {
        $levels = self::getLanguageSkillLevels();

        return $levels[$value];

    }

}
