<x-app-layout>
    <x-slot name="header">
            @isset($task)
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Editar Objetivo') }}
                </h2>
            @else
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Novo Objetivo') }}
                </h2>
            @endisset
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-gray-800">
                    <div class="overflow-x-auto">
                        @csrf
                        <form
                            class="flex"
                        @isset($task)
                            action="{{ route('update', ['id'=>$task->id]) }}"
                        @else
                            action="{{ route('new') }}"
                        @endisset ()
                        method="get">
                            <div class="form-control flex-grow">
                                <input 
                                    {{-- class="w-full" --}}
                                    id="title"
                                    type="text"
                                    placeholder="Titulo do Objetivo"
                                    @isset($task)
                                        value="{{ $task->title }}"
                                    @endisset
                                    class="input input-bordered m-4"
                                    name="title"
                                    oninput="checkValid(event)"
                                >
                            </div>
                            <button id="submit" disabled="true" type="submit" class="btn btn-success m-4 w-48">
                                @isset($task)
                                    Editar Objetivo
                                @else
                                    Criar Objetivo
                                @endisset
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function checkValid() {
        if (document.getElementById('title').value) {
            document.getElementById('submit').disabled = false
        }else{
            document.getElementById('submit').disabled = true
        }
    }
</script>