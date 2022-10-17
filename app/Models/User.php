<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'surname',
        'birth_data',
        'phone_number',
        'email',
        'image',
    ];

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    public function bonuses(): HasMany
    {
        return $this->hasMany(Bonus::class);
    }

    public function description(): HasOne
    {
        return $this->hasOne(Description::class);
    }

    public function educations(): HasMany
    {
        return $this->hasMany(Education::class);
    }

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    public function languages(): HasMany
    {
        return $this->hasMany(Language::class);
    }

    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($user) {
            $user->address()->delete();
            $user->description()->delete();
            $user->educations()->each(function ($education) {
                $education->delete();
            });
            $user->jobs()->each(function ($job) {
                $job->delete();
            });
            $user->bonuses()->each(function ($bonus) {
                $bonus->delete();
            });
            $user->languages()->each(function ($language) {
                $language->delete();
            });
            $user->links()->each(function ($link) {
                $link->delete();
            });

        });
    }

}
