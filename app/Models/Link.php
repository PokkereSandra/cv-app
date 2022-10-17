<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Link extends Model
{
    use HasFactory;

    const FACEBOOK = 1;
    const TWITTER = 2;
    const LINKEDIN = 3;
    const INSTAGRAM = 4;
    const GITHUB = 5;

    protected $fillable = [
        'user_id',
        'url',
        'icon',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function getSocialSiteIcons(): array
    {
        return [
            self::FACEBOOK => "bi bi-facebook",
            self::TWITTER => "bi bi-twitter",
            self::LINKEDIN => "bi bi-linkedin",
            self::INSTAGRAM => "bi bi-instagram",
            self::GITHUB => "bi bi-github",
        ];

    }

    public function getSocialSiteIcon(int $value): string
    {
        $icons = self::getSocialSiteIcons();

        return $icons[$value];
    }

    public static function getSocialSites(): array
    {
        return [
            self::FACEBOOK => "facebook",
            self::TWITTER => "twitter",
            self::LINKEDIN => "linkedin",
            self::INSTAGRAM => "instagram",
            self::GITHUB => "github",
        ];

    }

    public function getSocialSite(int $value): string
    {
        $sites = self::getSocialSites();

        return $sites[$value];
    }
}
