<?php

namespace App\Actions\User;

use App\Models\User;

final class IncrementUserCreditAction
{
    public function execute(
        User $user,
        int $credits
    ): User
    {
        $user->increment(
            column: 'credits',
            amount: $credits
        );

        $user->save();
        return $user->refresh();
    }
}
