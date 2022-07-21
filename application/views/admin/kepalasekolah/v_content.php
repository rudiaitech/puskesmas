  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Kepala Sekolah</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active"><a href="<?= $title ?>"> Data <?= $title ?></a></li>
      </ul>
    </div>
    <div class="row user">
      <div class="col-md-12">
        <div class="tile">

          <form action="<?php echo base_url().'admin/kepalasekolah/update'?>" method="post" enctype="multipart/form-data">
            <div class="tile-body">
              <div class="form-group row">
                <label class="control-label col-md-3">Nama Kepala Sekolah</label>
                <div class="col-md-5">
                  <input class="form-control" type="text" id="nama" name="nama" value="<?= $data['nama'] ?>" required>
                  <input class="form-control" type="hidden" id="id" name="id" value="<?= $data['id'] ?>">
                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                </div>
              </div>
              <div class="form-group row">
                  <label class="control-label col-md-3">Sambutan</label>
                  <div class="col-md-9">
                    <textarea class="form-control" rows="10" id="sambutan" name="sambutan"><?= $data['sambutan'] ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Visi</label>
                  <div class="col-md-9">
                  <textarea class="form-control" id="visi" name="visi" value=""><?= $data['visi'] ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Misi</label>
                  <div class="col-md-9">
                  <textarea class="form-control" rows="10" id="misi" name="misi" value=""><?= $data['misi'] ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Foto Kepala Sekolah</label>
                  <div class="col-md-6">
                  <input class="form-control" type="file" id="upload_data" name="upload_data">
                  </div>
                </div>
            </div>

            <div class="tile-footer">
              <div class="form-group" style="margin-bottom: 20px;">
                <a href="./dashboard" class="btn btn-secondary" type="button" style="color: white;"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
                <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
              </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </main>


