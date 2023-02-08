<?php

namespace App\Models;

use App\Enums\User\UserDrinkingEnum;
use App\Enums\User\UserGendersEnum;
use App\Enums\User\UserMartialsEnum;
use App\Enums\User\UserMorphologyEnum;
use App\Enums\User\UserRolesEnum;
use App\Enums\User\UserSmokingEnum;
use App\Traits\UserProfileIsCompleted;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use LaravelInteraction\Favorite\Concerns\Favoriteable;
use LaravelInteraction\Favorite\Concerns\Favoriter;
use Musonza\Chat\Traits\Messageable;
use Overtrue\LaravelLike\Traits\Likeable;
use Overtrue\LaravelLike\Traits\Liker;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasApiTokens, HasFactory, Notifiable;
    use InteractsWithMedia;
    use Likeable, Liker, Favoriter, Favoriteable;
    use Messageable;
    use UserProfileIsCompleted;

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
        'country',
        'state',
        'password',
        'about_me',
        'looking_for',
        'interest_for',
        'smoking',
        'drinking',
        'height',
        'morphology',
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
        'birth_at' => 'date',
        'email_verified_at' => 'datetime',
        'last_seen' => 'datetime',
        'last_reward' => 'datetime',
        'role' => UserRolesEnum::class,
        'gender' => UserGendersEnum::class,
        'martial' => UserMartialsEnum::class,
        'smoking' => UserSmokingEnum::class,
        'drinking' => UserDrinkingEnum::class,
        'morphology' => UserMorphologyEnum::class,
    ];

    /**
     * Vérifie si l'User est admin.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === UserRolesEnum::ADMIN;
    }

    /**
     * Vérifie si l'User est membre.
     *
     * @return bool
     */
    public function isMember(): bool
    {
        return $this->role === UserRolesEnum::MEMBER;
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
            $query->orderBy('age', 'asc')
                ->whereBetween('age', [$params['start_age'], $params['end_age']]);
        }

        if (isset($params['state'])) {
            $query->where('state', 'LIKE', "%{$params['state']}%");
        }

        if (isset($params['country'])) {
            $query->where('country', $params['country']);
        }

        return $query;
    }
}
