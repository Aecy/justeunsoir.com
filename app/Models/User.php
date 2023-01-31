<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Overtrue\LaravelLike\Traits\Likeable;
use Overtrue\LaravelLike\Traits\Liker;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia, Likeable, Liker;

    /**
     * Les attributs qui peuvent être remplis par l'User.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'gender',
        'martial',
        'age',
        'birth_at',
        'address',
        'password',
        'about_me',
        'looking_for',
        'interest_for',
        'smoking',
        'drinking',
        'height',
        'weight',
        'hair_color',
        'eye_color',
        'avatar',
    ];

    /**
     * Les attributs qui doivent être cachés pour la sérialisation.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les attributs qui devraient être casts.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'birth_at' => 'date',
        'email_verified_at' => 'datetime',
        'last_seen' => 'datetime',
        'last_reward' => 'datetime',
    ];

    /**
     * Vérifie si l'User est admin.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Register the media collection of the users.
     *
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('medias');
    }

    /**
     * Créer un attribut pour l'avatar de l'User.
     *
     * @return string
     */
    public function getAvatarUrlAttribute(): string
    {
        return $this->avatar == 'default.jpg' ? asset('default.jpg') : asset('/storage/avatars/' . $this->avatar);
    }

    /**
     * Permet de filtrer dans les utilisateurs.
     *
     * @param $query
     * @param $params
     * @return mixed
     */
    public function scopeFilter($query, $params): mixed
    {
        if (isset($params['looking'])) {
            $query->where('gender', $params['looking']);
        }

        if (isset($params['start_age']) && isset($params['end_age'])) {
            $query
                ->whereBetween('age', [$params['start_age'], $params['end_age']])
                ->orderBy('age', 'asc');
        }

        if (isset($params['address'])) {
            $query->where('address', 'LIKE', "%{$params['address']}%");
        }

        return $query;
    }
}
