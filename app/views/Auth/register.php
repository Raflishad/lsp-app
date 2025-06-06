<div class="min-h-screen flex items-center justify-center bg-gray-100">
  <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">

    <h2 class="text-2xl font-bold text-center text-gray-700 mb-4">Daftar Akun</h2>

    <?php session_start(); if (isset($_SESSION['error'])): ?>
      <div class="mb-4 text-red-500 text-sm"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <form action="<?= BASE_URL ?>/AuthController/store" method="POST">
      <input name="nama" type="text" placeholder="Nama lengkap" required class="input mb-3 w-full px-3 py-2 border rounded">
      <input name="email" type="email" placeholder="Email" required class="input mb-3 w-full px-3 py-2 border rounded">
      <input name="username" type="text" placeholder="Username" required class="input mb-3 w-full px-3 py-2 border rounded">
      <input name="password" type="password" placeholder="Password" required class="input mb-3 w-full px-3 py-2 border rounded">

      <select name="role" required class="w-full px-3 py-2 border rounded mb-4">
        <option value="">Daftar sebagai...</option>
        <option value="asesor">Asesor</option>
        <option value="siswa">Siswa</option>
      </select>

      <button type="submit" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">Daftar</button>
    </form>

    <div class="mt-4 text-center text-sm">
      Sudah punya akun? <a href="<?= BASE_URL ?>/AuthController" class="text-blue-600 hover:underline">Login di sini</a>
    </div>
  </div>
</div>
