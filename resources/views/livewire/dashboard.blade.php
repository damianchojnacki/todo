<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-card class="bg-white dark:bg-gray-900 flex flex-col flex-wrap h-[75vh] place-content-start gap-x-6 relative">
            @forelse($todos as $todo)
                <livewire:todo :todo="$todo" :wire:key="$todo->id"/>
            @empty
                <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 text-xl flex flex-col items-center">
                    Wszystkie zadania wykonane :)

                    <a
                        href="/todos/create"
                        class="text-sm flex items-center rounded-lg mt-5 px-3 py-2 ring-1 ring-gray-600 cursor-pointer hover:ring-gray-500 hover:bg-gray-800 hover:text-gray-100 transition duration-150"
                    >
                        <span class="mr-1">Dodaj nowe</span>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>
                </div>
            @endforelse

            @if($todos->count() > 0)
                <a
                    href="/todos/create"
                    class="w-[30%] my-3 p-3 border-2 border-gray-300 dark:border-gray-600 dark:hover:border-gray-500 rounded-lg flex justify-center items-center items-center hover:text-transparent hover:text-gray-200 dark:hover:text-gray-800 transition duration-200 ease-in"
                >
                    <div class="text-gray-600 dark:text-gray-400 absolute cursor-pointer transform transition duration-200 ease-out hover:scale-110 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>

                    <div class="w-full">&nbsp</div>
                </a>
            @endif
        </x-card>
    </div>
</div>

<x-slot name="scripts">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js" integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        let oldWidth
        let newWidth

        Livewire.hook('message.received', (message, component) => {
            if(component.fingerprint.name !== 'navigation-menu'){
                return;
            }

            oldWidth = document.getElementById('expbar').dataset.width.split('%')[0]
        })

        Livewire.hook('message.processed', (message, component) => {
            if(component.fingerprint.name !== 'navigation-menu'){
                return;
            }

            newWidth = document.getElementById('expbar').dataset.width.split('%')[0]

            document.getElementById('expbar').style.width = oldWidth + '%'

            if(newWidth > oldWidth){
                let time = 0

                for(let i = oldWidth; i < newWidth; i++){
                    time += 10
                    setTimeout(() => document.getElementById('expbar').style.width = i + '%', time)
                }

                return;
            } else {
                let time = 0

                for(let i = oldWidth; i > newWidth; i -= 3){
                    console.log(i)
                    time += 30
                    setTimeout(() => document.getElementById('expbar').style.width = i + '%', time + 100)
                }
            }

            anime({
                loop: 1,
                translateY: -10,
                duration: 500,
                direction: 'alternate',
                easing: 'easeInOutSine',
                targets: '#level'
            })

            const container = document.getElementById('expbar');

            var a = 20;
            var l = 100;

            for (var i = 0; i <= l; i += 1) {
                var angle = 0.1 * i;
                var x = (a*angle)
                var y = 0

                var n = 5;

                for (var j = 0; j < n; j++) {
                    var dot = document.createElement("div");
                    dot.classList.add("absolute", "rounded-full", 'bg-yellow-500');
                    container.appendChild(dot);

                    var size = anime.random(1, 6);

                    dot.style.width = size + "px";
                    dot.style.height = size + "px";

                    dot.style.left = x + anime.random(-15, 15) + "px";
                    dot.style.top = y + anime.random(-15, 15) + "px";

                    dot.style.opacity = "0";

                }
            }

            anime({
                loop: false,
                easing: "linear",
                opacity: [
                    { value: 1, duration: 50, delay: anime.stagger(2) },
                    { value: 0, duration: function(){return anime.random(500,1500);}}
                ],
                width: { value: 2, duration: 500, delay: anime.stagger(2) },
                height: { value: 2, duration: 500, delay: anime.stagger(2) },

                targets: document.querySelectorAll("#expbar div"),

                translateX: {
                    value: function() {
                        return anime.random(-30, 30);
                    },
                    duration: 1500,
                    delay: anime.stagger(2)
                },
                translateY: {
                    value: function() {
                        return anime.random(-30, 30);
                    },
                    duration: 1500,
                    delay: anime.stagger(2)
                }
            });
        })
    </script>
</x-slot>
