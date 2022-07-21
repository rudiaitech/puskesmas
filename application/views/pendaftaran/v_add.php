<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?= $judul ?></h3>
            </div>

        </div>

        <div class="clearfix"></div>
            <div class="row">
                <?php
                
                echo validation_errors('<div class="alert alert-danger alert-dismissible">','</div>');
                if ($this->session->flashdata('success'))
                {
                    echo '<div class="col-lg-12 col-md-12 col-sm-12">';
                    echo '<div class="alert alert-success alert-dismissible " role="alert">';
                    echo $this->session->flashdata('success');
                    echo '</div>';
                    echo '</div>';
                }
                if ($this->session->flashdata('error'))
                {
                    echo '<div class="col-lg-12 col-md-12 col-sm-12">';
                    echo '<div class="alert alert-danger alert-dismissible " role="alert">';
                    echo $this->session->flashdata('error');
                    echo '</div>';
                    echo '</div>';
                }
                
                ?>
                <form class="col-lg-12 col-md-12 col-sm-12" action="<?php echo base_url().'pendaftaran/insert'?>" method="post">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <br />
                                <div class="form-horizontal form-label-left">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-12 label-align" for="first-name">Poli<span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-12 ">
                                            <select id="id_poli" name="id_poli" required="required" class="form-control " onChange="get_dokter(this.value)">
                                                <option value="">- Pilih Poli -</option>
                                                <?php $no=1; foreach($poli as $row_poli){?>
                                                <option value="<?= $row_poli->id_poli ?>"><?= $row_poli->nama_poli ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="item form-group" id="get_dokter">
                                        <label class="col-form-label col-md-4 col-sm-12 label-align" for="first-name">Dokter<span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-12 ">
                                            <select id="id_dokter" name="id_dokter" required="required" class="form-control " onChange="get_pendaftaran(this.value)">
                                                <option value="">- Pilih Dokter -</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <br />
                                <div class="form-horizontal form-label-left">

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tanggal<span class="required">*</span>
                                        </label>
                                        <div class="col-md-4 col-sm-12 ">
                                            <input type="date" id="tgl_pendaftaran" name="tgl_pendaftaran" required="required" class="form-control" value="<?= $tgl_sekarang ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="item form-group" id="get_pendaftaran">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">No. Pendaftaran<span class="required">*</span>
                                        </label>
                                        <div class="col-md-4 col-sm-12 ">
                                            <input type="text" id="no_pendaftaran" name="no_pendaftaran" required class="form-control readonly" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group" id="set_pasien">
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">No Reg. Pasien<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-12 ">
                                                <input type="text" id="noreg_pasien" name="noreg_pasien" required="required" class="form-control " readonly>
                                                <input type="hidden" id="id_pasien" name="id_pasien" required="required" class="form-control" readonly>
                                            </div>
                                            <div class="col-md-3 col-sm-12 ">
                                                <button type="button" class="btn btn-sm btn-info pull-left btncaripasien" ><i class="fa fa-fw fa-lg fa-search"></i> Cari</button>
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NIK KTP<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-12 ">
                                                <input type="text" id="nikktp_pasien" name="nikktp_pasien" required="required" class="form-control " readonly>
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-12 ">
                                                <input type="text" id="nama_pasien" name="nama_pasien" required="required" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat<span class="required">*</span>
                                            </label>
                                            <div class="col-md-8 col-sm-12 ">
                                                <input type="text" id="alamat_pasien" name="alamat_pasien" required="required" class="form-control " readonly>
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Desa<span class="required">*</span>
                                            </label>
                                            <div class="col-md-8 col-sm-12 ">
                                                <input type="text" id="desa_pasien" name="desa_pasien" required="required" class="form-control " readonly>
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jenis Kelamin<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-12 ">
                                                <input type="text" id="jeniskelamin_pasien" name="jeniskelamin_pasien" required="required" class="form-control " readonly>
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tgl. Lahir<span class="required">*</span>
                                            </label>
                                            <div class="col-md-4 col-sm-12 ">
                                                <input type="date" id="tanggallahir_pasien" name="tanggallahir_pasien" required="required" class="form-control " readonly>
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tempat Lahir<span class="required">*</span>
                                            </label>
                                            <div class="col-md-4 col-sm-12 ">
                                                <input type="text" id="tempatlahir_pasien" name="tempatlahir_pasien" required="required" class="form-control " readonly>
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">No. Telp<span class="required">*</span>
                                            </label>
                                            <div class="col-md-4 col-sm-12 ">
                                                <input type="text" id="notlp_pasien" name="notlp_pasien" required="required" class="form-control " readonly>
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jenis Jaminan Kesehatan<span class="required">*</span>
                                            </label>
                                            <div class="col-md-8 col-sm-12 ">
                                                <input type="text" id="jenisjamkes_pasien" name="jenisjamkes_pasien" required="required" class="form-control " readonly>
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">No. Jaminan Kesehatan<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-12 ">
                                                <input type="text" id="nojamkes_pasien" name="nojamkes_pasien"  class="form-control " readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Keluhan Pasien<span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-12 ">
                                            <textarea type="text" id="keluhan_pasien" name="keluhan_pasien"  class="form-control " required></textarea>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-6 offset-md-0">
                                            <a type="button" href="<?= base_url();?>pendaftaran" class="btn btn-sm btn-secondary"  style="color: white;"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a>

                                            <button type="submit" class="btn btn-sm btn-success pull-right"><i class="fa fa-fw fa-lg fa-save"></i> Simpan</button>
                                        </div>
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
<!-- /page content -->

<div class="modal fade bs-example-modal-lg" id="modal_pasien">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Data Pasien</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th style="width: 10%;">No.</th>
                            <th>No. Register</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Desa</th>
                            <th>Jaminan Kesehatan</th>
                            <th style="width: 20%;">Aksi</th>
                        </tr>
                        </thead>


                        <tbody>
                        <?php $no=1; foreach($pasien as $row){?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row->noreg_pasien ?></td>
                            <td><?= $row->nama_pasien ?></td>
                            <td><?= $row->jeniskelamin_pasien ?></td>
                            <td><?= $row->alamat_pasien ?></td>
                            <td><?= $row->desa_pasien ?></td>
                            <td><?= $row->jenisjamkes_pasien ?></td>
                            <td>
                            <a type="submit" class="btn btn-sm btn-success btnsetpasien" data-id="<?= $row->id_pasien ?>"><i class="fa fa-sm fa-check"></i> Pilih</a></td>
                        </tr>
                        <?php } ?> 
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>