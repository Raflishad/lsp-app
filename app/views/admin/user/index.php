<div class="main-content">
<div class="content-wrapper">
<div class="row">
  <div class="col-12">
    <div class="content-header">Tabel User</div>
  </div>
</div>
<section id="extended">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <a href="<?= BASE_URL ?>/UserController/create" class="btn btn-raised btn-primary">Tambah User</a>
          <a href="<?= BASE_URL ?>/UserController/import" class="btn btn-raised btn-primary">
            <i class="fa fa-upload"></i> Import User
          </a>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table text-center table-striped zero-configuration">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>No HP</th>
                  <th>Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($data['user'] as $row): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= htmlspecialchars($row['USERNAME']) ?></td>
                  <td><?= htmlspecialchars($row['NAMA']) ?></td>
                  <td><?= htmlspecialchars($row['EMAIL'] ?? 'Tidak ada') ?></td>
                  <td><?= htmlspecialchars($row['ALAMAT'] ?? '-') ?></td>
                  <td><?= htmlspecialchars($row['NOMOR_HP'] ?? '-') ?></td>
                  <td><?= htmlspecialchars($row['TANGGAL_LAHIR'] ?? '-') ?></td>
                  <td><?= htmlspecialchars($row['JENIS_KELAMIN'] ?? '-') ?></td>
                  <td>
                    <a class="success p-0" href="<?= BASE_URL ?>/UserController/edit/<?= $row['ID_USER'] ?>">
                      <i class="ft-edit-2 font-medium-3 mr-1"></i>
                    </a>
                    <a class="border-0 bg-transparent danger p-0 confirm-cancel"
                       data-href="<?= BASE_URL ?>/UserController/delete/<?= $row['ID_USER'] ?>">
                      <i class="ft-x font-medium-3 mr-1"></i>
                    </a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
</div>
