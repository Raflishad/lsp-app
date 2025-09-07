<div class="main-content">
<div class="content-wrapper"><!--Extended Table starts-->
<div class="row">
  <div class="col-12">
    <div class="content-header">Tabel Pertanyaan</div>
  </div>
</div>
<section id="extended">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <a href="<?= BASE_URL ?>/PertanyaanController/create">Tambah Pertanyaan</a>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table text-center table-striped zero-configuration">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Pertanyaan</th>
                  <th>Nomor</th>
                  <th>Status</th>
                  <th>Form</th>
                  <th>Elemen</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                foreach ($data['pertanyaan'] as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['PERTANYAAN']) ?></td>
                    <td><?= htmlspecialchars($row['NOMOR_PERTANYAAN']) ?></td>
                    <td><?= htmlspecialchars($row['STATUS_PERTANYAAN']) ?></td>
                    <td><?= htmlspecialchars($row['NAMA_FORM']) ?></td>
                    <td><?= htmlspecialchars($row['ELEMEN']) ?></td>
                    <td>
                        <a class="success p-0" href="<?= BASE_URL ?>/PertanyaanController/edit/<?= $row['ID_PERTANYAAN'] ?>">
                          <i class="ft-edit-2 font-medium-3 mr-1"></i>
                        </a>
                        <a class="border-0 bg-transparent danger p-0 confirm-cancel" 
                           data-href="<?= BASE_URL ?>/PertanyaanController/delete/<?= $row['ID_PERTANYAAN'] ?>">
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
