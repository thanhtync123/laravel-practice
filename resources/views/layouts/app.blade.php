<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Hệ Thống Quản Lý Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10">
    <div class="container mx-auto max-w-2xl bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4 border-b pb-2">@yield('page_title')</h1>

        <div>
            @yield('content')
        </div>
    </div>
</body>
</html>