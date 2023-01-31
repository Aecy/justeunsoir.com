<?php

namespace App\Traits\User;

trait UserMartialTrait
{
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
}
