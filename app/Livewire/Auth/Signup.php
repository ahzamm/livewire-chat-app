<?php

namespace App\Livewire\Auth;

use Illuminate\Auth\Events\Registered;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

#[Layout(\App\View\Components\Layouts\Guest::class)]
class Signup extends Component
{
    #[Validate('required|string')]
    public string $name = '';

    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string|confirmed')]
    public string $password = '';
    
    #[Validate('required|string')]
    public string $password_confirmation = '';

    public function signup()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $this->redirectIntended('dashboard');
    }
}
