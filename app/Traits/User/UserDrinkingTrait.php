<?php

namespace App\Traits\User;

trait UserDrinkingTrait
{
    public function getDrinkingTypeAttribute(): string
    {
        return match ($this->drinking) {
            "PDT" => "Pas du tout",
            "OED" => "On en discutera",
            "R" => "Rarement",
            "O" => "Occasionnellement",
            "RG" => "Régulièrement",
            default => "Non spécifié"
        };
    }
}
