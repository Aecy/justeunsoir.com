<?php

namespace App\Traits\User;

trait UserAttrTrait
{
    public function getMorphologyNameAttribute(): string
    {
        return match ($this->morphology) {
            "S" => "Sportif(ve)",
            "M" => "Mince",
            "D" => "Délicat(e)",
            "N" => "Normal",
            "Q" => "Quelque kilos en trop",
            "R" => "Rond(e)",
            default => "Non spécifié",
        };
    }

    public function getGenderTypeAttribute(): string
    {
        return match ($this->gender) {
            "F" => "Femme",
            "H" => "Homme",
            default => "Non spécifié",
        };
    }

    public function getMartialNameAttribute(): string
    {
        return match ($this->martial) {
            "C" => "Célibataire",
            "E" => "En couple",
            "MSE" => "Marié(e) sans enfant",
            "MAE" => "Marié(e) avec enfant(s)",
            "V" => "Veuf(ve)",
            default => "Non spécifié"
        };
    }

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
