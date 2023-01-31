<?php

namespace App\Traits\User;

trait UserGenderTrait
{
    public function getGenderTypeAttribute(): string
    {
        return match ($this->gender) {
            "F" => "Femme",
            "H" => "Homme",
            default => "Non spécifié",
        };
    }
}
