<?php

namespace App\Traits\User;

trait UserSmokingTrait
{
    public function getSmokingTypeAttribute(): string
    {
        return match ($this->smoking) {
            "PDT" => "Pas du tout",
            "OED" => "On en discutera",
            "R" => "Rarement",
            "O" => "Occasionnellement",
            "RG" => "Régulièrement",
            default => "Non spécifié"
        };
    }
}
