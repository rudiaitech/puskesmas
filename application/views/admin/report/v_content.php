    <div class="container" style="min-height: 480px;">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">
		  <?php  
					echo validation_errors('<div class="alert alert-danger alert-slide-up">','</div>');
					if ($this->session->flashdata('danger'))
					{
						echo '<div class="alert alert-danger alert-slide-up">';
						echo $this->session->flashdata('danger');
						echo '</div>';
					}

					if ($this->session->flashdata('sukses'))
					{
						echo '<div class="alert alert-success alert-slide-up">';
						echo $this->session->flashdata('sukses');
						echo '</div>';
					}
					?>
            <div class="widget widget-table action-table">

				<div class="widget-header"> <i class="icon-th-list"></i>
					<h3>Job Report</h3>
				</div>

				<div class="widget-content" >

					<div class="row" style="margin-top:20px; margin-right:20px;">
						<form class="form-horizontal" enctype="multipart/form-data" action="<?= base_url() ?>admin/report/print" method="post">

						<div class="span12">
							
							<fieldset>
								
								<div class="control-group">	
									<div class="row">
									<label class="control-label">Create Date</label>

										<div class="span3">
											<input type="date" class="span3" id="tgl_awal" name="tgl_awal" required>
										</div>
										<div class="span1">
											<span>s/d</span>
										</div>
										
										<div class="span3" style="margin-left: 0px;">
											<input type="date"class="span3" id="tgl_akhir" name="tgl_akhir" required>
										</div>
									</di>	
								</div>

								<div class="control-group">
								</div>

								<div class="control-group">	
									<div class="row">
									<label class="control-label">Job Status</label>

										<div class="span3">
											<select class="span3" id="job_status" name="job_status">
												<option value="">- Job Status -</option>
												<option value="open">Open</option>
												<option value="continue">Continue</option>
												<option value="finish">Finish</option>
												<option value="close">Close</option>
											</select>
										</div>
									</di>	
								</div>

								<div class="control-group">
								</div>

								<div class="control-group">	
									<div class="row">
									<label class="control-label">Engineer</label>

										<div class="span3">
											<select class="span3" id="id_engineer" name="id_engineer">
												<option value="">- Engineer -</option>
												<?php 
												foreach($data_engineer as $row){ 
													echo "<option value='$row->id_engineer'>$row->name_engineer</option>";

												}
												?>
											</select>
										</div>
									</di>	
								</div>

							</fieldset>
								
							
						</div>


						<div class="span12">
							<div class="form-actions text-center">
								<button type="submit" class="btn btn-primary">Submit</button> 
								<a href="<?= base_url() ?>admin/dashboard" class="btn">Cancel</a>
							</div> <!-- /form-actions -->

						</div>

						</form>
					</div>

					
				</div>

            </div>
          </div>
        </div>
      </div>
    </div>


