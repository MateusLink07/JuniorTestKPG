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
                    <div class="overflow-x-auto flex">
                        @csrf
                        <form
                        @isset($task)
                            action="/task/{{ $task->id }}/update"
                        @else
                            action="/task/new"
                        @endisset ()
                        method="get">
                            <div class="form-control">
                                <label class="label">
                                  <span class="label-text">Username</span>
                                </label>
                                <input 
                                    type="text"
                                    placeholder="Titulo do Objetivo"
                                    @isset($task)
                                        value="{{ $task->title }}"
                                    @endisset
                                    class="input input-bordered"
                                    name="title"
                                >
                            </div>
                            <button type="submit" class="btn btn-success">
                                @isset($task)
                                    Editar Objetivo
                                @else
                                    Criar Objetivo
                                @endisset
                            </button>
                        </form>
                    </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
