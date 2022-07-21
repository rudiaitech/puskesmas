
<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
<?php  
if ($this->session->flashdata('flash')) : ?>

<?php endif; ?>

  	<?php 
		if ($content) 
		{
			$this->load->view($content);
		}
	?>