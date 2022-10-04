<?php

namespace App\Http\Livewire;

use App\Models\Priority;
use App\Models\Todo as TodoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Todo extends Component
{
    public TodoModel $todo;

    public function render(): View
    {
        return view('livewire.todo');
    }

    public function done()
    {
        $this->todo->update(['is_done' => true]);

        Auth::user()->increment('experience', $this->todo->priority->value + 1);

        $this->emitUp('todo-updated');

        $this->emit('refresh-navigation-menu');
    }

    public function delete()
    {
        $this->todo->deleteOrFail();

        $this->emitUp('todo-updated');
    }

    public function changePriority(int $priority)
    {
        $this->todo->update(['priority' => Priority::from($priority)]);

        $this->emitUp('todo-updated');
    }
}
