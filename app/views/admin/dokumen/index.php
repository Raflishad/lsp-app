<div class="main-content">
<div class="content-wrapper">
<div class="row">
  <div class="col-12">
    <div class="content-header">Tabel Dokumen Siswa</div>
  </div>
</div>
<section id="extended">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table text-center table-striped zero-configuration">
              <thead>
                <tr>
                  <th>#</th>
                  <th>NISN</th>
                  <th>Pas Foto</th>
                  <th>Sertifikat</th>
                  <th>Transkrip</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($dokumen as $row): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= htmlspecialchars($row['NISN']) ?></td>
                  <td><?= $row['PAS_FOTO'] ? "<a href='".BASE_URL."/".$row['PAS_FOTO']."' target='_blank'>Lihat</a>" : "<span class='text-danger'>Belum ada</span>" ?></td>
                  <td><?= $row['SERTIFIKAT'] ? "<a href='".BASE_URL."/".$row['SERTIFIKAT']."' target='_blank'>Lihat</a>" : "<span class='text-danger'>Belum ada</span>" ?></td>
                  <td><?= $row['TRANSKRIP'] ? "<a href='".BASE_URL."/".$row['TRANSKRIP']."' target='_blank'>Lihat</a>" : "<span class='text-danger'>Belum ada</span>" ?></td>
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
