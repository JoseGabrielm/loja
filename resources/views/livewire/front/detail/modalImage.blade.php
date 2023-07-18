<template
    @img-modal.window="imgModal = true; imgModalSrc = $event.detail.imgModalSrc; imgModalDesc = $event.detail.imgModalDesc;"
    x-if="imgModal">
    <div x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90"
        x-on:click.away="imgModalSrc = ''"
        class="fixed inset-0 z-50 flex items-center justify-center w-full h-screen p-2 overflow-hidden bg-opacity-75 bg-preto">
        <div @click.away="imgModal = ''" class="flex flex-col max-w-3xl max-h-full overflow-auto">
            <div class="p-2">
                <img :alt="imgModalSrc" class="object-contain" :src="imgModalSrc">
            </div>
        </div>
    </div>
</template>
