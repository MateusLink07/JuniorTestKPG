<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Objetivos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-gray-800">
                    <div class="overflow-x-auto">
                        <div class="w-full flex justify-end p-4">
                            <a href="{{ route('newTaskView') }}" class="btn btn-success">Novo Objetivo</a>
                        </div>
                        <table class="table w-full">
                            <thead>
                                <tr class="text-gray-800">
                                    <th>
                                        Objetivo
                                    </th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    @if ($task->done)
                                        <tr class="text-green-400">
                                    @else
                                        <tr class="text-gray-800">
                                    @endif
                                        <th class="w-full">
                                            {{ $task->title }}
                                        </th>
                                        @if (!$task->done)
                                            <th class="p-4">
                                                <a class="btn btn-success" href="{{ route('change', $task->id) }}">Completar</a>
                                                <a class="btn btn-info" href="{{ route('editTaskView', $task->id) }}">Editar</a>
                                                <a class="btn btn-error" href="{{ route('delete', $task->id) }}">Deletar</a>
                                            </th>
                                        @else
                                            <th>
                                                Objetivo Completo!
                                                <a class="btn btn-error btn-outline p-4" href="{{ route('delete', $task->id) }}">Deletar</a>
                                            </th>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
