<div class="main-content">
<div class="content-wrapper">
<div class="row">
  <div class="col-12">
    <div class="content-header">Form User</div>
  </div>
</div>
<section id="extended">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive col-6">
            <h2 class="card-title">Tambah User</h2>
            <form method="POST">
              <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">

              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control"></textarea>
              </div>

              <div class="form-group">
                <label>Kode Pos</label>
                <input type="text" name="kode_pos" class="form-control">
              </div>

              <div class="form-group">
                <label>Nomor HP</label>
                <input type="text" name="nomor_hp" class="form-control">
              </div>

              <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control">
              </div>

              <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                  <option value="">-- Pilih --</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>

              <div class="form-group">
                <label>Regency</label>
                <select name="id_regencies" class="form-control">
                  <option value="">-- Pilih Kabupaten/Kota --</option>
                  <?php foreach ($regencies as $r): ?>
                    <option value="<?= $r['ID_REGENCIES'] ?>">
                      <?= htmlspecialchars($r['NAME_REGENCIES']) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="mt-3">
                <a href="<?= BASE_URL ?>/AdminController/user" class="btn btn-raised btn-warning mr-1">
                  <i class="ft-x"></i> Cancel
                </a>
                <button type="submit" class="btn btn-raised btn-primary">
                  <i class="fa fa-check-square-o"></i> Save
                </button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
</div>
