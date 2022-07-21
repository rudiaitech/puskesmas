<!-- Data table plugin-->
	<script type="text/javascript" src="<?= base_url()?>public/vali/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>public/vali/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>

	<script>
		//tabel dermaga
		var table_dermaga = $('#table_dermaga').DataTable({
			"scrollCollapse": false,
			"paging": false,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": false,
			"destroy": true,
			"responsive": true,
			"autoWidth": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url()?>admin/perusahaan/tabel_foto_dermaga/"+$("#id_perusahaan").val(),
				"type": "GET"
			},
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
		});

		//add dermaga
		$(document).on("click",".btn_add_foto_dermaga",function(){
			
			var id =$(this).attr("id_perusahaan");

			$("#modal_foto_dermaga").modal("show");
			$("#id_perusahaan_dermaga").val(id);
			$("#keterangan_dermaga").val("");
			$("foto_dermaga").val("");
			$("foto_dermaga").focus();
    	});

		//save dermaga
		$(document).on( "click",".btn_save_foto_dermaga", function() {

			var data = new FormData();
			// ambil atribut file yg akan diupload, lalu masukkan ke variabel input_gambar
			data.append('foto_dermaga', $("#foto_dermaga")[0].files[0]); 
			
			// Ambil isi dari textbox deskripsi
			data.append('keterangan_dermaga', $("#keterangan_dermaga").val());
			data.append('id_perusahaan_dermaga', $("#id_perusahaan_dermaga").val()); 
			$.ajax({
			url: '../../../admin/perusahaan/insert_foto_dermaga/',
			type: 'POST',
			data: data,
			cache: false,
			processData: false,
			contentType: false,
			success: function(data, textStatus, jqXHR)
        		{
					var data = jQuery.parseJSON(data);
            		if(data.result == 1){
						$("#id_perusahaan_dermaga").val("");
						$("#keterangan_dermaga").val("");
						$("foto_dermaga").val("");
						$("#modal_foto_dermaga").modal("hide");

						table_dermaga.ajax.reload();
						var content = {};
						content.message = 'Foto Dermaga berhasil ditambahkan';
						content.title = 'Sukses,';
						content.icon = 'fa fa-bell';

						$.notify(content,{
							type: 'info',
							placement: {
								from: 'bottom',
								align: 'right'
							},
							time: 1000,
							delay: 1000,
						});

					}else if(data.result == 2){
						var content = {};
						content.message = 'Gagal';
						content.title = 'Peringatan';
						content.icon = 'fa fa-times-circle';

						$.notify(content,{
							type: 'warning',
							placement: {
								from: 'danger',
								align: 'right'
							},
							time: 1000,
							delay: 1000,
						});

					}else{
						var content = {};
						content.message = 'Format Tidak Diijinkan';
						content.title = 'Peringatan';
						content.icon = 'fa fa-times-circle';

						$.notify(content,{
							type: 'danger',
							placement: {
								from: 'bottom',
								align: 'right'
							},
							time: 1000,
							delay: 1000,
						});
					}
				},

			});
        
		});


		//foto dermaga
		$(document).on( "click",".btn_del_foto_dermaga", function() {
			var id  = $(this).attr("id");
			$.ajax(
			{
				type: 'GET',
				url : "<?= base_url() ?>admin/perusahaan/delete_foto_dermaga/"+id,
				data: 'id=' + id,
				dataType: 'json',
				success: function(data, textStatus, jqXHR)
				{
					table_dermaga.ajax.reload();
				}
			});
		});
	</script>

	<script>
		//tabel layout
		var table_layout = $('#table_layout').DataTable({
			"scrollCollapse": false,
			"paging": false,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": false,
			"destroy": true,
			"responsive": true,
			"autoWidth": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url()?>admin/perusahaan/tabel_foto_layout/"+$("#id_perusahaan").val(),
				"type": "GET"
			},
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
		});

		//add layout
		$(document).on("click",".btn_add_foto_layout",function(){
			
			var id =$(this).attr("id_perusahaan");

			$("#modal_foto_layout").modal("show");
			$("#id_perusahaan_layout").val(id);
			$("#keterangan_layout").val("");
			$("foto_layout").val("");
			$("foto_layout").focus();
    	});

		//save layout
		$(document).on( "click",".btn_save_foto_layout", function() {

			var data = new FormData();
			// ambil atribut file yg akan diupload, lalu masukkan ke variabel input_gambar
			data.append('foto_layout', $("#foto_layout")[0].files[0]); 
			
			// Ambil isi dari textbox deskripsi
			data.append('keterangan_layout', $("#keterangan_layout").val());
			data.append('id_perusahaan_layout', $("#id_perusahaan_layout").val()); 
			$.ajax({
			url: '../../../admin/perusahaan/insert_foto_layout/',
			type: 'POST',
			data: data,
			cache: false,
			processData: false,
			contentType: false,
			success: function(data, textStatus, jqXHR)
        		{
					var data = jQuery.parseJSON(data);
            		if(data.result == 1){
						$("#id_perusahaan_layout").val("");
						$("#keterangan_layout").val("");
						$("foto_layout").val("");
						$("#modal_foto_layout").modal("hide");

						table_layout.ajax.reload();
						var content = {};
						content.message = 'Foto layout berhasil ditambahkan';
						content.title = 'Sukses,';
						content.icon = 'fa fa-bell';

						$.notify(content,{
							type: 'info',
							placement: {
								from: 'bottom',
								align: 'right'
							},
							time: 1000,
							delay: 1000,
						});

					}else if(data.result == 2){
						var content = {};
						content.message = 'Gagal';
						content.title = 'Peringatan';
						content.icon = 'fa fa-times-circle';

						$.notify(content,{
							type: 'warning',
							placement: {
								from: 'danger',
								align: 'right'
							},
							time: 1000,
							delay: 1000,
						});

					}else{
						var content = {};
						content.message = 'Format Tidak Diijinkan';
						content.title = 'Peringatan';
						content.icon = 'fa fa-times-circle';

						$.notify(content,{
							type: 'danger',
							placement: {
								from: 'bottom',
								align: 'right'
							},
							time: 1000,
							delay: 1000,
						});
					}
				},

			});
        
		});


		//del layout
		$(document).on( "click",".btn_del_foto_layout", function() {
			var id  = $(this).attr("id");
			$.ajax(
			{
				type: 'GET',
				url : "<?= base_url() ?>admin/perusahaan/delete_foto_layout/"+id,
				data: 'id=' + id,
				dataType: 'json',
				success: function(data, textStatus, jqXHR)
				{
					table_layout.ajax.reload();
				}
			});
		});
	</script>

	<script>
		//tabel sarana
		var table_sarana = $('#table_sarana').DataTable({
			"scrollCollapse": false,
			"paging": false,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": false,
			"destroy": true,
			"responsive": true,
			"autoWidth": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url()?>admin/perusahaan/tabel_foto_sarana/"+$("#id_perusahaan").val(),
				"type": "GET"
			},
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
		});

		//add sarana
		$(document).on("click",".btn_add_foto_sarana",function(){
			
			var id =$(this).attr("id_perusahaan");

			$("#modal_foto_sarana").modal("show");
			$("#id_perusahaan_sarana").val(id);
			$("#keterangan_sarana").val("");
			$("foto_sarana").val("");
			$("foto_sarana").focus();
    	});

		//save sarana
		$(document).on( "click",".btn_save_foto_sarana", function() {

			var data = new FormData();
			// ambil atribut file yg akan diupload, lalu masukkan ke variabel input_gambar
			data.append('foto_sarana', $("#foto_sarana")[0].files[0]); 
			
			// Ambil isi dari textbox deskripsi
			data.append('keterangan_sarana', $("#keterangan_sarana").val());
			data.append('id_perusahaan_sarana', $("#id_perusahaan_sarana").val()); 
			$.ajax({
			url: '../../../admin/perusahaan/insert_foto_sarana/',
			type: 'POST',
			data: data,
			cache: false,
			processData: false,
			contentType: false,
			success: function(data, textStatus, jqXHR)
        		{
					var data = jQuery.parseJSON(data);
            		if(data.result == 1){
						$("#id_perusahaan_sarana").val("");
						$("#keterangan_sarana").val("");
						$("foto_sarana").val("");
						$("#modal_foto_sarana").modal("hide");

						table_sarana.ajax.reload();
						var content = {};
						content.message = 'Foto sarana berhasil ditambahkan';
						content.title = 'Sukses,';
						content.icon = 'fa fa-bell';

						$.notify(content,{
							type: 'info',
							placement: {
								from: 'bottom',
								align: 'right'
							},
							time: 1000,
							delay: 1000,
						});

					}else if(data.result == 2){
						var content = {};
						content.message = 'Gagal';
						content.title = 'Peringatan';
						content.icon = 'fa fa-times-circle';

						$.notify(content,{
							type: 'warning',
							placement: {
								from: 'danger',
								align: 'right'
							},
							time: 1000,
							delay: 1000,
						});

					}else{
						var content = {};
						content.message = 'Format Tidak Diijinkan';
						content.title = 'Peringatan';
						content.icon = 'fa fa-times-circle';

						$.notify(content,{
							type: 'danger',
							placement: {
								from: 'bottom',
								align: 'right'
							},
							time: 1000,
							delay: 1000,
						});
					}
				},

			});
        
		});


		//foto sarana
		$(document).on( "click",".btn_del_foto_sarana", function() {
			var id  = $(this).attr("id");
			$.ajax(
			{
				type: 'GET',
				url : "<?= base_url() ?>admin/perusahaan/delete_foto_sarana/"+id,
				data: 'id=' + id,
				dataType: 'json',
				success: function(data, textStatus, jqXHR)
				{
					table_sarana.ajax.reload();
				}
			});
		});
	</script>

	<script>		
		//tabel perizinan
		var table_perizinan = $('#table_perizinan').DataTable({
			"scrollCollapse": false,
			"paging": false,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": false,
			"destroy": true,
			"responsive": true,
			"autoWidth": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url()?>admin/perusahaan/tabel_detail_perizinan/"+$("#id_perusahaan").val(),
				"type": "GET"
			},
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
		});

		//add perizinan
		$(document).on("click",".btn_add_detail_perizinan",function(){
			
			var id =$(this).attr("id_perusahaan");

			$("#modal_perizinan").modal("show");
			$("#id_perusahaan_perizinan").val(id);
			$("#keterangan_perizinan").val("");
			$("foto_perizinan").val("");
			$("foto_perizinan").focus();
    	});

		//save perizinan
		$(document).on( "click",".btn_save_foto_perizinan", function() {

			var data = new FormData();
			// ambil atribut file yg akan diupload, lalu masukkan ke variabel input_gambar
			data.append('foto_perizinan', $("#foto_perizinan")[0].files[0]); 
			
			// Ambil isi dari textbox deskripsi
			data.append('keterangan_perizinan', $("#keterangan_perizinan").val());
			data.append('id_perusahaan_perizinan', $("#id_perusahaan_perizinan").val()); 
			$.ajax({
			url: '../../admin/perusahaan/insert_foto_perizinan/',
			type: 'POST',
			data: data,
			cache: false,
			processData: false,
			contentType: false,
			success: function(data, textStatus, jqXHR)
        		{
					var data = jQuery.parseJSON(data);
            		if(data.result == 1){
						$("#id_perusahaan_perizinan").val("");
						$("#keterangan_perizinan").val("");
						$("foto_perizinan").val("");
						$("#modal_foto_perizinan").modal("hide");

						table_perizinan.ajax.reload();
						var content = {};
						content.message = 'Foto perizinan berhasil ditambahkan';
						content.title = 'Sukses,';
						content.icon = 'fa fa-bell';

						$.notify(content,{
							type: 'info',
							placement: {
								from: 'bottom',
								align: 'right'
							},
							time: 1000,
							delay: 1000,
						});

					}else if(data.result == 2){
						var content = {};
						content.message = 'Gagal';
						content.title = 'Peringatan';
						content.icon = 'fa fa-times-circle';

						$.notify(content,{
							type: 'warning',
							placement: {
								from: 'danger',
								align: 'right'
							},
							time: 1000,
							delay: 1000,
						});

					}else{
						var content = {};
						content.message = 'Format Tidak Diijinkan';
						content.title = 'Peringatan';
						content.icon = 'fa fa-times-circle';

						$.notify(content,{
							type: 'danger',
							placement: {
								from: 'bottom',
								align: 'right'
							},
							time: 1000,
							delay: 1000,
						});
					}
				},

			});
        
		});


		//foto perizinan
		$(document).on( "click",".btn_del_foto_perizinan", function() {
			var id  = $(this).attr("id");
			$.ajax(
			{
				type: 'GET',
				url : "<?= base_url() ?>admin/perusahaan/delete_foto_perizinan/"+id,
				data: 'id=' + id,
				dataType: 'json',
				success: function(data, textStatus, jqXHR)
				{
					table_perizinan.ajax.reload();
				}
			});
		});
	</script>


	<script>
		$(document).on("click",".btnedit",function(){
			var id =$(this).attr("id");
			$.ajax(
			{
				url : "<?= base_url()?>admin/desa/edit/"+id,
				type: "GET",
				dataType : "JSON",
				success: function(data)
				{
					$("#modaledit").modal("show");
					$("#d_desa").html(data.edit);
				},
				error: function(jqXHR, textdesa, errorThrown)
				{
				swal("Error!", id, "error");
				}
			});
    	});

		$(document).on("click",".btnhapus",function(){
			var id =$(this).attr("id");
			swal({
      		title: "Are you sure?",
      		text: "Do you want to delete this data?",
      		type: "warning",
      		showCancelButton: true,   
			confirmButtonColor: "#DD6B55",   
			confirmButtonText: "Delete",   
			closeOnConfirm: true
			}, function(isConfirm) {
				if (isConfirm) {
						window.location = "<?= base_url() ?>admin/perusahaan/delete/"+id;
					
				} else {
					swal("Cancelled", "Batal :)", "error");
				}
			});
		});
	</script>
</body>
</html>