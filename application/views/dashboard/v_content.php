<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                <?php if($this->session->userdata('level') == 'Admin'){
                ?>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                        <div class="icon"><i class="fa fa-user-md" style="color: #1ABB9C;"></i></div>
                        <div class="count"><?= $total_dokter ?></div>
                        <h3>Jumlah Dokter</h3>
                        <p>-</p>
                        </div>
                    </div>
                <?php
                }
                ?>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                        <div class="icon"><i class="fa fa-user" style="color: #1ABB9C;"></i></div>
                        <div class="count"><?= $total_pasien ?></div>
                        <h3>Jumlah Pasien </h3>
                        <p>Hari ini</p>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                        <div class="icon"><i class="fa fa-sort-amount-desc" style="color: #1ABB9C;"></i></div>
                        <div class="count"><?= $total_antri ?></div>
                        <h3>Sisa Antrian</h3>
                        <p>Hari ini</p>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                        <div class="icon"><i class="fa fa-check-square-o" style="color: #1ABB9C;"></i></div>
                        <div class="count"><?= $total_selesai ?></div>
                        <h3>Selesai Diperiksa</h3>
                        <p>Hari ini</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="alert alert-success " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>Selamat datang</strong> <?= $user ?> ,di sistem informasi Puskesmas Gayam.
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /page content -->

