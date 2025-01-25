<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>testCode.</title>
    @vite('resources/css/app.css')
</head>

<body>
    @include('layouts.navbar')

    @if (session()->has('success'))
        <div id="notif" class="toast toast-top toast-center mt-20 z-20">
            <div class="alert bg-yellow-500">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 lg:size-8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span class="ml-2">{{ session('success') }}</span>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const notif = document.getElementById('notif');
                setTimeout(() => {
                    notif.classList.add('opacity-0'); // Menambahkan kelas untuk transisi
                    setTimeout(() => notif.remove(), 500); // Menghapus elemen setelah transisi selesai
                }, 5000); // 3000ms = 3 detik sebelum dismiss
            });
        </script>
    @endif

    <section>
        <div class="mx-auto max-w-7xl px-6 lg:px-8 py-12">
            @yield('content')
        </div>
    </section>
</body>

</html>
