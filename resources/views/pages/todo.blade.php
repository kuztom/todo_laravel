<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-layout: auto">
                        <thead>
                        <tr>
                            <th>Task</th>
                            <th>Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td><strong>{{ $task->title }}</strong></td>
                                <td class="text-sm">{{ $task->content }}</td>
                                <td class="text-blue-700"><a href="{{ route('tasks.edit', $task) }}">Edit</a></td>
                                <td class="text-red-700" >
                                    <form method="post" action="{{ route('tasks.destroy', $task) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="confirm('Task will be deleted: {{ $task->title }} Proceed?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
