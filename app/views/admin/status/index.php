<div class="main-content">
<div class="content-wrapper"><!--Extended Table starts-->
<div class="row">
  <div class="col-12">
    <div class="content-header">Tabel Status</div>
  </div>
</div>
<section id="extended">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <a href="<?= BASE_URL ?>/StatusController/create">Tambah Status</a>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table text-center table-striped zero-configuration">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                foreach ($data['status'] as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['STATUS'] ?></td>
                    <td>
                        <a class="success p-0" href="<?= BASE_URL ?>/StatusController/edit/<?= $row['ID_STATUS'] ?>"><i class="ft-edit-2 font-medium-3 mr-1"></i></a>
                        <a class="border-0 bg-transparent danger p-0 confirm-cancel" data-href="<?= BASE_URL ?>/StatusController/delete/<?= $row['ID_STATUS'] ?>"><i class="ft-x font-medium-3 mr-1"></i></a>
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