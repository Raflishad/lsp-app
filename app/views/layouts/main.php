<!DOCTYPE html>
<html lang="id" class="<?= isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'dark' ? 'dark' : '' ?>">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?> | LSP SMART2</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.0/dist/tailwind.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/img/logo-smart2.png" type="image/png">
    <link href="../../assets/css/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        darkMode: 'class'
    }
    </script>
</head>
<body class="relative font-poppins scroll-smooth overflow-x-hidden bg-gray-50 dark:bg-gray-800 dark:text-white">
    <!-- Efek glow -->
<div id="cursor-glow" class="pointer-events-none absolute w-40 h-40 rounded-full dark:bg-blue-400/20 blur-3xl opacity-0 transition-opacity duration-300 z-0"></div>

        <nav id="navbar" class="fixed top-6 left-1/2 transform -translate-x-1/2 w-[90%] max-w-full px-6 py-3 z-50 rounded-xl sm:rounded-xl md:rounded-full lg:rounded-full text-white transition-all duration-300 backdrop-blur-md md:bg-transparent md:backdrop-blur-0">

            <div class="flex items-center justify-between">
                <!-- Logo untuk Light Mode -->
                <img src="../../assets/img/logo2.png" alt="Logo" class="h-8 block dark:hidden">

                <!-- Logo untuk Dark Mode -->
                <img src="../../assets/img/logo1.png" alt="Logo" class="h-8 hidden dark:block">


                <button id="menu-toggle" class="md:hidden text-blue-600 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <div class="hidden md:flex space-x-8 nav-links">
                    <?php if ($_SESSION['user']['role'] == 'siswa'): ?>
                        <a href="<?= BASE_URL ?>/SiswaController/index" class="px-4 py-2 transition-colors duration-300 hover:scale-110 text-blue-500 nav-link dark:text-white">Beranda</a>
                        <a href="<?= BASE_URL ?>/SiswaController/berkas" class="px-4 py-2 transition-colors duration-300 hover:scale-110 text-blue-500 nav-link dark:text-white">Dokumen</a>
                        <a href="<?= BASE_URL ?>/SiswaController/asesmen" class="px-4 py-2 transition-colors duration-300 hover:scale-110 text-blue-500 nav-link dark:text-white">Asesmen Mandiri</a>
                    <?php elseif ($_SESSION['user']['role'] == 'asesor'): ?>
                        <a href="<?= BASE_URL ?>/AsesorController/index" class="px-4 py-2 transition-colors duration-300 hover:scale-110 text-green-500 nav-link dark:text-white">Dashboard</a>
                        <a href="<?= BASE_URL ?>/AsesorController/peserta" class="px-4 py-2 transition-colors duration-300 hover:scale-110 text-green-500 nav-link dark:text-white">Daftar Peserta</a>
                        <a href="<?= BASE_URL ?>/AsesorController/penilaian" class="px-4 py-2 transition-colors duration-300 hover:scale-110 text-green-500 nav-link dark:text-white">Penilaian</a>
                    <?php endif; ?>
                </div>
      
                <div class="hidden md:flex items-center space-x-4">
                    <a href="#" title="Profil" aria-label="Profil" class="w-10 h-10 bg-blue-100 text-blue-800 rounded-full flex items-center justify-center hover:scale-105 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor" class="w-5 h-5">
                            <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/>
                        </svg>
                    </a>
                    <button id="toggle-dark" title="Toggle Dark Mode" class="w-10 h-10 bg-gray-200 dark:bg-blue-500 text-black dark:text-white rounded-full flex items-center justify-center hover:scale-105 transition">
                        <svg id="dark-icon" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m8.49-8.49l-.71.71m-13.56 0l-.71-.71m15.56-5.66l-.71.71m-13.56 0l-.71-.71M4 12H3m18 0h-1M12 5a7 7 0 100 14a7 7 0 000-14z" />
                        </svg>
                        <svg id="light-icon" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a.75.75 0 01.75.75v1.5a.75.75 0 01-1.5 0v-1.5A.75.75 0 0110 2zm0 12a4 4 0 100-8 4 4 0 000 8zm0 4.75a.75.75 0 01-.75-.75v-1.5a.75.75 0 011.5 0v1.5a.75.75 0 01-.75.75zM3.22 5.28a.75.75 0 011.06 0l1.06 1.06a.75.75 0 01-1.06 1.06L3.22 6.34a.75.75 0 010-1.06zm11.44 11.44a.75.75 0 011.06 0l1.06 1.06a.75.75 0 11-1.06 1.06l-1.06-1.06a.75.75 0 010-1.06zM2 10a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5h-1.5A.75.75 0 012 10zm14.75-.75a.75.75 0 000 1.5h1.5a.75.75 0 000-1.5h-1.5zM3.22 14.72a.75.75 0 011.06 0l1.06 1.06a.75.75 0 11-1.06 1.06l-1.06-1.06a.75.75 0 010-1.06zm11.44-11.44a.75.75 0 011.06 0l1.06 1.06a.75.75 0 01-1.06 1.06l-1.06-1.06a.75.75 0 010-1.06z" />
                        </svg>
                    </button>
                    <button type="button" id="btnLogout" title="Logout" class="w-10 h-10 bg-blue-900 text-white rounded-full flex items-center justify-center hover:scale-105 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5" fill="currentColor">
                            <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div id="mobile-menu" class="md:hidden hidden flex-col mt-4 space-y-3 text-center transition-all duration-300">
                <?php if ($_SESSION['user']['role'] == 'siswa'): ?>
                    <a href="<?= BASE_URL ?>/SiswaController/index" class="block px-4 py-2 text-white hover:scale-105 hover:underline transition">Beranda</a>
                    <a href="<?= BASE_URL ?>/SiswaController/berkas" class="block px-4 py-2 text-white hover:scale-105 hover:underline transition">Dokumen</a>
                    <a href="<?= BASE_URL ?>/SiswaController/asesmen" class="block px-4 py-2 text-white hover:scale-105 hover:underline transition">Asesmen Mandiri</a>
                    <a href="#" class="block px-4 py-2 text-white hover:scale-105 hover:underline transition">Profil</a>
                <?php elseif ($_SESSION['user']['role'] == 'asesor'): ?>
                    <a href="<?= BASE_URL ?>/AsesorController/index" class="block px-4 py-2 text-white hover:scale-105 hover:underline transition">Dashboard</a>
                    <a href="<?= BASE_URL ?>/AsesorController/peserta" class="block px-4 py-2 text-white hover:scale-105 hover:underline transition">Daftar Peserta</a>
                    <a href="<?= BASE_URL ?>/AsesorController/penilaian" class="block px-4 py-2 text-white hover:scale-105 hover:underline transition">Penilaian</a>
                    <a href="#" class="block px-4 py-2 text-white hover:scale-105 hover:underline transition">Profil</a>
                <?php endif; ?>

                <a href="<?= BASE_URL ?>/AuthController/logout" class="block mx-auto px-6 py-2 bg-blue-900 text-white rounded-full font-bold hover:scale-105 transition">
                    Logout
                </a>
            </div>
        </nav>
    
        <?php
        // Pastikan variabel $viewPath tersedia dan file-nya ada
        if (isset($viewPath) && file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            echo "<p class='text-red-600'>Tidak ada file content.</p>";
        }
        ?>

        <footer class="bg-[#0c0e24] py-8 mt-10">
            <div class="container mx-auto px-4 text-gray-300">
            <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-8">
                <div class="flex flex-col items-center md:items-start">
                    <img src="../../assets/img/logo1.png" alt="Logo" class="w-32 mb-4">
                    <p class="text-center md:text-justify lg:text-justify max-w-xs md:max-w-md lg:max-w-xs">
                        Sekolah kami berkomitmen menyediakan pendidikan berkualitas dengan program sertifikasi keahlian resmi dari LSP, mempersiapkan siswa siap bersaing di dunia kerja
                    </p>
                    </div>
                    <div class="text-center md:text-left">
                        <h3 class="text-lg font-semibold mb-3">Kontak Kami</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="https://www.instagram.com/smkantartika2sda/" target="https://www.instagram.com/smkantartika2sda/" class="flex items-center justify-center md:justify-start gap-2 hover:text-pink-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500" fill="currentColor" viewBox="0 0 24 24"><path d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2zm0 1.5A4.25 4.25 0 003.5 7.75v8.5A4.25 4.25 0 007.75 20.5h8.5a4.25 4.25 0 004.25-4.25v-8.5A4.25 4.25 0 0016.25 3.5h-8.5zm8.7 2.2a1.1 1.1 0 110 2.2 1.1 1.1 0 010-2.2zM12 7a5 5 0 110 10 5 5 0 010-10zm0 1.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7z"/></svg>
                                    <span>@smkantartika2sda</span>
                                </a>
                            </li>
                            <li class="flex items-center justify-center md:justify-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 010 1.414L8 10l-1.293 1.293a16 16 0 007.293 7.293L15 16l1.879-1.879a1 1 0 011.414 0l2.414 2.414a1 1 0 01.293.707V19a2 2 0 01-2 2h-1.586a2 2 0 01-1.414-.586l-1.293-1.293a2 2 0 00-2.828 0l-3.536 3.536a1 1 0 01-1.414 0l-3.536-3.536a2 2 0 000-2.828L3.586 12A2 2 0 013 10.586V5z"/></svg>
                                <span>(031) 8065117</span>
                            </li>
                            <li class="flex items-center justify-center md:justify-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 12h2a2 2 0 012 2v5a2 2 0 01-2 2h-2m-4-10v6m0 0l-2-2m2 2l2-2m3-6v-1a2 2 0 00-2-2h-6a2 2 0 00-2 2v1m10 0H6"/></svg>
                                <span>email@domain.com</span>
                            </li>
                            <li class="max-w-xs mx-auto md:mx-0 mt-2">
                            Jl. Raya Siwalanpanji No.6, Bedrek, Siwalanpanji, Kec. Buduran, Kabupaten Sidoarjo, Jawa Timur 61252
                            </li>
                        </ul>
                    </div>
                    <div class="w-full md:w-80 h-48 rounded-lg overflow-hidden shadow-md">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.6975621705523!2d112.72445261534166!3d-7.433522865149842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e6a886bb12af%3A0xfd09f08967a2d26f!2sSMK%20ANTARTIKA%202%20SIDOARJO!5e0!3m2!1sen!2sid!4v1685802731350!5m2!1sen!2sid"
                            width="100%"
                            height="250"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>           
                    </div>
                </div>
            </div>
        </footer>

                <!-- Modal Konfirmasi Logout -->
        <div id="logoutModal" class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center hidden">
        <div class="bg-gray-50 dark:bg-gray-800 text-gray-800 dark:text-white p-6 rounded-lg w-[90%] max-w-sm shadow-lg">
            <div class="flex flex-col items-center">
            <div class="mb-4 flex justify-center items-center w-[62px] h-[62px] rounded-full border-4 border-yellow-50 bg-yellow-100 text-yellow-500">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold mb-2">Sign out</h3>
            <p class="text-sm text-gray-600 dark:text-gray-300 text-center">Apakah Anda yakin ingin logout dari akun Anda?</p>
            </div>
            <div class="mt-6 flex justify-center gap-4">
            <a href="<?= BASE_URL ?>/AuthController/logout" class="py-2 px-4 bg-red-600 text-white rounded-md hover:bg-red-700 text-sm">Sign out</a>
            <button id="cancelLogout" class="py-2 px-4 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 text-sm">Cancel</button>
            </div>
        </div>
        </div>
        
        <a href="#hero" id="scrollTopBtn" class="hidden fixed bottom-6 right-6 z-50 bg-[#5461d6] text-white p-4 rounded-full shadow-lg transition-all duration-300 hover:bg-[#333858] hover:scale-110">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
            </svg>
        </a>

        <script>
            const menuToggle = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');

            menuToggle.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            const scrollTopBtn = document.getElementById("scrollTopBtn");
            window.addEventListener("scroll", () => {
            if (window.scrollY > 300) {
                scrollTopBtn.classList.add("show");
                scrollTopBtn.classList.remove("hidden");
            } else {
                scrollTopBtn.classList.remove("show");
                scrollTopBtn.classList.add("hidden");
            }
            });

            const navbar = document.getElementById('navbar');
            const navLinks = document.querySelectorAll('.nav-link');

            function handleScroll() {
                const isScrolled = window.scrollY > 50;
                const isDesktop = window.innerWidth >= 768;

                if (isDesktop) {
                    if (isScrolled) {
                        navbar.classList.add('bg-black/20', 'backdrop-blur-md');
                        navbar.classList.remove('md:bg-transparent', 'md:backdrop-blur-0');

                        navLinks.forEach(link => {
                            link.classList.remove('text-blue-500');
                            link.classList.add('text-white');
                        });
                    } else {
                        navbar.classList.remove('bg-black/20', 'backdrop-blur-md');
                        navbar.classList.add('md:bg-transparent', 'md:backdrop-blur-0');

                        navLinks.forEach(link => {
                            link.classList.add('text-blue-500');
                            link.classList.remove('text-white');
                        });
                    }
                } else {
                    navbar.classList.add('bg-black/20', 'backdrop-blur-md');
                    navLinks.forEach(link => {
                        link.classList.remove('text-blue-500');
                        link.classList.add('text-white');
                    });
                }
            }

            window.addEventListener('scroll', handleScroll);
            window.addEventListener('resize', handleScroll);
            document.addEventListener('DOMContentLoaded', handleScroll);
        </script>
        <script>
        document.addEventListener('DOMContentLoaded', () => {
            const html = document.documentElement;
            const toggleBtn = document.getElementById('toggle-dark');
            const darkIcon = document.getElementById('dark-icon');
            const lightIcon = document.getElementById('light-icon');

            // Cek dari cookie jika ada
            const theme = document.cookie.split('; ').find(row => row.startsWith('theme='));
            const isDark = theme && theme.split('=')[1] === 'dark';

            if (isDark) {
            html.classList.add('dark');
            darkIcon.classList.remove('hidden');
            } else {
            html.classList.remove('dark');
            lightIcon.classList.remove('hidden');
            }

            toggleBtn.addEventListener('click', () => {
            html.classList.toggle('dark');
            const isNowDark = html.classList.contains('dark');

            if (isNowDark) {
                darkIcon.classList.remove('hidden');
                lightIcon.classList.add('hidden');
                document.cookie = "theme=dark; path=/; max-age=31536000"; // 1 tahun
            } else {
                darkIcon.classList.add('hidden');
                lightIcon.classList.remove('hidden');
                document.cookie = "theme=light; path=/; max-age=31536000";
            }
            });
        });
        </script>

        <script>
        const glow = document.getElementById('cursor-glow');
        const heroSection = document.getElementById('hero');

        heroSection.addEventListener('mouseenter', () => {
            glow.classList.remove('opacity-0');
        });

        heroSection.addEventListener('mouseleave', () => {
            glow.classList.add('opacity-0');
        });

        heroSection.addEventListener('mousemove', (e) => {
            const rect = heroSection.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            glow.style.transform = `translate(${x - 80}px, ${y - 80}px)`;
        });
        </script>

        <script>
        const btnLogout = document.getElementById('btnLogout');
        const logoutModal = document.getElementById('logoutModal');
        const cancelLogout = document.getElementById('cancelLogout');

        btnLogout.addEventListener('click', () => {
            logoutModal.classList.remove('hidden');
        });

        cancelLogout.addEventListener('click', () => {
            logoutModal.classList.add('hidden');
        });

        // Tutup modal jika klik di luar kotak modal
        logoutModal.addEventListener('click', (e) => {
            if (e.target === logoutModal) {
            logoutModal.classList.add('hidden');
            }
        });
        </script>

</body>
</html>
