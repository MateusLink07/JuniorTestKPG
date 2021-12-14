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
                    <div class="overflow-x-auto ">
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
                            <tbody >
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td
                                    @if ($task->done)
                                        class="text-green-400 w-full"
                                           
                                    @else
                                        class="text-gray-800  w-full"
                                    @endif
                                        >
                                            {{ $task->title }}
                                        </td>
                                        <td class="p-4 flex justify-center align-middle">

                                            <form id="change{{$task->id}}" action="{{ route('change', $task->id) }}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <input 
                                                    type="checkbox"
                                                    onchange="document.getElementById('change{{$task->id}}').submit()"
                                                    class="toggle text-green-400 my-3 mx-2"
                                                    @if ($task->done == 1)
                                                        checked
                                                    @endif
                                                >
                                            </form>

                                            <a class="btn btn-info btn-circle btn-outline mx-2" href="{{ route('editTaskView', $task->id) }}">
                                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                                </svg>
                                            </a>

                                            <form action="{{ route('delete', $task->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-error btn-circle btn-outline mx-2">
                                                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex justify-end">
                            @if ($tasks->hasPages())
                            <div class="btn-group p-4">
                                @for ($i = 1; $i <= $tasks->lastPage(); $i++)
                                    <a href="{{route('listTaskView').'?page='.$i}}" 
                                    @if ($i == $tasks->currentPage())
                                        disabled
                                    @endif
                                    class="btn btn-outline btn-success">
                                        {{ $i }}
                                    </a>
                                @endfor
                            </div>                                
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

