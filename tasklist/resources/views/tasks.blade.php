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
                                                <a class="btn btn-success btn-circle btn-outline" href="{{ route('change', $task->id) }}">
                                                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" />
                                                    </svg>
                                                </a>
                                                <a class="btn btn-info btn-circle btn-outline" href="{{ route('editTaskView', $task->id) }}">
                                                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                                    </svg>
                                                </a>
                                                <a class="btn btn-error btn-circle btn-outline" href="{{ route('delete', $task->id) }}">
                                                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                                                    </svg>
                                                </a>
                                            </th>
                                        @else
                                            <th class="flex align-center">
                                                Objetivo Completo!
                                                <a class="btn btn-error btn-circle btn-outline" href="{{ route('delete', $task->id) }}">
                                                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                                                    </svg>
                                                </a>
                                            </th>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex justify-end">
                            <div class="btn-group">
                                @for ($i = 1; $i <= $length; $i++)
                                    <input type="radio" name="options" id="option2" data-title="{{ $i }}" 
                                        @if ( $actualPage == $i)
                                            checked="checked"                                            
                                        @endif
                                        class="btn"
                                        onchange="window.location.assign('{{ route('listTaskView').'?page='.$i }}')"
                                    >
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

