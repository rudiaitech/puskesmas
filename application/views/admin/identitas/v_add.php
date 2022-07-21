<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Tambah Data Perusahaan</h1>
      <p><?= $nama_jenis ?> - <?= $nama_kategori ?></p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item active"><a href="desa">Data Perusahaan</a></li>
    </ul>
  </div>
    <div class="row user">
      <div class="col-md-10">
        <div class="tab-content">
          <div class="tab-pane active" id="user-data">
            <div class="tile user-settings">
              <h4 class="line-head">Data Perusahaan</h4>
              <form action="<?php echo base_url().'admin/perusahaan/insert'?>" method="post">
                <div class="form-group row">
                  <label class="control-label col-md-3">Nama Perusahaan</label>
                  <div class="col-md-5">
                    <input class="form-control" type="text" id="nama_perusahaan" name="nama_perusahaan" required>
                    <input class="form-control" type="hidden" id="id_perusahaan" name="id_perusahaan" value="<?= $kode_baru ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Alamat</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="alamat" name="alamat">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Koordinat</label>
                  <div class="col-md-6">
                    <input class="form-control" type="text" id="koordinat" name="koordinat">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Spesifikasi Dermaga</label>
                  <div class="col-md-8">
                    <textarea class="form-control" rows="4" id="spesifikasi_dermaga" name="spesifikasi_dermaga"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Jarak Dermaga Terdekat</label>
                  <div class="col-md-4">
                    <input class="form-control" type="text" id="jarak_dermaga_terdekat" name="jarak_dermaga_terdekat">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="control-label col-md-3">Jarak Dermaga Ke Pelindo</label>
                  <div class="col-md-4">
                    <input class="form-control" type="text" id="jarak_dermaga_pelindo" name="jarak_dermaga_pelindo">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label col-md-3">Luas Perairan</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" id="luas_perairan" name="luas_perairan">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label col-md-3">Dermaga</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" value="<?= $nama_jenis ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label col-md-3">Kategori</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" value="<?= $nama_kategori ?>" readonly>
                    <input class="form-control" type="hidden" id="id_kategori" name="id_kategori" value="<?= $id_kategori ?>" readonly>
                  </div>
                </div>

              
            </div>
          </div>
          <div class="tab-pane fade" id="user-foto">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="col-md-12">
                    <h3>Foto Dermaga</h3>
                    <button type="button" class="btn btn-info btn-sm icon-btn btnadd btn-pull-right btn_add_foto_dermaga" id_perusahaan="<?= $kode_baru ?>"><i class="fa fa-plus"></i>Foto Dermaga</button>

                    <div class="table-responsive">
                      <table class="table table-hover table-bordered" id="table_dermaga">
                        <thead>
                          <tr>
                            <th style="width: 10%;">No</th>
                            <th>Foto</th>
                            <th>Keterangan</th>
                            <th style="width: 10%;">#</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="col-md-12">
                    <h3>Layout Dermaga</h3>
                    <button type="button" class="btn btn-info btn-sm icon-btn btnadd btn-pull-right btn_add_foto_layout" id_perusahaan="<?= $kode_baru ?>"><i class="fa fa-plus"></i>Layout dermaga</button>

                    <div class="table-responsive">
                      <table class="table table-hover table-bordered" id="table_layout">
                        <thead>
                          <tr>
                            <th style="width: 10%;">No</th>
                            <th>Foto</th>
                            <th>Keterangan</th>
                            <th style="width: 10%;">#</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="col-md-12">
                    <h3>Sarana dan Prasarana</h3>
                    <button type="button" class="btn btn-info btn-sm icon-btn btnadd btn-pull-right btn_add_foto_sarana" id_perusahaan="<?= $kode_baru ?>"><i class="fa fa-plus"></i>Sarana dan Prasarana</button>

                    <div class="table-responsive">
                      <table class="table table-hover table-bordered" id="table_sarana">
                        <thead>
                          <tr>
                            <th style="width: 10%;">No</th>
                            <th>File</th>
                            <th>Keterangan</th>
                            <th style="width: 10%;">#</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="tab-pane fade" id="user-perizinan">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="col-md-12">
                    <h3>Perizinan</h3>
                    <button type="button" class="btn btn-info btn-sm icon-btn btnadd btn-pull-right btn_add_detail_perizinan" id_perusahaan="<?= $kode_baru ?>"><i class="fa fa-plus"></i>Perizinan</button>

                    <div class="table-responsive">
                      <table class="table table-hover table-bordered" id="table_perizinan">
                        <thead>
                          <tr>
                            <th style="width: 10%;">No</th>
                            <th>Nama Perizinan</th>
                            <th>File</th>
                            <th>Dokumen Pendukung</th>
                            <th style="width: 10%;">#</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>

        </div>
      </div>
      <div class="col-md-2">
        <div class="tile p-0">
          <ul class="nav flex-column nav-tabs user-tabs">
            <li class="nav-item"><a class="nav-link active" href="#user-data" data-toggle="tab">Data Perusahaan</a></li>
            <li class="nav-item"><a class="nav-link" href="#user-foto" data-toggle="tab">Detail Foto</a></li>
            <li class="nav-item"><a class="nav-link" href="#user-perizinan" data-toggle="tab">Data Perizinan</a></li>
            <li class="nav-item"><button class="btn btn-md btn-primary btn-block" type="submit" style="color: #fff;">Simpan</button></li>

          </ul>
        </div>
      </div>
      </form>
    </div>
  </main>



