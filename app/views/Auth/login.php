<div class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">

    <h2 class="text-2xl font-bold text-center text-gray-700 mb-4">Login</h2>

    <!-- Tampilkan error jika ada -->
    <?php session_start(); if (isset($_SESSION['error'])): ?>
      <div class="mb-4 text-red-500 text-sm">
        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
      </div>
    <?php endif; ?>

    <!-- Form login -->
    <form action="<?= BASE_URL ?>/AuthController/login" method="POST">
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">Username</label>
        <input name="username" type="text" class="w-full px-3 py-2 border rounded" required>
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
        <input name="password" type="password" class="w-full px-3 py-2 border rounded" required>
      </div>
      <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
        Login
      </button>
    </form>
  </div>
</div>
