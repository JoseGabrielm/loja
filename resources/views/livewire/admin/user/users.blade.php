<div class="md:ml-32 mt-16">
    <div class="fixed w-full z-40">
        @include('livewire.admin.layouts.header', ['titleCrud' => 'Usuários'])
    </div>

    <div class="pt-20">
        <div class="flex flex-col pl-3 pt-3">
            <div class="overflow-x-auto">
                <div class="py-2 align-middle inline-block sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-cinza-300 sm:rounded-lg">
                        <table class="table-fixed divide-y divide-cinza-600 p-5">
                            <thead class="bg-cinza-200">
                                @include('livewire.admin.user.crud-head')
                            </thead>
                            <tbody class="bg-cinza-200 divide-y divide-cinza-500">
                                @include('livewire.admin.user.buttons')
                                @foreach ($this->users as $user)
                                <tr class="odd:bg-cinza-300">                                 
                                        @include('livewire.admin.user.crud-body')
                                        @include('livewire.admin.user.crud-button')
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('livewire.admin.user.crud-pagination')
    </div>
    <div class="mb-28">
    @include('livewire.admin.user.modal-edit-new')
    @include('livewire.admin.user.modal-confirmation')
    </div>  
</div>