<div id="modal_foto_dermaga" class="modal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Foto Dermaga</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form id="first_form" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">Foto</label>
            <input class="form-control" type="file" id="foto_dermaga" name="foto_dermaga" placeholder="Isi Nama Keterangan Dermaga" required>
            <input class="form-control" type="hidden" id="id_perusahaan_dermaga" name="id_perusahaan_dermaga" placeholder="Isi Nama Keterangan Dermaga" required>
          </div>
          <div class="form-group">
            <label class="control-label">Keterangan</label>
            <input class="form-control" type="text" id="keterangan_dermaga" name="keterangan_dermaga" placeholder="Isi Nama Keterangan Dermaga" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn_save_foto_dermaga">Save</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="modal_foto_layout" class="modal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Foto Layout Dermaga</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form id="first_form" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">Foto</label>
            <input class="form-control" type="file" id="foto_layout" name="foto_layout" required>
            <input class="form-control" type="hidden" id="id_perusahaan_layout" name="id_perusahaan_layout" placeholder="Isi Nama Keterangan layout" required>
          </div>
          <div class="form-group">
            <label class="control-label">Keterangan</label>
            <input class="form-control" type="text" id="keterangan_layout" name="keterangan_layout" placeholder="Isi Keterangan" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn_save_foto_layout">Save</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="modal_foto_sarana" class="modal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Foto Sarana dan Prasarana Dermaga</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form id="first_form" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">File</label>
            <input class="form-control" type="file" id="foto_sarana" name="foto_sarana" required>
            <input class="form-control" type="hidden" id="id_perusahaan_sarana" name="id_perusahaan_sarana" required>
          </div>
          <div class="form-group">
            <label class="control-label">Keterangan</label>
            <input class="form-control" type="text" id="keterangan_sarana" name="keterangan_sarana" placeholder="Isi Keterangan" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn_save_foto_sarana">Save</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="modal_perizinan" class="modal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Perizinan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form id="first_form" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">File</label>
            <input class="form-control" type="file" id="foto_sarana" name="foto_sarana" required>
            <input class="form-control" type="hidden" id="id_perusahaan_sarana" name="id_perusahaan_sarana" required>
          </div>
          <div class="form-group">
            <label class="control-label">Nama Izin</label>
              <input class="form-control" type="text" id="id_izin" name="id_izin" placeholder="Isi Keterangan" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn_save_foto_sarana">Save</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

