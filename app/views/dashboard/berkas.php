<section class="pt-28 pb-16 px-6" id="hero">
            <div class="max-w-3xl mx-auto bg-white dark:bg-[#0c0e24] p-8 rounded-xl shadow-lg">
                <h2 class="text-2xl md:text-3xl font-bold text-blue-800 mb-10 text-center dark:text-blue-400">Upload Kartu Identitas</h2>
                <form id="uploadIdentitasForm" action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1  dark:text-white">Jenis Kartu Identitas</label>
                        <div class="flex items-center gap-6 mt-1">
                            <label class="flex items-center">
                                <input type="radio" name="jenisIdentitas" value="KTP" required class="text-blue-600 focus:ring-blue-500" />
                                <span class="ml-2 text-sm text-gray-700  dark:text-white">KTP</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="jenisIdentitas" value="Kartu Pelajar" required class="text-blue-600 focus:ring-blue-500" />
                                <span class="ml-2 text-sm text-gray-700 dark:text-white">Kartu Pelajar</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label for="nomorKartu" class="block text-sm font-medium text-gray-700 mb-1 dark:text-white">Nomor Kartu Identitas</label>
                        <input type="number" id="nomorKartu" name="nomorKartu" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                    <div>
                        <label for="fileIdentitas" class="block text-sm font-medium text-gray-700 mb-1 dark:text-white">Unggah Kartu Identitas (PDF/JPG/PNG)</label>
                        <input type="file" id="fileIdentitas" name="fileIdentitas" accept=".pdf,.jpg,.jpeg,.png" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200" />
                        <p class="text-sm text-gray-500 mt-1">Ukuran maksimal 2MB</p>
                        <button type="button" onclick="previewFile('fileIdentitas')" class="mt-2 text-sm text-blue-700 hover:underline">Lihat File</button>
                    </div>
                </form>

                <h2 class="text-2xl md:text-3xl font-bold text-blue-800 my-10 text-center dark:text-blue-400">Upload Dokumen Pendukung</h2>
                <form id="uploadForm" action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
                    <div>
                        <label for="pasFoto" class="block text-sm font-medium text-gray-700 mb-1 dark:text-white">Pas Foto Formal Terbaru (JPG/PNG)</label>
                        <input type="file" id="pasFoto" name="pasFoto" accept=".jpg,.jpeg,.png" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200" />
                        <p class="text-sm text-gray-500 mt-1">Ukuran maksimal 2MB</p>
                        <button type="button" onclick="previewFile('pasFoto')" class="mt-2 text-sm text-blue-700 hover:underline">Lihat File</button>
                    </div>
                    <div>
                        <label for="sertifikat" class="block text-sm font-medium text-gray-700 mb-1 dark:text-white">Sertifikat PKL/Magang (PDF/JPG/PNG)</label>
                        <input type="file" id="sertifikat" name="sertifikat" accept=".pdf,.jpg,.jpeg,.png" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200" />
                        <p class="text-sm text-gray-500 mt-1">Ukuran maksimal 2MB</p>
                        <button type="button" onclick="previewFile('sertifikat')" class="mt-2 text-sm text-blue-700 hover:underline">Lihat File</button>
                    </div>
                    <div>
                        <label for="transkrip" class="block text-sm font-medium text-gray-700 mb-1 dark:text-white">Transkrip Nilai / Raport Semester 1-5 (PDF)</label>
                        <input type="file" id="transkrip" name="transkrip" accept=".pdf" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200" />
                        <p class="text-sm text-gray-500 mt-1">Ukuran maksimal 2MB</p>
                        <button type="button" onclick="previewFile('transkrip')" class="mt-2 text-sm text-blue-700 hover:underline">Lihat File</button>
                    </div>

                    <div class="text-center">
                        <button type="submit"
                        class="bg-blue-700 text-white px-6 py-2 rounded-full font-semibold hover:bg-blue-800 transition my-4">Upload dokumen</button>
                    </div>
                </form>
            </div>
        </section>