<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsValidISBN implements Rule
{
    public function passes($attribute, $value)
    {
        // Vérifiez si l'ISBN est soit ISBN-10 soit ISBN-13
        if (preg_match('/^(?:\d{9}[\dX])$/', $value) || preg_match('/^\d{13}$/', $value)) {
            return true;
        }
        return false;
    }

    public function message()
    {
        return 'Le champ :attribute n’est pas un ISBN valide.';
    }
}
