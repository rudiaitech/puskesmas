  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> <?= $judul ?></h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active"><a href="<?= $judul ?>"> <?= $judul ?></a></li>
      </ul>
    </div>
    <div class="row user">
      <div class="col-md-12">
        <div class="tile">

          <form action="<?php echo base_url().'admin/sdm/insert'?>" method="post" enctype="multipart/form-data">
            <div class="tile-body">
              <div class="form-group row">
                <label class="control-label col-md-3">NIK</label>
                <div class="col-md-3">
                  <input class="form-control" type="text" id="nik" name="nik" value="" required>
                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Nama</label>
                <div class="col-md-5">
                  <input class="form-control" type="text" id="nama" name="nama" value="" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Kelompok</label>
                <div class="col-md-6">
                  <select class="form-control" id="kelompok" name="kelompok" required>
                    <option value="">- Pilih Kelompok - </option>
                    <option value="Tenaga Pendidik"> Tenaga Pendidik </option>
                    <option value="Tenaga Kependidikan"> Tenaga Kependidikan </option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Jabatan</label>
                <div class="col-md-6">
                  <input class="form-control" type="text" id="jabatan" name="jabatan" value="" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">No. Telp</label>
                <div class="col-md-4">
                  <input class="form-control" type="text" id="no_telp" name="no_telp" value="" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Email</label>
                <div class="col-md-5">
                  <input class="form-control" type="email" id="email" name="email" value="" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Password</label>
                <div class="col-md-4">
                  <input class="form-control" type="text" id="password" name="password" value="" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Foto</label>
                <div class="col-md-5">
                  <input class="form-control" type="file" id="upload_data" name="upload_data" value="" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Aktif</label>
                <div class="col-md-4">
                  <input type="radio" name="aktif" value="0" checked> Ya<br>
                  <input type="radio" name="aktif" value="1"> Tidak<br>
                </div>
              </div>
                
            </div>

            <div class="tile-footer">
              <div class="form-group" style="margin-bottom: 20px;">
                <a href="<?= base_url();?>admin/gurustaf" class="btn btn-secondary" type="button" style="color: white;"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
                <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
              </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </main>


