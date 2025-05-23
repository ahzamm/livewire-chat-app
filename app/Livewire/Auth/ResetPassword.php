<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

#[Layout(\App\View\Components\Layouts\Guest::class)]
class ResetPassword extends Component
{
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string|confirmed')]
    public string $password = '';

    #[Validate('required|string')]
    public string $password_confirmation = '';

    public string $token = '';

    public function resetPassword()
    {
        $this->validate();

        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function ($user) {
                $user->forceFill(['password' => Hash::make($this->password), 'remember_token' => Str::random(60)]);
            },
        );

        if ($status != Password::PasswordReset) {
            $this->addError('email', 'Something Went Wrong');
        }
    }
}
