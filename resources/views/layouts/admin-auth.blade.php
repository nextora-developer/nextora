<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', config('app.name'))</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-100 dark:bg-slate-950">
    @yield('content')
</body>

</html>
