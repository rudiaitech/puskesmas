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

          <form action="<?php echo base_url().'admin/album/insert'?>" method="post" enctype="multipart/form-data">
            <div class="tile-body">
              <div class="form-group row">
                <label class="control-label col-md-3">Judul</label>
                <div class="col-md-5">
                  <input class="form-control" type="text" id="album_title" name="album_title" value="" required>
                  <input class="form-control" type="hidden" id="id_album" name="id_album" value="<?= $kode_baru ?>" required>
                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                </div>
              </div>
              <div class="form-group row">
                  <label class="control-label col-md-3">Cover Album</label>
                  <div class="col-md-6">
                    <input class="form-control" type="file" id="upload_data" name="upload_data" required>
                  </div>
              </div>

              <div class="form-group row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <h3>Foto Album</h3>
                    <button type="button" class="btn btn-info btn-sm icon-btn btnadd btn-pull-right btn_add_foto" id_album="<?= $kode_baru ?>"><i class="fa fa-plus"></i>Foto</button>

                    <div class="table-responsive">
                      <table class="table table-hover table-bordered" id="tabel_foto">
                        <thead>
                          <tr>
                            <th style="width: 10%;">No</th>
                            <th>Foto</th>
                            <th style="width: 10%;">#</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
              </div>

                

            <div class="tile-footer">
              <div class="form-group" style="margin-bottom: 20px;">
                <a href="<?= base_url();?>admin/foto" class="btn btn-secondary" type="button" style="color: white;"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>
                <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
              </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </main>


<div id="modal_foto" class="modal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Foto Album</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form id="first_form" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">Foto</label>
            <input class="form-control" type="file" id="photo_name" name="photo_name" required>
            <input class="form-control" type="hidden" id="id_album" name="id_album" placeholder="Isi Nama Keterangan Dermaga" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn_save_foto">Save</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

