<?php

namespace App\Http\Livewire;

use App\Models\Priority;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\Todo;

class EditTodo extends Component
{
    public ?Todo $todo;

    public function getRules(): array
    {
        return [
            'todo.name' => ['required', 'string', 'max:64'],
            'todo.priority' => ['required', 'integer', Rule::in(Priority::values())],
            'todo.deadline_at' => ['nullable', 'datetime', 'after_or_equal:today'],
            'todo.description' => ['nullable', 'string', 'max:1024'],
        ];
    }

    public function mount(?Todo $todo)
    {
        $this->todo = $todo ?? new Todo();

        $this->todo->fill([
            'user_id' => Auth::id(),
            'priority' => $this->todo->priority ?? Priority::LOW,
        ]);
    }

    public function render()
    {
        return view('livewire.edit-todo', [
            'priority' => collect(Priority::cases())->map(fn ($priority) => [
                'name' => $priority->getDisplayName(),
                'value' => $priority->value
            ]),
        ]);
    }

    public function submit()
    {
        $this->validate();

        $this->todo->fill([
            'user_id' => Auth::id(),
        ]);

        $this->todo->save();

        $this->redirect(route('dashboard'));
    }
}
