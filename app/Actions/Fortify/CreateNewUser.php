<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'father_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:16'],
            'id_card_number' => ['required', 'string', 'max:255'],
            'salary' => ['required', 'numeric'],
            'bio' => ['required', 'max:255'],
            'role_id' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'father_name' => $input['father_name'],
            'phone_number' => $input['phone_number'],
            'id_card_number' => $input['id_card_number'],
            'salary' => $input['salary'],
            'bio' => $input['bio'],
            'role_id' => $input['role_id'],

            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
