<?php

namespace App\Traits;

trait UserProfileIsCompleted
{
    public function isCompleted(): bool
    {
        foreach ($this->getRequiredFields() as $field) {
            if (is_null($this->$field)) {
                return false;
            }
        }

        return true;
    }

    public function completionPercentage(): float
    {
        $completedFields = 0;

        foreach ($this->getRequiredFields() as $field) {
            if (!is_null($this->$field)) {
                $completedFields++;
            }
        }

        return round($completedFields / count($this->getRequiredFields()) * 100);
    }

    private function getRequiredFields(): array
    {
        return [
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
    }
}
