<div class="py-10">
    <form wire:submit.prevent="submit">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <x-card class="bg-white dark:bg-gray-900">
                <div class="flex flex-col md:flex-row justify-between mb-5 gap-5 md:gap-0">
                    <x-input class="md:w-[30vw]" id="name" label="Nazwa" wire:model.defer="todo.name" autofocus/>

                    <x-select
                        label="Priorytet"
                        placeholder="Wybierz"
                        option-value="value"
                        option-label="name"
                        :options="$priority"
                        wire:model.defer="todo.priority"
                    />

                    <x-datetime-picker
                        label="Data"
                        placeholder="Wybierz"
                        wire:model.defer="todo.deadline_at"
                    />
                </div>

                <x-textarea wire:model="todo.description" label="Opis" placeholder="Wpisz" />

                <div class="flex justify-between">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-button type="button" class="!block mr-auto mt-5">Wróć</x-jet-button>
                    </a>

                    <x-jet-button type="submit" class="mt-5 bg-green-500 dark:bg-green-800 hover:bg-green-600 dark:hover:bg-green-700">Zapisz</x-jet-button>
                </div>
            </x-card>
        </div>
    </form>
</div>
