<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Student</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="h-screen w-screen bg-gradient-to-r from-red-200 to-sky-200 flex flex-col items-center justify-center pt-5">
        <div class="max-w-4xl w-full flex justify-start">
            <a href="/student" class="bg-sky-600 px-5 py-2 text-white rounded-md hover:bg-sky-700 ">Back to List</a>
        </div>
        <div class="max-w-sm w-full bg-white p-5 rounded-md shadow-lg">
            <h1 class="text-center font-bold text-xl">Edit Student</h1>
           <form action="/student/update/{{ $Student->id }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-2">
                {{ csrf_field() }}
                <div>
                    <label for="">Name :</label>
                    <input name="name" class="w-full border border-slate-700 py-2 px-5 focus:outline-none" type="text" placeholder="Student name" value="{{ $Student->name }}">
                </div>
                <div>
                    <label for="">Roll:</label>
                    <input name="roll" class="w-full border border-slate-700 py-2 px-5 focus:outline-none" type="text" placeholder="Roll" value="{{ $Student->roll }}">
                </div>
                <div>
                    <label for="">Father Name :</label>
                    <input name="father_name" class="w-full border border-slate-700 py-2 px-5 focus:outline-none" type="text" placeholder="Father's Name" value="{{ $Student->father_name }}">
                </div>
                <div>
                    <label for="">Mother Name :</label>
                    <input name="mother_name" class="w-full border border-slate-700 py-2 px-5 focus:outline-none" type="text" placeholder="Mother's Name" value="{{ $Student->mother_name }}">
                </div>
                <div>
                    <label for="">Date of Birthlabel
                    <input name="dob" class="w-full border border-slate-700 py-2 px-5 focus:outline-none" type="text" placeholder="Date of Birth" value="{{ $Student->dob }}">
                </div>
                <div>
                    <label for="">Gender :</label>
                    <input name="gender" class="w-full border border-slate-700 py-2 px-5 focus:outline-none" type="text" placeholder="Gender" value="{{ $Student->gender }}">
                </div>
                <div>
                    <label for="">Nationality:</label>
                    <input name="nationality" class="w-full border border-slate-700 py-2 px-5 focus:outline-none" type="text" placeholder="Nationality" value="{{ $Student->nationality }}">
                </div>

                <div class="flex justify-center">
                    <input type="submit" name="subit" value="Update Student" class="bg-gradient-to-r from-blue-500 to-sky-300 py-2 px-5 rounded-md text-white font-semibold hover:bg-blue-600 hover:cursor-pointer">
                </div>
           </form>
        </div>
    </div>
</body>
</html>
