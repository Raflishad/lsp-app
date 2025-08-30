
<div class="main-content">
<div class="content-wrapper">
<div class="row">
  <div class="col-12">
    <div class="content-header">Form Kartu Identitas</div>
  </div>
</div>
<section id="extended">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <h2 class="card-title">Tambah Kartu Identitas</h2>
            <form method="POST" enctype="multipart/form-data">
              <div class="row justify-content-start mt-2">

                <div class="col-md-6">
                  <div class="form-body">
                    <div class="form-group px-2">

                      <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
                      <input type="hidden" name="id" value="<?= isset($data['ID_KARTU_IDENTITAS']) ? $data['ID_KARTU_IDENTITAS'] : '' ?>">

                      <label>Jenis</label><br>
                      <div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="jenis" id="jenis_ktp" value="KTP">
                          <label class="form-check-label" for="jenis_ktp">KTP</label>
                        </div>

                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="jenis" id="jenis_kartupelajar" value="Kartu Pelajar"
                            >
                          <label class="form-check-label" for="jenis_kartupelajar">Kartu Pelajar</label>
                        </div>  
                      </div>

                      <label class="mt-2">Nomor</label>
                      <input type="number" class="form-control" name="nomor" 
                            value="" required>

                      <label class="mt-2">File (Upload Baru)</label>
                      <input type="file" class="form-control mb-3" name="file">

                      <div class="mt-3">
                        <a href="<?= BASE_URL ?>/AdminController/kartuIdentitas" class="btn btn-raised btn-warning mr-1">
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
