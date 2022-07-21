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
		$(document).on("click",".btnadd",function(){
			$("#modaladd").modal("show");
			$("#id_profesi").val("");
			$("#nama_profesi").val("");
			$("#nama_profesi").focus();
    	});
	</script>

	<script>
		$(document).on("click",".btnedit",function(){
			var id =$(this).attr("id");
			$.ajax(
			{
				url : "<?= base_url()?>admin/profesi/edit/"+id,
				type: "GET",
				dataType : "JSON",
				success: function(data)
				{
					$('#e_id_profesi').val(data.id_profesi);
					$('#e_nama_profesi').val(data.nama_profesi);
					$("#modaledit").modal('show');
				},
				error: function(jqXHR, textStatus, errorThrown)
				{
				swal("Error!", textStatus, "error");
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
						window.location = "<?= base_url() ?>admin/profesi/delete/"+id;
					
				} else {
					swal("Cancelled", "Your imaginary file is safe :)", "error");
				}
			});
		});
	</script>
</body>
</html>