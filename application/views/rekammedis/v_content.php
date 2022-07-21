<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2><?= $judul ?></h2>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                <?php
                echo validation_errors('<div class="alert alert-danger alert-dismissible">','</div>');
                if ($this->session->flashdata('success'))
                {
                    echo '<div class="alert alert-success alert-dismissible " role="alert">';
                    echo $this->session->flashdata('success');
                    echo '</div>';
                }
                if ($this->session->flashdata('error'))
                {
                    echo '<div class="alert alert-danger alert-dismissible " role="alert">';
                    echo $this->session->flashdata('error');
                    echo '</div>';
                }

                ?>

                  <div class="card-box table-responsive">
                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th style="width: 10%;">No.</th>
                        <th>Tanggal</th>
                        <th>No. Pendaftaran</th>
                        <th>Nama Pasien</th>
                        <th>Poli</th>
                        <th>Nama Dokter</th>
                        <th>Status</th>
                        <th style="width: 20%;">Aksi</th>
                      </tr>
                    </thead>


                    <tbody>
                    <?php $no=1; foreach($data as $row){?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->tgl_pendaftaran ?></td>
                        <td><?= $row->no_pendaftaran ?></td>
                        <td><?= $row->nama_pasien ?></td>
                        <td><?= $row->nama_poli ?></td>
                        <td><?= $row->nama_dokter ?></td>
                        <td><?= $row->status_pelayanan ?></td>
                        <td>
                          <a href="<?= base_url(); ?>rekammedis/rekam/<?= $row->id_pelayanan ?>" type="submit" class="btn btn-sm btn-success" id="<?= $row->id_pelayanan ?>"><i class="fa fa-sm fa-stethoscope"></i> Rekam Medis</a>
                      </tr>
                      <?php } ?> 
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
</div>