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
        <div class="card-header">
          <a href="<?= BASE_URL ?>/KartuIdentitasController/create">Tambah Kartu Identitas</a>
        </div>
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
                foreach ($data['kartuIdentitas'] as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['JENIS_KARTU_IDENTITAS'] ?></td>
                    <td><?= $row['NOMOR_KARTU_IDENTITAS'] ?></td>
                    <td>
                        <?php if ($row['URL_KARTU_IDENTITAS']): ?>
                            <?php $ext = pathinfo($row['URL_KARTU_IDENTITAS'], PATHINFO_EXTENSION); ?>
                            <?php if (in_array(strtolower($ext), ['jpg','jpeg','png'])): ?>
                                <img src="<?= BASE_URL ?>/<?= $row['URL_KARTU_IDENTITAS'] ?>" width="100">
                            <?php else: ?>
                                <a href="<?= BASE_URL ?>/<?= $row['URL_KARTU_IDENTITAS'] ?>" target="_blank">Lihat File</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a class="success p-0" href="<?= BASE_URL ?>/KartuIdentitasController/edit/<?= $row['ID_KARTU_IDENTITAS'] ?>"><i class="ft-edit-2 font-medium-3 mr-1"></i></a>
                        <a class="border-0 bg-transparent danger p-0 confirm-cancel" data-href="<?= BASE_URL ?>/KartuIdentitasController/delete/<?= $row['ID_KARTU_IDENTITAS'] ?>"><i class="ft-x font-medium-3 mr-1"></i></a>
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