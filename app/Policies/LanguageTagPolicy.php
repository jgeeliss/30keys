<?php

namespace App\Policies;

use App\Models\LanguageTag;
use App\Models\User;

class LanguageTagPolicy
{
    /**
     * Determine whether the user can view any language tags.
     */
    public function viewAny(?User $user): bool
    {
        return true; // Anyone can view language tags
    }

    /**
     * Determine whether the user can view the language tag.
     */
    public function view(?User $user, LanguageTag $languageTag): bool
    {
        return true; // Anyone can view a specific language tag
    }

    /**
     * Determine whether the user can create language tags.
     */
    public function create(User $user): bool
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can update the language tag.
     */
    public function update(User $user, LanguageTag $languageTag): bool
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can delete the language tag.
     */
    public function delete(User $user, LanguageTag $languageTag): bool
    {
        return $user->is_admin;
    }
}
