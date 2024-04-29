<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        .sidebar {
            width: 240px;
        }

        .sidebar a {
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #4a5568;
        }

        .sidebar i {
            font-size: 1.5rem;
        }

        .sidebar span {
            font-size: 0.9375rem;
        }
    </style>
</head>

<body>

    <div class="flex flex-row">
        <div class="flex flex-col h-screen overflow-y-auto bg-gray-900 border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700 sidebar">
            <div class="text-center bg-gray-900 text-gray-100 text-xl p-2.5 mt-1 flex items-center">
                <h1 class="font-bold ml-3 text-[15px]">Admin Page</h1>
            </div>
            <div class="my-2 bg-gray-600 h-[1px]"></div>
            <a href="{{ route('admin/matkuls') }}">
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer text-white">
                    <i class="bi bi-archive-fill"></i>
                    <span class="ml-4 font-bold">Mata Kuliah</span>
                </div>
            </a>
            <a href="{{ route('admin/jadwals') }}">
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer text-white">
                    <i class="bi bi-bookmarks-fill"></i>
                    <span class="ml-4 font-bold">Jadwal</span>
                </div>
            </a>
            <a href="{{ route('admin/users') }}">
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer text-white">
                    <i class="bi bi-people-fill"></i>                    
                    <span class="ml-4 font-bold">User</span>
                </div>
            </a>
            <a href="{{ route('logout') }}">
                <div class="my-4 bg-gray-600 h-[1px]"></div>
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer text-white">
                    <i class="bi bi-box-arrow-left"></i>
                    <span class="ml-4 font-bold">Logout</span>
                </div>
            </a>
        </div>
        <div class="flex flex-col w-full h-screen px-4 py-8 mt-10">
            <div>@yield('contents')</div>
        </div>
    </div>
</body>

</html>
