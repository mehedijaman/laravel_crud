@php
    $Todos = App\Models\Todo::all();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>
    @vite('resources/css/app.css')
</head>
<body>
   <div class="h-screen w-screen bg-gradient-to-r from-red-300 to-sky-300 flex flex-col gap-2 p-10 items-center">
        <h1 class="text-xl text-red-900 font-bold">Simple Todo App</h1>
        <div class="max-w-4xl w-full bg-white p-2 rounded-sm shadow-lg">
            @if(!isset($Item))
            <form action="/todo/store" method="POST" enctype="multipart/form-data" class="grid grid-cols-12 gap-2">
                {{ csrf_field() }}
                <div class="col-span-9">
                    <input class="w-full p-2 border focus:outline-none focus:border-green-200 focus:shadow-lg" type="text" name="task" placeholder="Enter new Task Description">
                </div>
                <div class="col-span-3 flex items-center">
                    <input class="w-full px-5 py-2 bg-sky-400 text-white rounded-md font-semibold hover:bg-sky-500  hover:cursor-pointer" type="submit" name="submit" value="Add new Task">
                </div>
            </form>
            @endif

            @if(isset($Item))
            <form action="/todo/update/{{ $Item->id }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-12 gap-2">
                {{ csrf_field() }}
                <div class="col-span-9">
                    <input class="w-full p-2 border focus:outline-none focus:border-green-200 focus:shadow-lg" type="text" name="task" placeholder="Enter new Task Description" value="{{ $Item->task }}">
                </div>
                <div class="col-span-3 flex items-center">
                    <input class="w-full px-5 py-2 bg-sky-400 text-white rounded-md font-semibold hover:bg-sky-500  hover:cursor-pointer" type="submit" name="submit" value="Update Task">
                </div>
            </form>
            @endif
        </div>

        <div class="max-w-4xl w-full bg-white p-2 raounded-sm shadow-lg">
            <table class="w-full table-fixed border-collapse border-slate-950 hover:border-blue-950">
                <thead>
                    <tr>
                        <th class="p-2 border border-slate-300">Todo Task Description</th>
                        <th class="p-2 border border-slate-300">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Todos as $Todo)
                    <tr>
                        <td class="p-2 border border-slate-300">
                            @if ($Todo->done != 0)
                                <strike>{{ $Todo->task }}</strike>
                            @else
                                {{ $Todo->task }}
                            @endif
                        </td>
                        <td class="p-2 border border-slate-300 flex gap-1 justify-end">
                            @if ($Todo->done != 0)
                            <form action="/todo/undo/{{ $Todo->id }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="submit" name="submit" value="Undo" class="px-2 bg-gray-400 text-white rounded-md hover:bg-gray-600 font-semibold hover:cursor-pointer">
                            </form>
                            @endif

                            @if($Todo->done == 0)
                            <form action="/todo/done/{{ $Todo->id }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="submit" name="submit" value="Mark as Done" class="px-2 bg-sky-400 text-white rounded-md hover:bg-sky-600 font-semibold hover:cursor-pointer">
                            </form>
                            @endif

                            <form action="/todo/edit/{{ $Todo->id }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="submit" name="submit" value="Edit" class="px-2 bg-yellow-400 text-white rounded-md hover:bg-yellow-600 font-semibold hover:cursor-pointer">
                            </form>

                            <form action="/todo/destroy/{{ $Todo->id }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="submit" name="submit" value="Delete" class="px-2 bg-red-400 text-white rounded-md hover:bg-red-600 font-semibold hover:cursor-pointer">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
   </div>
</body>
</html>
