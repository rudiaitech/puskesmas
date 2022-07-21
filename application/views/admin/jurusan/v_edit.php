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

          <form action="<?php echo base_url().'admin/jurusan/update'?>" method="post" enctype="multipart/form-data">
            <div class="tile-body">
              <div class="form-group row">
                <label class="control-label col-md-3">Nama Kompetensi Keahlian</label>
                <div class="col-md-5">
                  <input class="form-control" type="text" id="nama" name="nama" value="<?= $data['nama'] ?>" required>
                  <input class="form-control" type="hidden" id="id_jurusan" name="id_jurusan" value="<?= $data['id_jurusan'] ?>" required>
                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                </div>
              </div>
              <div class="form-group row">
                  <label class="control-label col-md-3">Deskripsi</label>
                  <div class="col-md-9">
                    <textarea class="form-control" rows="10" id="deskripsi" name="deskripsi"><?= $data['deskripsi'] ?></textarea>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="control-label col-md-3">Foto</label>
                  <div class="col-md-1">
                    <img src="<?= base_url()?>/public/image/upload/kompetensi/<?= $data['foto'] ?>" style="width: 80px; height: 100px;">
                  </div>
                  <div class="col-md-5">
                    <input class="form-control" type="file" id="upload_data" name="upload_data">
                  </div>
              </div>
                
            </div>

            <div class="tile-footer">
              <div class="form-group" style="margin-bottom: 20px;">
                <a href="<?= base_url();?>admin/jurusan" class="btn btn-secondary" type="button" style="color: white;"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
                <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
              </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </main>


