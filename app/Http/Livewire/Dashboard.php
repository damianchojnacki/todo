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

class Dashboard extends Component
{
    protected $listeners = [
        'todo-updated' => '$refresh'
    ];

    public function render(): View
    {
        return view('livewire.dashboard', [
            'todos' => Auth::user()
                ->todos()
                ->notDone()
                ->get()
                ->sortBy(fn($todo) => $todo->priority->value, SORT_REGULAR, true)
        ])->layout('layouts.app', [
            'user' => Auth::user(),
        ]);
    }
}
