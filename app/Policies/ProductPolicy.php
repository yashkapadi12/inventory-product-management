<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;

class ProductPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function create(User $user)
    {
        return $user->role_id === 1; // Assuming 1 is the role ID for admin
    }

    public function update(User $user, Product $product)
    {
        return $user->role_id === 1; // Admin can update
    }

    public function delete(User $user, Product $product)
    {
        return $user->role_id === 1; // Admin can delete
    }

    public function download(User $user, Product $product)
    {
        return $user->role_id === 1; // Admin can delete
    }

}
