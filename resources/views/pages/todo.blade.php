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
                    <table style="width: 90%">
                        <thead style="text-align: left">
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Title</th>
                            <th>Details</th>
                            <th></th>
                            <th>Compleated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td class="text-green-700">
                                    <form method="post" action="{{ route('tasks.complete', $task) }}">
                                        @csrf
                                        <button type="submit"
                                                onclick="return confirm('Are You Ok?')">
                                            @if(!$task->completed_at) Done @endif
                                            @if($task->completed_at) Redo @endif
                                        </button>
                                    </form>
                                </td>

                                <td class="text-red-700">
                                    <form method="post" action="{{ route('tasks.destroy', $task) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Task will be deleted: {{ $task->title }} Proceed?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>

                                </td>
                                <td>
                                    <strong>
                                        @if($task->completed_at) <s> @endif
                                            {{ $task->title }}
                                            @if($task->completed_at) </s> @endif
                                    </strong>
                                </td>
                                <td class="text-sm">
                                    @if($task->completed_at) <s> @endif
                                        {{ $task->content }}
                                        @if($task->completed_at) </s> @endif
                                </td>
                                <td class="text-blue-700"><a href="{{ route('tasks.edit', $task) }}">Edit</a></td>
                                @if($task->completed_at)
                                    <td class="text-sm">
                                        {{ $task->completed_at }}
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
