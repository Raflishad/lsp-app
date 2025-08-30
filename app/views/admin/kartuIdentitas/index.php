<div class="main-content">
<div class="content-wrapper"><!--Extended Table starts-->
<div class="row">
  <div class="col-12">
    <div class="content-header">Tabel Kartu Identitas</div>
  </div>
</div>
<section id="extended">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <!-- <div class="card-header">
          <a href="<?= BASE_URL ?>/KartuIdentitasController/create">Tambah Kartu Identitas</a>
        </div> -->
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table text-center table-striped zero-configuration">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Jenis</th>
                  <th>Nomor</th>
                  <th>File</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
    <?php 
    $no = 1;
    foreach ($data['kartuIdentitas'] as $row): 
        $fileUrl = BASE_URL . '/' . htmlspecialchars($row['URL_KARTU_IDENTITAS']);
        $ext = strtolower(pathinfo($row['URL_KARTU_IDENTITAS'], PATHINFO_EXTENSION));
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars($row['JENIS_KARTU_IDENTITAS']) ?></td>
        <td><?= htmlspecialchars($row['NOMOR_KARTU_IDENTITAS']) ?></td>
        <td>
            <?php if (!empty($row['URL_KARTU_IDENTITAS'])): ?>
                <?php if (in_array($ext, ['jpg','jpeg','png'])): ?>
                    <!-- Tampilkan gambar + bisa di klik -->
                    <a href="<?= $fileUrl ?>" target="_blank">
                        <img src="<?= $fileUrl ?>" width="100" alt="Kartu Identitas">
                    </a>
                <?php elseif ($ext === 'pdf'): ?>
                    <!-- PDF langsung jadi link -->
                    <a href="<?= $fileUrl ?>" target="_blank">Lihat File PDF</a>
                <?php else: ?>
                    <!-- Format lain fallback -->
                    <a href="<?= $fileUrl ?>" target="_blank">Lihat File</a>
                <?php endif; ?>
            <?php else: ?>
                <span class="text-muted">Tidak ada file</span>
            <?php endif; ?>
        </td>
        <td>
            <a class="success p-0" 
               href="<?= BASE_URL ?>/KartuIdentitasController/edit/<?= $row['ID_KARTU_IDENTITAS'] ?>">
               <i class="ft-edit-2 font-medium-3 mr-1"></i>
            </a>
            <a class="border-0 bg-transparent danger p-0 confirm-cancel" 
               data-href="<?= BASE_URL ?>/KartuIdentitasController/delete/<?= $row['ID_KARTU_IDENTITAS'] ?>">
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
<!--Extended Table Ends-->
</div>
</div>