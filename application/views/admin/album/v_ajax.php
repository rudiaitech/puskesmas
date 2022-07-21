<!-- Data table plugin-->
	<script type="text/javascript" src="<?= base_url()?>public/vali/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>public/vali/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
	<script type="text/javascript" src="<?=base_url()?>public/vali/plugins/tinymce/tinymce.min.js"></script>
   <script type="text/javascript">


      $(document).on("click",".btnhapus",function(){
         var id =$(this).attr("id");
         var value = {
            		id: id
            };
         
			swal({
      		title: "Peringatan",
      		text: "Apakah Anda Ingin Menghapus Data Ini?",
      		type: "warning",
      		showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Delete",   
            closeOnConfirm: true
            }, function(isConfirm) {
				if (isConfirm) {

               $.ajax(
               {
                  url : "<?=base_url()?>admin/album/delete",
                  type: "POST",
                  data : value,
                  success: function(data, textStatus, jqXHR)
                     {
                     var data = jQuery.parseJSON(data);
                        if(data.result ==1){

                           window.location= '<?=base_url()?>admin/album/';
                           alerthapus();

                        }else{
                           alertgagal()
                        }
                  }
               });
					
				} else {
					swal("Cancelled", "Batal :)", "error");
				}
			});
		});

      $(document).on("click",".btnstatus",function(){
         var id =$(this).attr("id");
         var statusnext =$(this).attr("data-statusnext");
         var value = {
            		id: id,
                  statusnext: statusnext
            };
         
			swal({
      		title: "Peringatan",
      		text: "Apakah Anda Ingin Merubah Status Menjadi "+statusnext +" ?",
      		type: "warning",
      		showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes",   
            closeOnConfirm: true
            }, function(isConfirm) {
				if (isConfirm) {

               $.ajax(
               {
                  url : "<?=base_url()?>admin/album/update_status",
                  type: "POST",
                  data : value,
                  success: function(data, textStatus, jqXHR)
                     {
                     var data = jQuery.parseJSON(data);
                        if(data.result ==1){

                           window.location= '<?=base_url()?>admin/album/';
                           alertstatus();

                        }else{
                           alertgagal()
                        }
                  }
               });
					
				} else {
					swal("Cancelled", "Batal :)", "error");
				}
			});
		});

      $(document).on( "click",".btn_del_foto", function() {
			var id  = $(this).attr("id");
			$.ajax(
			{
				type: 'GET',
				url : "<?= base_url() ?>admin/album/delete_idfoto/"+id,
				data: 'id=' + id,
				dataType: 'json',
				success: function(data, textStatus, jqXHR)
				{
					tabel_foto.ajax.reload();
				}
			});
		});

      var tabel_foto = $('#tabel_foto').DataTable({
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
				"url": "<?= base_url()?>admin/album/tabel_foto/"+$("#id_album").val(),
				"type": "GET"
			},
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
		});

      //add foto
		$(document).on("click",".btn_add_foto",function(){
			
			var id =$(this).attr("id_album");

			$("#modal_foto").modal("show");
			$("#id_album").val(id);;
			$("photo_name").val("");
			$("photo_name").focus();
    	});


      //save dermaga
		$(document).on( "click",".btn_save_foto", function() {

         var data = new FormData();
         // ambil atribut file yg akan diupload, lalu masukkan ke variabel input_gambar
         data.append('photo_name', $("#photo_name")[0].files[0]); 

         data.append('id_album', $("#id_album").val()); 
         $.ajax({
         url: '<?= base_url()?>admin/album/insert_foto',
         type: 'POST',
         data: data,
         cache: false,
         processData: false,
         contentType: false,
         success: function(data, textStatus, jqXHR)
            {
               var data = jQuery.parseJSON(data);
                  if(data.result == 1){
                  $("#id_album").val("");
                  $("photo_name").val("");
                  $("#modal_foto").modal("hide");

                  tabel_foto.ajax.reload();
                  var content = {};
                  content.message = 'Foto berhasil ditambahkan';
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

      function alertstatus(){
         var content = {};
         content.message = 'Status Berhasil DIperbarui';
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