  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Profil User</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active"><a href="<?= $title ?>"> Data <?= $title ?></a></li>
      </ul>
    </div>
    <div class="row user">
      <div class="col-md-12">
        <div class="tile">

          <form action="<?php echo base_url().'admin/profil/update'?>" method="post" enctype="multipart/form-data">
            <div class="tile-body">
              <div class="form-group row">
                <label class="control-label col-md-3">Foto</label>
                <div class="col-md-1">
                  <img src="<?= base_url()?>/public/image/upload/gurustaf/<?= $data['foto_user'] ?>" style="width: 80px; height: 100px;">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Nama</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" id="name_user" name="name_user" value="<?= $data['name_user'] ?>" readonly>
                  <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $data['id_user'] ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Email</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" id="username" name="username" value="<?= $data['username'] ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Password</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" id="password" name="password" placeholder="Abaikan kolom ini jika tidak ingin mengganti password">
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


