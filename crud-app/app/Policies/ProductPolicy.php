<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    //                         guest user  admin
// see public products 	        yes	 yes	yes
// paginated links	            no	 yes	yes
// search	                    no	 yes	yes
// access admin	                no	 no	    yes
// create, edit, and delete	    no	 no	    yes
    /**
     * Determine whether the user can view products.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view product.
     */
    public function view(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view paginated products.
     */
    public function paginate(User $user): bool
    {
        //Authenticated users and admins
        return isset($user);
    }
    /**
     * Determine whether the user can use search.
     */
    public function search(User $user): bool
    {
        //Authenticated users & admins
        return isset($user);
    }
    /**
     * Determine whether the user can view products.
     */
    public function accessAdmin(User $user): bool
    {
        //Return true if user is authenticated and admin
        return isset($user) && $user->role === 'administrator';
    }
    /**
     * Determine whether the user can view products.
     */
    public function manage(User $user): bool
    {
        //Return true if user is authenticated and admin
        return $user->role === 'administrator';
    }
    /**
     * Determine whether the user can view products.
     */

}
