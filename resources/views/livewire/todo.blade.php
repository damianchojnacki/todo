<div class="{{ $todo->priority->value == 1 ? 'border-blue-200 dark:border-blue-800 hover:border-blue-300 dark:hover:border-blue-600' : null }} {{ $todo->priority->value == 2 ? 'border-red-200 dark:border-red-800 hover:border-red-300 dark:hover:border-red-600' : null }} {{ $todo->priority->value == 0 ? 'border-gray-300 dark:border-gray-600 dark:hover:border-gray-500' : null }} group relative w-[30%] my-3 p-3 pr-8 border-2 rounded-lg flex justify-center items-center items-center hover:text-transparent hover:text-gray-200 dark:hover:text-gray-800 transition duration-200 ease-in">
    <div
        wire:click="done"
        class="group-hover:opacity-100 opacity-0 text-gray-600 dark:text-gray-400 absolute cursor-pointer transform transition duration-200 hover:scale-110 hover:text-white"
    >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
        </svg>
    </div>

    <div class="absolute right-0 mr-3">
        <x-jet-dropdown align="left" width="48">
            <x-slot name="trigger">
                <div class="text-gray-600 dark:text-gray-400 cursor-pointer transform transition duration-200 ease-in hover:scale-110 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                    </svg>
                </div>
            </x-slot>

            <x-slot name="content">
                <x-jet-dropdown-link href="{{ route('todos.edit', ['todo' => $todo->id]) }}">
                    Szczegóły
                </x-jet-dropdown-link>

                <x-jet-dropdown-link href="#" wire:click="delete">
                    Usuń
                </x-jet-dropdown-link>

                @if($todo->priority->value > 0)
                    <x-jet-dropdown-link href="#" wire:click="changePriority({{$todo->priority->value - 1}})">
                        Zmniejsz priorytet
                    </x-jet-dropdown-link>
                @endif

                @if($todo->priority->value < 2)
                    <x-jet-dropdown-link href="#" wire:click="changePriority({{$todo->priority->value + 1}})">
                        Zwiększ priorytet
                    </x-jet-dropdown-link>
                @endif
            </x-slot>
        </x-jet-dropdown>
    </div>

    <div class="w-full cursor-default">{{$todo->name}}</div>
</div>
