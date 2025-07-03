
        

        <section class="flex flex-col items-center justify-center bg-gray-50 px-6 pt-32 pb-12 dark:bg-gray-800 dark:text-white transition-color duration-800" id="hero">
            <h2 class="text-2xl md:text-3xl font-bold text-blue-800 mb-4 text-center dark:text-blue-400">Sisa Waktu Kegiatan Sertifikasi LSP</h2>
            <div id="countdown" class="flex space-x-4 text-center text-blue-800 dark:text-blue-500 font-semibold text-lg md:text-2xl">
                <div>
                    <p id="days" class="text-3xl md:text-4xl font-bold">00</p>
                    <span>Hari</span>
                </div>
                <div>
                    <p id="hours" class="text-3xl md:text-4xl font-bold">00</p>
                    <span>Jam</span>
                </div>
                <div>
                    <p id="minutes" class="text-3xl md:text-4xl font-bold">00</p>
                    <span>Menit</span>
                </div>
                <div>
                    <p id="seconds" class="text-3xl md:text-4xl font-bold">00</p>
                    <span>Detik</span>
                </div>
            </div>
        </section>

        <hr class="border-t border-gray-300 my-6 w-11/12 mx-auto dark:border-gray-500">

        <div id="status-asesmen" class="flex items-center justify-center bg-gray-50 px-6 py-10 dark:bg-gray-800 dark:text-white">
            <div class="max-w-7xl mx-auto w-full">
                <h2 class="text-3xl font-bold text-center text-blue-700 mb-6 dark:text-blue-400">Status Asesmen</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white shadow-xl rounded-2xl p-8 text-center dark:bg-[#0c0e24] dark:text-white">
                        <h3 class="text-2xl font-semibold text-blue-500 mb-3 dark:text-blue-300">Upload Dokumen Pendukung</h3>
                        <p class="text-gray-600 mb-5 dark:text-white">Dokumen pendukung digunakan untuk verifikasi pendaftaran asesmen.</p>
                        <div class="flex justify-center mb-5">
                            <div class="bg-green-600 rounded-full p-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm dark:text-white">Anda telah mengunggah dokumen pendukung yang dibutuhkan. Klik <a href="<?= BASE_URL ?>/BerkasController" class="text-blue-600 hover:underline">di sini</a> untuk melihat lebih lengkap.</p>
                    </div>

                    <div class="bg-white shadow-xl rounded-2xl p-8 text-center dark:bg-[#0c0e24] dark:text-white">
                        <h3 class="text-2xl font-semibold text-blue-500 mb-3 dark:text-blue-300">Melakukan Asesmen Mandiri</h3>
                        <p class="text-gray-600 mb-5 dark:text-white">Asesmen mandiri dilakukan jika status asesmen anda telah diverifikasi.</p>
                        <div class="flex justify-center mb-5">
                            <div class="bg-red-600 rounded-full p-4">
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm dark:text-white">
                            Harap segera lengkapi asesmen mandiri untuk melanjutkan proses berikutnya. Klik 
                            <a href="#asesmen-mandiri" class="text-blue-600 hover:underline">di sini</a>.
                        </p>
                    </div>

                    <div class="bg-white shadow-xl rounded-2xl p-8 text-center dark:bg-[#0c0e24] dark:text-white">
                        <h3 class="text-2xl font-semibold text-blue-500 mb-3 dark:text-blue-300">Mengerjakan Uji Kompetensi</h3>
                        <p class="text-gray-600 mb-5 dark:text-white">Uji kompetensi dilakukan jika asesor telah melalukan penilaian asesmen mandiri.</p>
                        <div class="flex justify-center mb-5">
                            <div class="bg-red-600 rounded-full p-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm dark:text-white">Anda belum bisa mengikuti uji kompetensi sampai asesor menyelesaikan penilaian.</p>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const deadline = new Date("2025-06-21T23:59:59").getTime();

            const x = setInterval(function () {
                const now = new Date().getTime();
                const distance = deadline - now;

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("days").innerText = String(days).padStart(2, '0');
                document.getElementById("hours").innerText = String(hours).padStart(2, '0');
                document.getElementById("minutes").innerText = String(minutes).padStart(2, '0');
                document.getElementById("seconds").innerText = String(seconds).padStart(2, '0');

                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("countdown").innerHTML = "<p class='text-red-600 text-xl font-bold'>Waktu Asesmen Telah Berakhir</p>";
                }
            }, 1000);
        </script>
