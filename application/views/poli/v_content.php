<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-8 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2><?= $judul ?></h2>
            <ul class="nav navbar-right panel_toolbox">
            <p><a href="<?= base_url(); ?>poli/add" class="btn btn-sm btn-success icon-btn"><i class="fa fa-plus"></i>Tambah Data</a></p>
            </ul>
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
                        <th style="width: 15%;">No.</th>
                        <th>Nama Poli</th>
                        <th style="width: 30%;">Aksi</th>
                      </tr>
                    </thead>


                    <tbody>
                    <?php $no=1; foreach($data as $row){?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->nama_poli ?></td>
                        <td>
                          <a href="<?= base_url(); ?>poli/edit/<?= $row->id_poli ?>" type="submit" class="btn btn-sm btn-warning" id="<?= $row->id_poli ?>"><i class="fa fa-lg fa-edit"></i> Edit</a>

                          <a type="submit" class="btn btn-sm btn-danger btnhapus" data-id="<?= $row->id_poli ?>"><i class="fa fa-lg fa-trash"></i> Hapus</a></td>
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