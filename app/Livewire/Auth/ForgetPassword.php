<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Facades\Password;

#[Layout(\App\View\Components\Layouts\Guest::class)]
class ForgetPassword extends Component
{
    #[Validate('required|string|email|exists:users,email')]
    public string $email = '';

    public function forgetPassword()
    {
        $this->validate();

        Password::sendResetLink(['email' => $this->email]);

        session()->flash('success', 'A reset link will be sent to your email');
    }
}
