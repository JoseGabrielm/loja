<div class="mt-16 md:ml-32">
    <div class="fixed z-40 w-full">
        @include('livewire.admin.layouts.header', ['titleCrud' => 'Estados'])
    </div>

    <div class="pt-20">
        <div class="flex flex-col pt-3 pl-3">
            <div class="overflow-x-auto">
                <div class="inline-block py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b shadow border-cinza-300 sm:rounded-lg">
                        <table class="p-5 divide-y table-fixed divide-cinza-600">
                            <thead class="bg-cinza-200">
                                @include('livewire.admin.state.crud-head')
                            </thead>
                            <tbody class="divide-y bg-cinza-200 divide-cinza-500">
                                @include('livewire.admin.state.buttons')
                                @foreach ($this->States as $state)
                                    <tr class="odd:bg-cinza-300">
                                        @include('livewire.admin.state.crud-body')
                                        @include('livewire.admin.state.crud-button')
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('livewire.admin.state.crud-pagination')

    </div>
    <div class="mb-28"></div>
    @include('livewire.admin.state.modal-edit-new')
    @include('livewire.admin.state.modal-confirmation')
    @include('livewire.admin.state.modal-import')
</div>
