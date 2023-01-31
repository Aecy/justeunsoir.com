<?php

namespace App\Traits\User;

trait UserMorphologyTrait
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
}
