<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Clinic Patient Records'))</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f3f6fa;
            color: #212529;
        }

        .clinic-navbar {
            background-color: #0d6efd;
            min-height: 55px;
        }

        .clinic-navbar .brand {
            color: #fff;
            font-size: 21px;
            font-weight: 700;
            text-decoration: none;
        }

        .clinic-navbar a {
            text-decoration: none;
        }

        .clinic-main {
            max-width: 1200px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .clinic-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .clinic-btn {
            display: inline-block;
            border: 1px solid #0d6efd;
            border-radius: 6px;
            background: #0d6efd;
            color: #fff;
            padding: 9px 15px;
            text-decoration: none;
            cursor: pointer;
        }

        .clinic-btn:hover {
            background: #0b5ed7;
            color: #fff;
        }

        @media (max-width: 600px) {
            .clinic-navbar .brand {
                font-size: 17px;
            }

            .clinic-main {
                margin-top: 22px;
                padding: 0 12px;
            }
        }
    </style>
</head>

<body>
    <div class="min-h-screen">
        <nav class="clinic-navbar">
            <div style="max-width: 1200px; margin: auto; padding: 12px 20px;
                        display: flex; justify-content: space-between;
                        align-items: center; gap: 12px; flex-wrap: wrap;">

                <a href="{{ route('patients.index') }}" class="brand">
                    Clinic Patient Records
                </a>

                <div style="display: flex; gap: 10px; align-items: center;">
                    <a href="{{ route('patients.index') }}"
                       style="color: white; border: 1px solid rgba(255,255,255,.65);
                              border-radius: 5px; padding: 6px 10px;">
                        Patient List
                    </a>

                    <a href="{{ route('patients.create') }}"
                       style="color: #212529; background: white; border-radius: 5px;
                              padding: 7px 12px;">
                        + Register Patient
                    </a>
                </div>
            </div>
        </nav>

        @isset($header)
            <header class="bg-white shadow-sm">
                <div class="mx-auto max-w-7xl px-4 py-5 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main>
            {{ $slot ?? '' }}
        </main>
    </div>
</body>
</html>