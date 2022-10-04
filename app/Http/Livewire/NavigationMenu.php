<?php

namespace App\Http\Livewire;

use App\Models\Priority;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class NavigationMenu extends Component
{
    public User $user;

    protected $listeners = [
        'refresh-navigation-menu' => '$refresh',
    ];

    public function render(): View
    {
        return view('navigation-menu');
    }
}
