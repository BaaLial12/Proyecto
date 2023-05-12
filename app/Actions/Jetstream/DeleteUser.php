<?php

namespace App\Actions\Jetstream;

use App\Models\User;
use Laravel\Jetstream\Contracts\DeletesUsers;
use Stripe\Stripe;


class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     */
    public function delete(User $user): void
    {
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();


        $stripe = new \Stripe\StripeClient(
            'sk_test_51N0gRELnKtweIPwLPkvOFOdBUJzlFjDyHKESg6bDhFn9erZ7AkyqtNxSVn0wLX7EG4qrKdJ4GpscTW4pvLYRMQGU0055QNZ8ur'
          );

        $stripe->customers->delete(
            $user->stripe_id
        );

        $user->delete();
    }
}
