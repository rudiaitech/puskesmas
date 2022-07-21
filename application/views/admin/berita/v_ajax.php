<!-- Data table plugin-->
	<script type="text/javascript" src="<?= base_url()?>public/vali/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>public/vali/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
	<script type="text/javascript" src="<?=base_url()?>public/vali/plugins/tinymce/tinymce.min.js"></script>
   <script type="text/javascript" src="<?= base_url() ?>public/vali/js/plugins/dropzone.js"></script>

   <script>
    $("#inputFile").change(function(event) {  
      
      getURL(this);    
    });

    $("#inputFile").on('click',function(event){
      fadeInAdd();
    });

    function getURL(input) {    
      if (input.files && input.files[0]) {   
        var reader = new FileReader();
        var filename = $("#inputFile").val();
        filename = filename.substring(filename.lastIndexOf('\\')+1);
        reader.onload = function(e) {
          debugger;      
          $('#imgView').attr('src', e.target.result);
          $('#imgView').hide();
          $('#imgView').fadeIn(500);      
          $('.custom-file-label').text(filename);             
        }
        reader.readAsDataURL(input.files[0]);    
      }
      $(".alert").removeClass("loadAnimate").hide();
    }

    function fadeInAdd(){
      fadeInAlert();  
    }
    function fadeInAlert(text){
      $(".alert").text(text).addClass("loadAnimate");  
    }
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

   <script type="text/javascript">
	   tinymce.init({
         selector: "#blog_isi",
         theme: 'modern',
         paste_data_images:true,
         relative_urls: false,
         remove_script_host: false,
         toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
         toolbar2: "print preview forecolor backcolor emoticons",
         image_advtab: true,
         plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
         ],
         automatic_uploads: true,
         file_picker_types: 'image',
         file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function() {
               var file = this.files[0];
               var reader = new FileReader();
               reader.readAsDataURL(file);
               reader.onload = function () {
                  var id = 'post-image-' + (new Date()).getTime();
                  var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                  var blobInfo = blobCache.create(id, file, reader.result);
                  blobCache.add(blobInfo);
                  cb(blobInfo.blobUri(), { title: file.name });
               };
            };
            input.click();
         },
         images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST','http://localhost:81/smkmuhkedawung/admin/Kepalasekolah/images_upload_handler');
            xhr.onload = function() {
               if (xhr.status != 200) {
                  failure('HTTP Error: ' + xhr.status);
                  return;
               }
               var res = _H.StrToObject( xhr.responseText );
               if (res.status == 'error') {
                  failure( res.message );
                  return;
               }
               success( res.location );
            };
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
         }
      });
      
      var tabelberita = $('#tabelberita').DataTable({
    
			"scrollCollapse": false,
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": false,
			"destroy": true,
			"responsive": true,
			"autoWidth": false,
			"order": [],
			"ajax": {
				"url": "<?= base_url()?>admin/berita/tabel/"+$("#blog_status").val(),
				"type": "GET"
			},
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
		});

      $(document).on("click",".btn_edit_berita",function(){
			var id =$(this).attr("data-id");
         var value = {
            id: id
         }
			$.ajax({
				type: 'POST',
				url : "<?= base_url() ?>admin/berita/edit/",
				data: value,
				dataType: 'json',
				success: function(data, textStatus, jqXHR)
				{
					tabel_foto.ajax.reload();
				}
			});
		});

      $(document).on("click",".btnhapus",function(){
			var id =$(this).attr("data-id");
         var value = {
            id: id
         }
			swal({
      		title: "Peringatan",
      		text: "Apakah Anda Ingin Menghapus Berita Ini?",
      		type: "warning",
      		showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Delete",   
            closeOnConfirm: true
            }, function(isConfirm) {
               if (isConfirm) {
                  $.ajax({
                     type: 'POST',
                     url : "<?= base_url() ?>admin/berita/deletesoft/",
                     data : value,
                     success: function(data, textStatus, jqXHR)
                     {
                        var data = jQuery.parseJSON(data);
                           if(data.result ==1){

                              tabelberita.ajax.reload();
                              alerthapus();

                           }else{

                              swal("Cancelled", "Batal :)", "error");

                           }
                     }
                  });
                  
               } else {
                  swal("Cancelled", "Batal :)", "error");
               }
         });
		});

      $(document).on("click",".btnpublish",function(){
			var id =$(this).attr("data-id");
         var status = 'Publish';
         var value = {
            id: id,
            status: status
         }
			swal({
      		title: "Peringatan",
      		text: "Apakah Anda Ingin Mempublikasikan Berita Ini?",
      		type: "warning",
      		showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes",   
            closeOnConfirm: true
            }, function(isConfirm) {
               if (isConfirm) {
                  $.ajax({
                     type: 'POST',
                     url : "<?= base_url() ?>admin/berita/update_status/",
                     data : value,
                     success: function(data, textStatus, jqXHR)
                     {
                        var data = jQuery.parseJSON(data);
                           if(data.result ==1){

                              tabelberita.ajax.reload();
                              swal("Sukses", "Berita Anda Berhasil Dipublikasikan", "success");

                           }else if(data.result ==2){

                              tabelberita.ajax.reload();
                              swal("Sukses", "Permintaan Anda Akan Diproses Oleh Admin", "success");

                           }else if(data.result ==3){

                              tabelberita.ajax.reload();
                              swal("Gagal", "Judul Berita Sudah Ada", "error");

                           }else{

                              swal("Eror", "Batal", "error");

                           }
                     }
                  });
                  
               } else {
                  swal("Cancelled", "Batal :)", "error");
               }
         });
		});

      $(document).on("click",".btnreject",function(){
			var id =$(this).attr("data-id");
         var status = 'Reject';
         var value = {
            id: id,
            status: status
         }
			swal({
      		title: "Peringatan",
      		text: "Apakah Anda Ingin Menolak Publikasi Berita Ini?",
      		type: "warning",
      		showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes",   
            closeOnConfirm: true
            }, function(isConfirm) {
               if (isConfirm) {
                  $.ajax({
                     type: 'POST',
                     url : "<?= base_url() ?>admin/berita/update_status/",
                     data : value,
                     success: function(data, textStatus, jqXHR)
                     {
                        var data = jQuery.parseJSON(data);
                           if(data.result ==1){

                              tabelberita.ajax.reload();
                              swal("Sukses", "Berita Berhasil Dipindahkan", "success");

                           }else{

                              swal("Cancelled", "Batal :)", "error");

                           }
                     }
                  });
                  
               } else {
                  swal("Cancelled", "Batal :)", "error");
               }
         });
		});

      $(document).on("click",".btnnonaktif",function(){
			var id =$(this).attr("data-id");
         var status = 'Unpublish';
         var value = {
            id: id,
            status: status
         }
			swal({
      		title: "Peringatan",
      		text: "Apakah Anda Ingin Melakukan Unpublish Berita Ini?",
      		type: "warning",
      		showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes",   
            closeOnConfirm: true
            }, function(isConfirm) {
               if (isConfirm) {
                  $.ajax({
                     type: 'POST',
                     url : "<?= base_url() ?>admin/berita/update_status/",
                     data : value,
                     success: function(data, textStatus, jqXHR)
                     {
                        var data = jQuery.parseJSON(data);
                           if(data.result ==1){

                              tabelberita.ajax.reload();
                              swal("Sukses", "Berita Berhasil Dipindahkan", "success");

                           }else{

                              swal("Cancelled", "Batal :)", "error");

                           }
                     }
                  });
                  
               } else {
                  swal("Cancelled", "Batal :)", "error");
               }
         });
		});

      $(document).on("click",".btnhapussoft",function(){
			var id =$(this).attr("data-id");
         var value = {
            id: id
         }
			swal({
      		title: "Peringatan",
      		text: "Apakah Anda Ingin Menghapus Berita Ini?",
      		type: "warning",
      		showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes",   
            closeOnConfirm: true
            }, function(isConfirm) {
               if (isConfirm) {
                  $.ajax({
                     type: 'POST',
                     url : "<?= base_url() ?>admin/berita/deletesoft/",
                     data : value,
                     success: function(data, textStatus, jqXHR)
                     {
                        var data = jQuery.parseJSON(data);
                           if(data.result ==1){

                              tabelberita.ajax.reload();
                              swal("Sukses", "Berita Berhasil Dihapus", "success");

                           }else{

                              swal("Cancelled", "Batal :)", "error");

                           }
                     }
                  });
                  
               } else {
                  swal("Cancelled", "Batal :)", "error");
               }
         });
		});

      $(document).on("click",".btneditpublis",function(){
			var id =$(this).attr("data-id");
         var value = {
            id: id
         }
			swal({
      		title: "Peringatan",
      		text: "Jika anda ingin merubah, berita ini akan dinonaktifkan sementara. Apakah anda ingin melanutkanya?",
      		type: "warning",
      		showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes",   
            closeOnConfirm: true
            }, function(isConfirm) {
               if (isConfirm) {
                  window.location="editp/"+id;
               } else {
                  swal("Cancelled", "Batal :)", "error");
               }
         });
		});


      function alerthapus(){
         var content = {};
         content.message = 'data berhasil dihapus';
         content.title = 'Sukses,';
         content.icon = 'fa fa-bell';

         $.notify(content,{
            type: 'success',
            placement: {
               from: 'top',
               align: 'right'
            },
            time: 1000,
            delay: 1000,
         });
      }

      function alertgagal(){
         var content = {};
         content.message = 'Eror';
         content.title = 'Eror,';
         content.icon = 'fa fa-bell';

         $.notify(content,{
            type: 'danger',
            placement: {
               from: 'top',
               align: 'right'
            },
            time: 1000,
            delay: 1000,
         });
      }

   </script>

   
</body>
</html>