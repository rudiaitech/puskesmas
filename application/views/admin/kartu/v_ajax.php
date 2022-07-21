<!-- Data table plugin-->
	<script type="text/javascript" src="<?= base_url()?>public/vali/js/plugins/select2.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>public/vali/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>public/vali/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
	<script type="text/javascript" src="<?= base_url()?>public/vali/js/plugins/dropzone.js"></script>
    
	<script>

	$(document).ready(function(){

	var $modal = $('#modal');

	var image = document.getElementById('sample_image');

	var cropper;

	$('#upload_image').change(function(event){
		var files = event.target.files;

		var done = function(url){
			image.src = url;
		};

		if(files && files.length > 0)
		{
			reader = new FileReader();
			reader.onload = function(event)
			{
				done(reader.result);
			};
			reader.readAsDataURL(files[0]);
		}
	});

	$modal.on('shown.bs.modal', function() {
		cropper = new Cropper(image, {
			aspectRatio: 1,
			viewMode: 3,
			preview:'.preview'
		});
	}).on('hidden.bs.modal', function(){
		cropper.destroy();
   		cropper = null;
	});

	$('#crop').click(function(){
		canvas = cropper.getCroppedCanvas({
			width:400,
			height:400
		});

		canvas.toBlob(function(blob){
			url = URL.createObjectURL(blob);
			var reader = new FileReader();
			reader.readAsDataURL(blob);
			reader.onloadend = function(){
				var base64data = reader.result;
				$.ajax({
					url:'upload.php',
					method:'POST',
					data:{image:base64data},
					success:function(data)
					{
						$modal.modal('hide');
						$('#uploaded_image').attr('src', data);
					}
				});
			};
		});
	});
	
});
</script>
	
	<script type="text/javascript">
      
      $('#demoSelect').select2();
    </script>
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
		function get_kecamatan(id){
			$.ajax(
			{
				url : "<?= base_url()?>admin/kartu/get_kecamatan/"+id,
				type: "GET",
				dataType : "JSON",
				success: function(data)
				{
					$("#id_kecamatan").html(data.kecamatan);
				},
				error: function(jqXHR, textdesa, errorThrown)
				{
					var html = '<option value=""></option>';
                    
                    $("#id_kecamatan").html(html);
				}
			});
  		}

		function get_desa(id){
			$.ajax(
			{
				url : "<?= base_url()?>admin/kartu/get_desa/"+id,
				type: "GET",
				dataType : "JSON",
				success: function(data)
				{
					$("#id_desa").html(data.desa);
				},
				error: function(jqXHR, textdesa, errorThrown)
				{
					var html = '<option value=""></option>';
                    
                    $("#id_desa").html(html);
				}
			});
  		}

		function get_rt(id){
			$.ajax(
			{
				url : "<?= base_url()?>admin/kartu/get_rt/"+id,
				type: "GET",
				dataType : "JSON",
				success: function(data)
				{
					$("#id_rt").html(data.rt);
				},
				error: function(jqXHR, textrt, errorThrown)
				{
					var html = '<option value=""></option>';
                    
                    $("#id_rt").html(html);
				}
			});
  		}
	</script>

	<script>
		$(document).on("click",".btnadd",function(){
			$("#modaladd").modal("show");
			$("#id_rt").val("");
			$("#nama_rt").val("");
			$("#nomor_urutan").val("");
			$("#id_desa").focus();
    	});
	</script>

	<script>
		$(document).on("click",".btnedit",function(){
			var id =$(this).attr("id");
			$.ajax(
			{
				url : "<?= base_url()?>admin/rt/edit/"+id,
				type: "GET",
				dataType : "JSON",
				success: function(data)
				{
					$("#modaledit").modal("show");
					$("#d_rt").html(data.edit);
				},
				error: function(jqXHR, textrt, errorThrown)
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
						window.location = "<?= base_url() ?>admin/rt/delete/"+id;
					
				} else {
					swal("Cancelled", "Batal :)", "error");
				}
			});
		});
	</script>
</body>
</html>