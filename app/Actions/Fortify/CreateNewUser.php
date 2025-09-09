<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Validation\Rules\Password;

class CreateNewUser implements CreatesNewUsers
{
    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']), // ✅ contraseña encriptada
        ]);
    }

    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    protected function passwordRules()
    {
        return [
            'required',
            'string',
            Password::min(8)        // longitud mínima 8
                ->letters()          // al menos una letra
                ->numbers()          // al menos un número
                ->symbols()          // al menos un símbolo
                ->uncompromised(),   // no debe estar en listas de contraseñas filtradas
            'regex:/[a-z]/',         // al menos una minúscula
            'regex:/[A-Z]/',         // al menos una mayúscula
        ];
    }
}
