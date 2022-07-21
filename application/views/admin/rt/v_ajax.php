<!-- Data table plugin-->
	<script type="text/javascript" src="<?= base_url()?>public/vali/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>public/vali/js/plugins/dataTables.bootstrap.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url() ?>public/vali/js/croppie.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>public/vali/js/webcam/webcam.min.js"></script>

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

<script>  
$(document).ready(function(){

	$image_crop = $("#camera").croppie({
    enableExif: true,
    viewport: {
      width:250,
      height:250,
      type:"square" //circle
    },
    boundary:{
      width:300,
      height:300
    }    
  });

  $("#insert_image").on("change", function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    //$('#insertimageModal').modal('show');
  });

  $(".crop_image").click(function(event){
    $image_crop.croppie("result", {
      type: "canvas",
      size: "viewport"
    }).then(function(response){
      $.ajax({
        url:"<?= base_url() ?>admin/rt/crop/",
        type:"POST",
        dataType : "JSON",
		data:{"image":response},
        success:function(data){
        //   $("#insertimageModal").modal("hide");
        //   load_images();
        //   alert(data);
				$("#upload-demo-i").html(data.output);
				//$("#d_desa").html(data.edit);
        }
      })
    });
  });

//   load_images();

//   function load_images()
//   {
//     $.ajax({
//       url:"fetch_images.php",
//       success:function(data)
//       {
//         $('#store_image').html(data);
//       }
//     })
//   }

});  
</script>

<script language="Javascript">
        // konfigursi webcam
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpg',
            jpeg_quality: 100
        });
        Webcam.attach( '#webcam' );
 
        function preview() {
            // untuk preview gambar sebelum di upload
            Webcam.freeze();
            // ganti display webcam menjadi none dan simpan menjadi terlihat
            document.getElementById('camera').style.display = 'none';
            document.getElementById('simpan').style.display = '';
        }

        function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
        
        function batal() {
            // batal preview
            Webcam.unfreeze();
            
            // ganti display webcam dan simpan seperti semula
            document.getElementById('webcam').style.display = '';
            document.getElementById('simpan').style.display = 'none';
        }
        
        function simpan() {
            // ambil foto
            Webcam.snap( function(data_uri) {
                
                // upload foto
                Webcam.upload( data_uri, 'upload.php', function(code, text) {} );
 
                // tampilkan hasil gambar yang telah di ambil
                document.getElementById('hasil').innerHTML = 
                    '<p>Hasil : </p>' + 
                    '<img src="'+data_uri+'"/>';
                
                Webcam.unfreeze();
            
                document.getElementById('webcam').style.display = '';
                document.getElementById('simpan').style.display = 'none';
            } );
        }
    </script>
</body>
</html>