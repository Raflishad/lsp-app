<?php
// Mapping dokumen berdasarkan jenis
$mapDokumen = [];
if (isset($dokumen)) {
    foreach ($dokumen as $d) {
        $mapDokumen[$d['JENIS_DOKUMEN']] = $d['URL_DOKUMEN'];
    }
}
?>

<section class="pt-28 pb-16 px-6" id="hero">
            <div class="max-w-3xl mx-auto bg-white dark:bg-[#0c0e24] p-8 rounded-xl shadow-lg">
                <form id="uploadIdentitasForm" action="<?= BASE_URL ?>/DokumenController/upload" method="POST" enctype="multipart/form-data" class="space-y-6">
                    <h2 class="text-2xl md:text-3xl font-bold text-blue-800 mb-10 text-center dark:text-blue-400">Upload Kartu Identitas</h2>
                    <?php $jenis = $identitas['JENIS_KARTU_IDENTITAS'] ?? ''; ?>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1  dark:text-white">Jenis Kartu Identitas</label>
                        <div class="flex items-center gap-6 mt-1">
                            <label class="flex items-center">
                                <input type="radio" name="jenisIdentitas" value="KTP" <?= $jenis === 'KTP' ? 'checked' : '' ?><?= $jenis ? 'disabled' : '' ?> class="text-blue-600 focus:ring-blue-500" />
                                <span class="ml-2 text-sm text-gray-700 dark:text-white">KTP</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="jenisIdentitas" value="Kartu Pelajar" <?= $jenis === 'Kartu Pelajar' ? 'checked' : '' ?><?= $jenis ? 'disabled' : '' ?> class="text-blue-600 focus:ring-blue-500" />
                                <span class="ml-2 text-sm text-gray-700 dark:text-white">Kartu Pelajar</span>
                            </label>
                        </div>
                    </div>
                    <div class="relative">
                        <label for="nomorKartu" class="block text-sm font-medium text-gray-700 mb-1 dark:text-white">Nomor Kartu Identitas</label>
                        <input type="number" id="nomorKartu" name="nomorKartu" value="<?= $identitas['NOMOR_KARTU_IDENTITAS'] ?? '' ?>"<?= $identitas ? 'disabled' : 'required' ?> 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        <?php if (!empty($identitas['NOMOR_KARTU_IDENTITAS'])): ?>
                        <div class="absolute inset-y-0 top-6 right-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z" clip-rule="evenodd" />
                                </svg>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="relative">
                        <label for="fileIdentitas" class="block text-sm font-medium text-gray-700 mb-1 dark:text-white">
                            Unggah Kartu Identitas (PDF/JPG/PNG)
                        </label>

                        <?php if (!empty($identitas['URL_KARTU_IDENTITAS'])): ?>
                            <!-- Jika ada data, tampilkan tombol link untuk lihat file -->
                            <input type="text" id="fileIdentitas" name="fileIdentitas" accept=".pdf,.jpg,.jpeg,.png" value="<?= $identitas['URL_KARTU_IDENTITAS'] ?? '' ?>"
                            <?= isset($identitas['URL_KARTU_IDENTITAS']) ? 'disabled' : 'required' ?>
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200" />
                            <div class="absolute inset-y-0 bottom-12 right-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <p class="text-sm text-gray-500 mt-1">Ukuran maksimal 2MB</p>
                            <a href="<?= BASE_URL . '/' . $identitas['URL_KARTU_IDENTITAS'] ?>"
                            target="_blank" 
                            class="mt-2 text-sm text-blue-700 hover:underline mb-6 inline-block">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <!-- Jika tidak ada data, tampilkan tombol untuk preview -->
                            <input type="file" id="fileIdentitas" name="fileIdentitas" accept=".pdf,.jpg,.jpeg,.png" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200" />
                            <p class="text-sm text-gray-500 mt-1">Ukuran maksimal 2MB</p>
                            <button type="button" onclick="previewFile('fileIdentitas')" 
                                    class="mt-2 text-sm text-blue-700 hover:underline mb-6">
                                Lihat File
                            </button>
                        <?php endif; ?>
                    </div>

                <h2 class="text-2xl md:text-3xl font-bold text-blue-800 my-10 text-center dark:text-blue-400">Upload Dokumen Pendukung</h2>
                    <div class="relative">
                        <label for="pasFoto" class="block text-sm font-medium text-gray-700 mb-1 dark:text-white mt-10">Pas Foto Formal Terbaru (JPG/PNG)</label>
                        <?php if (!empty($mapDokumen['pas_foto'])): ?>
                            <!-- Jika ada data, tampilkan tombol link untuk lihat file -->
                            <input type="text" id="pasFoto" name="pasFoto" accept=".jpg,.jpeg,.png" value="<?= $mapDokumen['pas_foto'] ?? '' ?>"
                            <?= isset($mapDokumen['pas_foto']) ? 'disabled' : 'required' ?>
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200" />
                            <div class="absolute inset-y-0 bottom-12 right-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <p class="text-sm text-gray-500 mt-1">Ukuran maksimal 2MB</p>
                            <a href="<?= BASE_URL . '/' . $mapDokumen['pas_foto'] ?>"
                            target="_blank" 
                            class="mt-2 text-sm text-blue-700 hover:underline mb-6 inline-block">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <input type="file" id="pasFoto" name="pasFoto" accept=".jpg,.jpeg,.png" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200" />
                            <p class="text-sm text-gray-500 mt-1">Ukuran maksimal 2MB</p>
                            <button type="button" onclick="previewFile('pasFoto')" class="mt-2 text-sm text-blue-700 hover:underline">Lihat File</button>
                        <?php endif; ?>
                    </div>
                    <div class="relative">
                        <label for="sertifikat" class="block text-sm font-medium text-gray-700 mb-1 dark:text-white">Sertifikat PKL/Magang (PDF/JPG/PNG)</label>
                        <?php if (!empty($mapDokumen['sertifikat'])): ?>
                            <!-- Jika ada data, tampilkan tombol link untuk lihat file -->
                            <input type="text" id="sertifikat" name="sertifikat" accept=".pdf,.jpg,.jpeg,.png" value="<?= $mapDokumen['sertifikat'] ?? '' ?>"
                            <?= isset($mapDokumen['sertifikat']) ? 'disabled' : 'required' ?>
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200" />
                            <div class="absolute inset-y-0 bottom-12 right-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <p class="text-sm text-gray-500 mt-1">Ukuran maksimal 2MB</p>
                            <a href="<?= BASE_URL . '/' . $mapDokumen['sertifikat'] ?>"
                            target="_blank" 
                            class="mt-2 text-sm text-blue-700 hover:underline mb-6 inline-block">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <input type="file" id="sertifikat" name="sertifikat" accept=".pdf,.jpg,.jpeg,.png" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200" />
                            <p class="text-sm text-gray-500 mt-1">Ukuran maksimal 2MB</p>
                            <button type="button" onclick="previewFile('sertifikat')" class="mt-2 text-sm text-blue-700 hover:underline">Lihat File</button>
                        <?php endif; ?>
                    </div>
                    <div class="relative">
                        <label for="transkrip" class="block text-sm font-medium text-gray-700 mb-1 dark:text-white">Transkrip Nilai / Raport Semester 1-5 (PDF)</label>
                        <?php if (!empty($mapDokumen['transkrip'])): ?>
                            <!-- Jika ada data, tampilkan tombol link untuk lihat file -->
                            <input type="text" id="transkrip" name="transkrip" accept=".pdf" value="<?= $mapDokumen['transkrip'] ?? '' ?>"
                            <?= isset($mapDokumen['transkrip']) ? 'disabled' : 'required' ?>
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200" />
                            <div class="absolute inset-y-0 bottom-12 right-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <p class="text-sm text-gray-500 mt-1">Ukuran maksimal 2MB</p>
                            <a href="<?= BASE_URL . '/' . $mapDokumen['transkrip'] ?>"
                            target="_blank" 
                            class="mt-2 text-sm text-blue-700 hover:underline mb-6 inline-block">
                                Lihat File
                            </a>
                        <?php else: ?>
                            <input type="file" id="transkrip" name="transkrip" accept=".pdf" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200" />
                        <p class="text-sm text-gray-500 mt-1">Ukuran maksimal 2MB</p>
                        <button type="button" onclick="previewFile('transkrip')" class="mt-2 text-sm text-blue-700 hover:underline">Lihat File</button>
                        <?php endif; ?>
                    </div>

                    <?php if (!$identitas || count($dokumen) < 3): ?>
                        <div class="text-center">
                            <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                            class="bg-blue-700 text-white px-6 py-2 rounded-full font-semibold hover:bg-blue-800 transition my-4">
                                Upload dokumen
                            </button>
                        </div>

                        <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah kamu sudah yakin untuk mengupload data?</h3>
                                        <button type="submit" data-modal-hide="popup-modal" class="text-white bg-red-600 hover:bg-red-800 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Ya, sudah
                                        </button>
                                        <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak, belum</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </section>

        <script>
            document.getElementById('uploadForm').addEventListener('submit', function (e) {
                const kartuPelajar = document.getElementById('kartuPelajar').files.length;
                const pasFoto = document.getElementById('pasFoto').files.length;
                const sertifikat = document.getElementById('sertifikat').files.length;
                const transkrip = document.getElementById('transkrip').files.length;

                if (!kartuPelajar || !pasFoto || !sertifikat || !transkrip) {
                e.preventDefault(); // mencegah submit
                alert('Harap unggah semua dokumen pendukung terlebih dahulu!');
                }
            });

            function previewFile(inputId) {
                const input = document.getElementById(inputId);
                const file = input.files[0];

                if (!file) {
                    alert("Silakan pilih file terlebih dahulu.");
                    return;
                }

                const allowed = ['application/pdf', 'image/jpeg', 'image/png'];
                if (!allowed.includes(file.type)) {
                    alert("File tidak bisa dipratinjau di tab baru.");
                    return;
                }

                const url = URL.createObjectURL(file);
                window.open(url, '_blank');
            }
        </script>