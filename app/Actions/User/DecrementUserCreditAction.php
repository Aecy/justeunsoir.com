<?php

namespace App\Actions\User;

use App\Models\User;

final class DecrementUserCreditAction
{
    public function execute(
        User $user,
        int $credits
    ): User
    {
        $user->decrement(
            column: 'credits',
            amount: $credits
        );

        $user->save();
        return $user->refresh();
    }
}
