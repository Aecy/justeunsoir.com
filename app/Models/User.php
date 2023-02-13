<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use App\Enums\User\UserRolesEnum;
use Spatie\MediaLibrary\HasMedia;
use App\Enums\User\UserSmokingEnum;
use App\Enums\User\UserGendersEnum;
use Musonza\Chat\Traits\Messageable;
use App\Enums\User\UserDrinkingEnum;
use App\Enums\User\UserMartialsEnum;
use App\Enums\User\UserMorphologyEnum;
use Overtrue\LaravelLike\Traits\Liker;
use App\Traits\UserProfileIsCompleted;
use Illuminate\Notifications\Notifiable;
use Overtrue\LaravelLike\Traits\Likeable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use LaravelInteraction\Favorite\Concerns\Favoriter;
use LaravelInteraction\Favorite\Concerns\Favoriteable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'referred_by',
        'avatar',
        'cover',
        'fake_account',
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
        return $this->avatar == 'default.jpg' ? asset('default.jpg') : asset('/storage/' . $this->avatar);
    }

    /**
     * Créer un attribut pour la photo de couverture de l'utilisateur.
     *
     * @return string
     */
    public function getCoverUrlAttribute(): string
    {
        return $this->cover == 'cover-default.jpg' ? asset('cover-default.jpg') : asset('/storage/' . $this->cover);
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

    /**
     * Vérifie si l'utilisateur dans la requête du model est complet.
     *
     * @param $query
     * @return mixed
     */
    public function scopeIsCompleted($query): mixed
    {
        return $query->where(function ($query) {
            $query
                ->whereNotNull('gender')
                ->whereNotNull('martial')
                ->whereNotNull('age')
                ->whereNotNull('about_me')
                ->whereNotNull('looking_for')
                ->whereNotNull('interest_for')
                ->whereNotNull('smoking')
                ->whereNotNull('drinking')
                ->whereNotNull('height')
                ->whereNotNull('morphology')
                ->whereNotNull('hair_color')
                ->whereNotNull('eye_color');
        });
    }

    /**
     * Vérifie si l'utilisateur dans la requête du model est complet.
     *
     * @param $query
     * @return mixed
     */
    public function scopeNotFakeAccount($query): mixed
    {
        return $query->where(function ($query) {
            $query->whereRole(UserRolesEnum::ADMIN);
        });
    }
}
