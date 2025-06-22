<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LSP SMART2 | Login</title>
        <link rel="icon" href="../assets/img/logo-smart2.png" type="image/png">
        <link href="../assets/css/output.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#2D336B] to-[#0C0E24] font-poppins px-4">

        <div class="bg-white px-6 py-8 sm:px-8 rounded-2xl shadow-xl w-full max-w-md">
            <div class="text-center mb-6" data-aos="fade-down" data-aos-delay="100" data-aos-duration="1000">
                <h2 class="text-xl sm:text-2xl font-semibold text-gray-700">Silahkan Login</h2>
                <p class="text-sm text-gray-500">Masukkan username dan password!</p>
                <?php session_start(); if (isset($_SESSION['error'])): ?>
                  <div class="text-red-500 text-sm">
                    <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                  </div>
                <?php endif; ?>
              </div>
              
                
            <form action="<?= BASE_URL ?>/AuthController/login" method="POST" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="1000">
                <div class="mb-4 text-left">
                    <label for="username" class="block text-sm font-medium text-gray-600 mb-1">Username</label>
                    <input type="username" id="username" placeholder="Masukkan username" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                </div>

                <div class="mb-6 text-left relative">
                    <label for="password" class="block text-sm font-medium text-gray-600 mb-1">Password</label>
                    <input type="password" id="password" placeholder="Masukkan Password" required
                        class="w-full px-4 py-2 pr-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                    <button type="button" id="togglePassword"
                        class="absolute top-9 right-3 text-gray-400 hover:text-gray-600 focus:outline-none transition duration-300">
                        <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-5.523 0-10-4.477-10-10 
                                0-1.19.23-2.33.65-3.375m6.39 5.65a3 3 0 014.243 4.243m-1.51-1.51
                                a3 3 0 00-4.243-4.243M15 12a3 3 0 01-6 0 3 3 0 016 0z" />
                        </svg>
                        <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 
                                8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 
                                7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>

                <button type="submit"class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold text-base py-3 rounded-lg transition duration-300">
                    Sign in
                </button>
            </form>
        </div>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();

            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            const eyeOpen = document.querySelector('#eyeOpen');
            const eyeClosed = document.querySelector('#eyeClosed');

            togglePassword.addEventListener('click', () => {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);

                eyeOpen.classList.toggle('hidden');
                eyeClosed.classList.toggle('hidden');
            });
        </script>

    </body>
</html>