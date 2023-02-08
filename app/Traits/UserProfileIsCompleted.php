<?php

namespace App\Traits;

trait UserProfileIsCompleted
{
    public function isCompleted(): bool
    {
        $requiredFields = [
            'gender',
            'martial',
            'age',
            'about_me',
            'looking_for',
            'interest_for',
            'smoking',
            'drinking',
            'height',
            'morphology',
            'hair_color',
            'eye_color'
        ];

        foreach ($requiredFields as $field) {
            if (is_null($this->$field)) {
                return false;
            }
        }

        return true;
    }
}
