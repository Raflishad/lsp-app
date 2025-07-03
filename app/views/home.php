<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title?> | Beranda</title>
        <link rel="icon" href="../assets/img/logo-smart2.png" type="image/png">
        <link href="../assets/css/output.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    
    <body class="relative font-poppins scroll-smooth overflow-x-hidden">

        <nav id="navbar" class="fixed top-6 left-1/2 transform -translate-x-1/2 w-[90%] max-w-full px-6 py-3 z-50 sm:rounded-xl md:rounded-full rounded-full text-white transition-all duration-300 backdrop-blur-xl bg-transparent md:bg-transparent md:backdrop-blur-0">
            <div class="flex items-center justify-between">
                <img src="../assets/img/logo1.png" alt="Logo" class="h-8">

                <button id="menu-toggle" class="md:hidden text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <div class="hidden md:flex space-x-8 nav-links">
                <a href="<?= BASE_URL ?>/AuthController" class="px-4 py-2 transition hover:scale-110 text-white">Beranda</a>
                <a href="<?= BASE_URL ?>/AuthController" class="px-4 py-2 transition hover:scale-110 text-white">Berkas</a>
                <a href="<?= BASE_URL ?>/AuthController" class="px-4 py-2 transition hover:scale-110 text-white">Asesmen Mandiri</a>
                </div>

                <a href="<?= BASE_URL ?>/AuthController" class="hidden md:inline bg-white px-6 py-1 rounded-full font-bold transition hover:scale-105 text-[#5B6DFF] login-btn">
                Login
                </a>
            </div>

            <div id="mobile-menu" class="md:hidden hidden flex-col mt-4 space-y-2 text-center">
                <a href="<?= BASE_URL ?>/AuthController" class="block px-4 py-2 text-white hover:scale-105 hover:underline">Beranda</a>
                <a href="<?= BASE_URL ?>/AuthController" class="block px-4 py-2 text-white hover:scale-105 hover:underline">Berkas</a>
                <a href="<?= BASE_URL ?>/AuthController" class="block px-4 py-2 text-white hover:scale-105 hover:underline">Asesmen Mandiri</a>
                <a href="<?= BASE_URL ?>/AuthController" class="block px-6 py-2 bg-white text-[#5B6DFF] rounded-full font-bold hover:scale-105 transition">Login</a>
            </div>
        </nav>

        <div class="relative w-full h-[90vh] sm:h-[95vh] md:h-screen overflow-x-hidden" id="hero">
            <div class="swiper mySwiper absolute top-0 left-0 w-full h-full">
                <div class="swiper-wrapper">
                    <div class="swiper-slide bg-cover bg-center w-full h-full brightness-50" style="background-image: url('../assets/img/slide1.jpg');"></div>
                    <div class="swiper-slide bg-cover bg-center w-full h-full brightness-50" style="background-image: url('../assets/img/slide2.jpg');"></div>
                    <div class="swiper-slide bg-cover bg-center w-full h-full brightness-50" style="background-image: url('../assets/img/slide3.jpg');"></div>
                </div>
            </div>
            <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white px-6 z-10" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="2000">
                <h1 class="text-3xl sm:text-3xl md:text-4xl lg:text-5xl font-bold drop-shadow-lg">
                    Selamat Datang di LSP SMART 2
                </h1>
                <p class="mt-5 text-md sm:text-md md:text-lg lg:text-xl max-w-2xl drop-shadow-md">
                    Kami hadir untuk memberikan sertifikasi profesi yang berkualitas dan terpercaya untuk siswa-siswi hebat.
                </p>
                <a href="#alur-pendaftaran"
                    class="mt-5 bg-[#5B6DFF] px-7 py-3 border border-transparent rounded-full text-sm sm:text-sm md:text-md lg:text-md font-semibold hover:bg-transparent hover:text-white hover:border hover:border-white transition"
                    data-aos="fade-up"
                    data-aos-delay="2300"
                    data-aos-duration="800">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>

        <div class="w-full px-6 py-8 md:py-10 lg:py-16 bg-gray-100">
            <div class="text-center mb-12" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                <h2 class="text-3xl md:4xl lg:text-4xl font-bold text-[#2D336B]">Tujuan LSP</h2>
                <p class="mt-4 text-md md:text-lg lg:text-lg leading-relaxed max-w-2xl mx-auto">
                Lembaga Sertifikasi Profesi (LSP) bertujuan untuk meningkatkan kompetensi dan daya saing tenaga kerja melalui sertifikasi berbasis standar nasional.
                </p>
            </div>

            <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <div class="relative h-96 rounded-xl overflow-hidden shadow-lg cursor-pointer group" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">
                    <img
                        src="../assets/img/card1.jpg"
                        alt="Tujuan 1"
                        class="absolute inset-0 w-full h-full object-cover transition duration-500 transform group-hover:scale-110 group-hover:brightness-110"
                    />
                    <div class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-60 transition duration-500 flex items-center md:items-end lg:items-end justify-center md:justify-start lg:justify-start px-0 py-0 md:px-6 lg:px-6 md:py-12 lg:py-12">
                        <p class="text-white text-lg font-semibold text-center md:text-left lg:text-left transform translate-y-4 opacity-80 group-hover:translate-y-0 group-hover:opacity-100 transition duration-500">
                        Menjamin Kompetensi Tenaga Kerja
                        </p>
                    </div>
                </div>

                <div class="relative h-96 rounded-xl overflow-hidden shadow-lg cursor-pointer group" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">
                    <img
                        src="../assets/img/card2.jpeg"
                        alt="Tujuan 2"
                        class="absolute inset-0 w-full h-full object-cover transition duration-500 transform group-hover:scale-110 group-hover:brightness-110"
                    />
                    <div class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-60 transition duration-500 flex items-center md:items-end lg:items-end justify-center md:justify-start lg:justify-start px-0 py-0 md:px-6 lg:px-6 md:py-12 lg:py-12">
                        <p class="text-white text-lg font-semibold text-center md:text-left lg:text-left transform translate-y-4 opacity-80 group-hover:translate-y-0 group-hover:opacity-100 transition duration-500">
                        Meningkatkan Daya Saing Lulusan
                        </p>
                    </div>
                </div>

                <div class="relative h-96 rounded-xl overflow-hidden shadow-lg cursor-pointer group" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">
                    <img
                        src="../assets/img/card3.jpeg"
                        alt="Tujuan 3"
                        class="absolute inset-0 w-full h-full object-cover transition duration-500 transform group-hover:scale-110 group-hover:brightness-110"
                    />
                    <div class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-60 transition duration-500 flex items-center md:items-end lg:items-end justify-center md:justify-start lg:justify-start px-0 py-0 md:px-6 lg:px-6 md:py-12 lg:py-12">
                        <p class="text-white text-lg font-semibold text-center md:text-left lg:text-left transform translate-y-4 opacity-80 group-hover:translate-y-0 group-hover:opacity-100 transition duration-500">
                        Mendukung Standarisasi Keahlian
                        </p>
                    </div>
                </div>

                <div class="relative h-96 rounded-xl overflow-hidden shadow-lg cursor-pointer group"  data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">
                    <img
                        src="../assets/img/card4.jpg"
                        alt="Tujuan 4"
                        class="absolute inset-0 w-full h-full object-cover transition duration-500 transform group-hover:scale-110 group-hover:brightness-110"
                    />
                    <div class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-60 transition duration-500 flex items-center md:items-end lg:items-end justify-center md:justify-start lg:justify-start px-0 py-0 md:px-6 lg:px-6 md:py-12 lg:py-12">
                        <p class="text-white text-lg font-semibold text-center md:text-left lg:text-left transform translate-y-4 opacity-80 group-hover:translate-y-0 group-hover:opacity-100 transition duration-500">
                        Memfasilitasi Link & Match dengan Industri
                        </p>
                    </div>
                </div>
            </div>
        </div>   
        
        <div class="bg-[#2D336B] py-10 px-6 sm:px-10 md:px-16 lg:px-20 flex flex-col lg:flex-row items-center lg:items-start gap-8 w-full" id="alur-pendaftaran">
            <div class="relative w-full lg:w-1/2 justify-center pt-6 lg:pt-10 hidden md:hidden lg:flex" data-aos="zoom-out-up" data-aos-delay="200" data-aos-duration="1000">
                <img src="../assets/img/rounded1.webp" alt="Foto Besar" class="rounded-full w-96 h-96 object-cover shadow-md z-10">
                <img src="../assets/img/rounded2.jpg" alt="Foto Kecil" class="rounded-full w-56 h-56 object-cover absolute bottom-0 left-24 shadow-md z-20 border-8 border-[#2D336B]">
            </div>

            <div class="text-white w-full lg:w-1/2 py-4 lg:p-0 -ml-0 lg:-ml-14" data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">
                <h2 class="text-2xl sm:text-3xl font-semibold mb-6 text-center lg:text-left">Alur Pendaftaran LSP</h2>
                <ul class="space-y-4 mb-6">
                    <li class="flex items-start" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1000">
                        <div class="w-6 h-6 flex items-center justify-center bg-[#2D336B] border-2 border-white text-white rounded-lg mr-3 mt-1">✔</div>
                        <span>Daftar dan login ke akun anda<br>Calon peserta membuat akun dan login ke sistem LSP.</span>
                    </li>
                    <li class="flex items-start" data-aos="fade-left" data-aos-delay="400" data-aos-duration="1000">
                        <div class="w-6 h-6 flex items-center justify-center bg-[#2D336B] border-2 border-white text-white rounded-lg mr-3 mt-1">✔</div>
                        <span>Unggah Berkas & Asesmen Mandiri<br>Mengunggah dokumen pendukung dan mengisi asesmen mandiri sesuai skema sertifikasi.</span>
                    </li>
                    <li class="flex items-start" data-aos="fade-left" data-aos-delay="500" data-aos-duration="1000">
                        <div class="w-6 h-6 flex items-center justify-center bg-[#2D336B] border-2 border-white text-white rounded-lg mr-3 mt-1">✔</div>
                        <span>Verifikasi oleh Asesor<br>Asesor memeriksa berkas dan hasil asesmen mandiri sebelum peserta mengikuti uji kompetensi.</span>
                    </li>
                    <li class="flex items-start" data-aos="fade-left" data-aos-delay="600" data-aos-duration="1000">
                        <div class="w-6 h-6 flex items-center justify-center bg-[#2D336B] border-2 border-white text-white rounded-lg mr-3 mt-1">✔</div>
                        <span>Uji Kompetensi<br>Peserta mengikuti uji kompetensi yang dilakukan oleh asesor melalui beberapa metode.</span>
                    </li>
                    <li class="flex items-start" data-aos="fade-left" data-aos-delay="700" data-aos-duration="1000">
                        <div class="w-6 h-6 flex items-center justify-center bg-[#2D336B] border-2 border-white text-white rounded-lg mr-3 mt-1">✔</div>
                        <span>Sertifikasi Diterbitkan<br>Jika dinyatakan kompeten, peserta mendapatkan sertifikat yang diakui secara nasional.</span>
                    </li>
                </ul>
                <div class="text-center lg:text-left">
                    <a href="<?= BASE_URL ?>/AuthController" class="inline-block bg-white border border-transparent text-[#2D336B] font-semibold px-6 py-2 rounded-full transition hover:bg-transparent hover:text-white hover:border hover:border-white">
                        Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>      
        
        <div class="bg-white py-16">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-2xl md:text-3xl font-semibold text-[#2D336B] mb-12" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    Statistik Sertifikasi LSP SMART2
                </h2>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 sm:px-8 px-2">
                    <div data-aos="fade-left" data-aos-delay="100">
                        <div
                            class="bg-[#5B6DFF] text-white text-3xl sm:text-4xl md:text-5xl font-bold 
                            w-20 h-20 sm:w-24 sm:h-24 md:w-32 md:h-32 mx-auto rounded-full flex items-center justify-center
                            transition transform duration-300 hover:bg-[#7D8DFF] hover:scale-105 hover:shadow-lg cursor-pointer">
                            550
                        </div>
                        <p class="mt-4 text-sm sm:text-base text-[#2D336B] font-medium">Siswa Kompeten</p>
                    </div>
                    <div data-aos="fade-left" data-aos-delay="400">
                        <div
                            class="bg-[#5B6DFF] text-white text-3xl sm:text-4xl md:text-5xl font-bold 
                            w-20 h-20 sm:w-24 sm:h-24 md:w-32 md:h-32 mx-auto rounded-full flex items-center justify-center
                            transition transform duration-300 hover:bg-[#7D8DFF] hover:scale-105 hover:shadow-lg cursor-pointer">
                            58
                        </div>
                        <p class="mt-4 text-sm sm:text-base text-[#2D336B] font-medium">Asesor Aktif</p>
                    </div>
                    <div data-aos="fade-left" data-aos-delay="600">
                        <div
                            class="bg-[#5B6DFF] text-white text-3xl sm:text-4xl md:text-5xl font-bold 
                            w-20 h-20 sm:w-24 sm:h-24 md:w-32 md:h-32 mx-auto rounded-full flex items-center justify-center
                            transition transform duration-300 hover:bg-[#7D8DFF] hover:scale-105 hover:shadow-lg cursor-pointer">
                            6
                        </div>
                        <p class="mt-4 text-sm sm:text-base text-[#2D336B] font-medium">Skema Sertifikasi</p>
                    </div>
                    <div data-aos="fade-left" data-aos-delay="800">
                        <div
                            class="bg-[#5B6DFF] text-white text-3xl sm:text-4xl md:text-5xl font-bold 
                            w-20 h-20 sm:w-24 sm:h-24 md:w-32 md:h-32 mx-auto rounded-full flex items-center justify-center
                            transition transform duration-300 hover:bg-[#7D8DFF] hover:scale-105 hover:shadow-lg cursor-pointer">
                            30
                        </div>
                        <p class="mt-4 text-sm sm:text-base text-[#2D336B] font-medium">Industri</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="bg-white py-10">
            <div class="container mx-auto px-4 text-center" data-aos="flip-left" data-aos-delay="200" data-aos-duration="1000">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <img src="../assets/img/galeri1.jpeg" alt="Galeri 1" class="w-full h-60 object-cover rounded-xl shadow-md transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-xl cursor-pointer" />
                    <img src="../assets/img/galeri2.jpeg" alt="Galeri 2" class="w-full h-60 object-cover rounded-xl shadow-md transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-xl cursor-pointer" />
                    <img src="../assets/img/galeri3.jpeg" alt="Galeri 3" class="w-full h-60 object-cover rounded-xl shadow-md transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-xl cursor-pointer" />
                    <img src="../assets/img/galeri4.jpeg" alt="Galeri 4" class="w-full h-60 object-cover rounded-xl shadow-md transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-xl cursor-pointer" />
                    <img src="../assets/img/galeri5.jpg" alt="Galeri 5" class="w-full h-60 object-cover rounded-xl shadow-md transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-xl cursor-pointer" />
                    <img src="../assets/img/galeri6.jpg" alt="Galeri 6" class="w-full h-60 object-cover rounded-xl shadow-md transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-xl cursor-pointer" />
                </div>
            </div>
        </div>      
        
        <footer class="bg-[#0c0e24] py-8 mt-10">
            <div class="container mx-auto px-4 text-gray-300">
            <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-8">
                <div class="flex flex-col items-center md:items-start">
                    <img src="../assets/img/logo1.png" alt="Logo" class="w-32 mb-4">
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
        
        <a href="#hero" id="scrollTopBtn" class="hidden fixed bottom-6 right-6 z-50 bg-[#5461d6] hover:scale-110 text-white p-4 rounded-full shadow-lg transition-all duration-300 hover:bg-[#333858] hover:scale-110">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
            </svg>
        </a>
        
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            const navbar = document.getElementById('navbar');

            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    if (window.innerWidth >= 768) {
                        navbar.classList.add('bg-black/20', 'backdrop-blur-md');
                        navbar.classList.remove('md:bg-transparent', 'md:backdrop-blur-0');
                    }
                } else {
                    if (window.innerWidth >= 768) {
                        navbar.classList.remove('bg-black/20', 'backdrop-blur-md');
                        navbar.classList.add('md:bg-transparent', 'md:backdrop-blur-0');
                    }
                }
            });
        </script>
        <script>
            AOS.init();

            var swiper = new Swiper(".mySwiper", {
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                effect: "fade",
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
            
            const menuToggle = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');

            menuToggle.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        </script>
    </body>
</html>