<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
   <div class="h-screen w-screen bg-gradient-to-r from-red-300 to-sky-300 flex flex-col gap-4 justify-center items-center">
        <div class="max-w-4xl w-full flex justify-start">
            <a href="/student/create" class="bg-sky-600 px-5 py-2 text-white rounded-md hover:bg-sky-700 ">Create New Student</a>
        </div>
        <div class="max-w-4xl w-full bg-white p-5 rounded-sm shadow-lg">
            <table class="w-full table-auto border-collapse border-slate-900 hover:border-blue-600">
                <thead>
                    <tr>
                        <th class="px-2 border border-slate-300">#</th>
                        <th class="px-2 border border-slate-300">Name</th>
                        <th class="px-2 border border-slate-300">Roll</th>
                        <th class="px-2 border border-slate-300">Father</th>
                        <th class="px-2 border border-slate-300">Mother</th>
                        <th class="px-2 border border-slate-300">DOB</th>
                        <th class="px-2 border border-slate-300">Gender</th>
                        <th class="px-2 border border-slate-300">Nationality</th>
                        <th class="px-2 border border-slate-300">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $serial = 0; @endphp
                    @foreach($Students as $Student)
                    @php $serial++; @endphp
                    <tr>
                        <td class="px-2 border border-slate-300">{{ $serial }}</td>
                        <td class="px-2 border border-slate-300">{{ $Student->name }}</td>
                        <td class="px-2 border border-slate-300">{{ $Student->roll }}</td>
                        <td class="px-2 border border-slate-300">{{ $Student->father_name }}</td>
                        <td class="px-2 border border-slate-300">{{ $Student->mother_name }}</td>
                        <td class="px-2 border border-slate-300">{{ $Student->gender }}</td>
                        <td class="px-2 border border-slate-300">{{ $Student->dob }}</td>
                        <td class="px-2 border border-slate-300">{{ $Student->nationality }}</td>
                        <td class="px-2 border border-slate-300">
                            <div class="flex gap-2">
                                <form action="/student/destory/{{  $Student->id }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="submit" name="submit" value="Delete" class="bg-red-600 px-2 rounded-md text-white hover:cursor-pointer hover:bg-red-800">
                                </form>

                                <form action="/student/edit/{{  $Student->id }}" method="GET" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="submit" name="submit" value="Edit" class="bg-yellow-500 px-2 rounded-md text-white hover:cursor-pointer hover:bg-yellow-700">
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
   </div>
</body>
</html>
