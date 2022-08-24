
@if ($contacts)
    @foreach ($contacts as $contact)
        <div class="bg-cinza-200 rounded-lg shadow-lg">
            <table class="table-auto my-5 md:m-5">
                <tbody>
                    <tr class="flex flex-col md:flex-row p-3">
                        <td class="text-lg text-cinza-900 md:p-5 font-extrabold">{{ $contact->type }}:</td>
                        <td class="text-lg text-cinza-900 md:p-5">{{ $contact->description }}</td>
                        <td class="text-lg text-cinza-900 md:p-5">contato:  {{ $contact->contact }}</td>
                        <td class="text-lg text-cinza-900 md:p-5 md:px-10"> 
                            <button wire:click="editContact({{ $contact->id }})"
                                class=" text-azul-500  hover:text-amarelo-700">
                                Editar Contato
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endforeach
@else
<p class="px-3 text-lg text-cinza-900"> Nenhum contato encontrado </p>
@endif