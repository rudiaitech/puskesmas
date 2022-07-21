<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>Data Kartu</h1>
      <p>Master Data Kartu</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item active"><a href="kakartuu">Data Kartu</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-title-w-btn">
          <p><button type="submit" class="btn btn-primary icon-btn btnadd"><i class="fa fa-plus"></i>Tambah Data</button></p>
        </div>
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th style="width: 10%;">No</th>
                  <th>Foto</th>
                  <th>No. Id</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th style="width: 15%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php $no=1; foreach($data as $row){?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $row->foto_orang ?></td>
                  <td><?= $row->id_kartu ?></td>
                  <td><?= $row->nama ?></td>
                  <td><?= $row->jenis_kelamin ?></td>
                  <td>
                      <button type="submit" class="btn btn-sm btn-warning btnedit" id="<?= $row->id_kartu ?>"><i class="fa fa-lg fa-edit"></i></button>

                      <button type="submit" class="btn btn-sm btn-danger btnhapus" id="<?= $row->id_kartu ?>"><i class="fa fa-lg fa-trash"></i></button>
                    
                  </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<div id="modaladd" class="modal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah kartu</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form action="<?= base_url() ?>admin/kartu/insert" method="post"> 
        <div class="modal-body">
          <div class="bs-component">
            <ul class="nav nav-tabs">
              <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#data">Data diri</a></li>
              <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#foto">Foto</a></li>
              <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#kartu">Data Kartu</a></li>
              
            </ul>
            <div class="tab-content" id="myTabContent">
            
              <div class="tab-pane fade active show" id="data">
                <div class="tile-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="control-label">Nama</label>
                        <input class="form-control" type="text" id="nama" name="nama" placeholder="" required>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Tempat Lahir</label>
                        <input class="form-control" type="text" id="tempat_lahir" name="tempat_lahir" placeholder="" required>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Tanggal Lahir</label>
                        <input class="form-control" type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="" required>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Jenis Kelamin</label>
                        <select class="form-control" type="text" id="jenis_kelamin" name="jenis_kelamin" required>
                          <option value="">- Pilih Jenis Kelamin -</option>
                          <option value="Laki-Laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="control-label">No. Telp</label>
                        <input class="form-control" type="text" id="nomor_telepon" name="nomor_telepon" placeholder="" required>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Hobi</label>
                        <input class="form-control" type="text" id="hobi" name="hobi" placeholder="" required>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Status</label>
                        <select class="form-control" type="text" id="id_status" name="id_status" required>
                          <option value="">- Pilih Status -</option>
                          
                          <?php
                          foreach($list_status as $row_status){
                            echo "<option value='$row_status->id_status'>$row_status->nama_status</option>";
                          }
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Pendidikan</label>
                        <select class="form-control" type="text" id="id_pendidikan" name="id_pendidikan" required>
                          <option value="">- Pilih Pendidikan -</option>
                          
                          <?php
                          foreach($list_pendidikan as $row_pendidikan){
                            echo "<option value='$row_pendidikan->id_pendidikan'>$row_pendidikan->nama_pendidikan</option>";
                          }
                          ?>

                        </select>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Profesi</label>
                        <select class="form-control" type="text" id="id_profesi" name="id_profesi" required>
                          <option value="">- Pilih Profesi -</option>
                          
                          <?php
                          foreach($list_profesi as $row_profesi){
                            echo "<option value='$row_profesi->id_profesi'>$row_profesi->nama_profesi</option>";
                          }
                          ?>
                        </select>
                      </div>

                    </div>

                    <div class="col-md-4">

                      <div class="form-group">
                        <label class="control-label">District</label>
                        <select class="form-control" type="text" id="id_district" name="id_district" onChange="get_kecamatan(this.value)"  required>
                          <option value="">- Pilih District -</option>
                          
                          <?php
                          foreach($list_district as $row_district){
                            echo "<option value='$row_district->id_district'>$row_district->nama_district</option>";
                          }
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label class="control-label">District</label>
                        <select class="form-control" type="text" id="id_kecamatan" name="id_kecamatan" onChange="get_desa(this.value)"  required>

                        </select>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Desa</label>
                        <select class="form-control" type="text" id="id_desa" name="id_desa" onChange="get_rt(this.value)"  required>
                        </select>
                      </div>

                      <div class="form-group">
                        <label class="control-label">RT</label>
                        <select class="form-control" type="text" id="id_rt" name="id_rt" required>
                        </select>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Posisi</label>
                        <select class="form-control" type="text" id="id_posisi" name="id_posisi" required>
                          <option value="">- Pilih Posisi -</option>
                          
                          <?php
                          foreach($list_posisi as $row_posisi){
                            echo "<option value='$row_posisi->id_posisi'>$row_posisi->nama_posisi</option>";
                          }
                          ?>
                        </select>
                      </div>
                      
                    </div>

                  </div>
                </div>

              </div>
              <div class="tab-pane fade" id="foto">
                <div class="tile-body">
                  <div class="row">

                    <div class="col-md-12">
                      <div class="tile-body">
                        <form method="post">
                          <label for="upload_image">
                            <div class="overlay">
                              <div class="text">Click to Change Profile Image</div>
                            </div>
                            <input type="file" name="image" class="image" id="upload_image" style="display:none" />
                          </label>
                        </form>

                        <div class="col-md-8">
			                    		<img src="" id="sample_image" />
			                		</div>
			                		<div class="col-md-4">
			                    		<div class="preview"></div>
			                		</div>

                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="kartu">
                <div class="tile-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="control-label">ID Kartu</label>
                        <input class="form-control" type="text" id="id_kartu" name="id_kartu" placeholder="" required>
                      </div>
                      <div class="form-group">
                        <label class="control-label">No. KTP</label>
                        <input class="form-control" type="text" id="nomor_ktp" name="nomor_ktp" placeholder="" required>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label">Tanggal Register</label>
                        <input class="form-control" type="date" id="date_regis" name="date_regis" placeholder="" required>
                      </div>

                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="control-label">Status Konfirmasi</label>
                        <select class="form-control" type="text" id="konfirmasi" name="konfirmasi" required>
                          <option>- Pilih Status Konfirmasi -</option>
                          <option value="Ya">Ya</option>
                          <option value="Tidak">Tidak</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Tanggal Konfirmasi</label>
                        <input class="form-control" type="date" id="date_konfirmasi" name="date_konfirmasi" placeholder="" required>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="kartu1">
                <div class="tile-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="tile-body">
                        <h4>Foto Anggota</h4>
                        <div class="text-center dropzone" method="POST" enctype="multipart/form-data" action="<?= base_url()?>public/image/file-upload">
                          <div class="dz-message">Drop files here or click to upload<br><small class="text-info">(This is just a dropzone demo. Selected files are not actually uploaded.)</small></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="tile-body">
                        <h4>Foto KTP</h4>
                        <div class="text-center dropzone" method="POST" enctype="multipart/form-data" action="<?= base_url()?>public/image/file-upload">
                          <div class="dz-message">Drop files here or click to upload<br><small class="text-info">(This is just a dropzone demo. Selected files are not actually uploaded.)</small></div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              
              
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary">Save</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="modaledit" class="modal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit kartu</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form action="<?= base_url() ?>admin/kartu/update" method="post"> 
        <div class="modal-body">
          <div id="d_kartu">

          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary">Save</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>