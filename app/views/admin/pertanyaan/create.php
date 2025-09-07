<div class="main-content">
<div class="content-wrapper">
<div class="row">
  <div class="col-12">
    <div class="content-header">Form Pertanyaan</div>
  </div>
</div>
<section id="extended">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <h2 class="card-title">Tambah Pertanyaan</h2>
            <form method="POST">
              <div class="row justify-content-start mt-2">
                <div class="col-md-8">
                  <div class="form-body">
                    <div class="form-group px-2">
                      <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">

                      <label>Pertanyaan</label>
                      <textarea class="form-control" name="pertanyaan" rows="3" required></textarea>

                      <label class="mt-2">Nomor Pertanyaan</label>
                      <input type="text" class="form-control" name="nomor" value="" required>

                      <label class="mt-2">Status</label>
                      <select name="status" class="form-control" required>
                          <option value="">-- Pilih Status --</option>
                          <option value="aktif">Aktif</option>
                          <option value="nonaktif">Nonaktif</option>
                      </select>

                      <label class="mt-2">Form</label>
                      <select name="formId" class="form-control" required>
                          <option value="">-- Pilih Form --</option>
                          <?php foreach ($form as $f): ?>
                              <option value="<?= $f['ID_FORM'] ?>">
                                  <?= htmlspecialchars($f['NAMA_FORM']) ?>
                              </option>
                          <?php endforeach; ?>
                      </select>

                      <label class="mt-2">Elemen</label>
                      <select name="elemenId" class="form-control" required>
                          <option value="">-- Pilih Elemen --</option>
                          <?php foreach ($elemen as $e): ?>
                              <option value="<?= $e['ID_ELEMEN'] ?>">
                                  <?= htmlspecialchars($e['ELEMEN']) ?>
                              </option>
                          <?php endforeach; ?>
                      </select>

                      <div class="mt-3">
                        <a href="<?= BASE_URL ?>/AdminController/pertanyaan" class="btn btn-raised btn-warning mr-1">
                          <i class="ft-x"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-raised btn-primary">
                          <i class="fa fa-check-square-o"></i> Save
                        </button>
                      </div>

                    </div>
                  </div>
                </div>
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
