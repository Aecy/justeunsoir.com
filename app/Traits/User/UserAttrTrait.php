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
            default => "",
        };
    }
}
