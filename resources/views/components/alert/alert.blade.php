@if (session()->has('success'))
    <div
        x-data="{open: true}"
        x-init="setTimeout(() => {open=false}, 4000)"
        x-show="open"
        x-transition:enter="transition duration-500 transform ease-out "
        x-transition:start="opacity-1"
        x-transition:leave="transition duration-500 transform ease-in"
        x-transition:end="opacity-0"
        class="flex items-center p-2 mb-4 text-branco bg-verde-400">
        <x-icon.checkmark class="w-5 h-6" />
        <span> {{ session('success') }} </span>
    </div>
@endif

@if (session()->has('error'))
    <div
        x-data="{open: true}"
        x-init="setTimeout(() => {open=false}, 4000)"
        x-show="open"
        x-transition:enter="transition duration-500 transform ease-out "
        x-transition:start="opacity-1"
        x-transition:leave="transition duration-500 transform ease-in"
        x-transition:end="opacity-0"
        class="flex items-center p-2 mb-4 text-branco bg-verde-400">
        <x-icon.close class="w-5 h-6" />
        <span> {{ session('success') }} </span>
    </div>
@endif

@if (session()->has('alert'))
    <div
        x-data="{open: true}"
        x-init="setTimeout(() => {open=false}, 4000)"
        x-show="open"
        x-transition:enter="transition duration-500 transform ease-out "
        x-transition:start="opacity-1"
        x-transition:leave="transition duration-500 transform ease-in"
        x-transition:end="opacity-0"
        class="flex items-center p-2 mb-4 text-branco bg-amarelo-400">
        <x-icon.notifications  class="w-5 h-6" />
        <span> {{ session('success') }} </span>
    </div>
@endif