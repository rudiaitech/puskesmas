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
                  url : "<?=base_url()?>admin/sdm/delete",
                  type: "POST",
                  data : value,
                  success: function(data, textStatus, jqXHR)
                     {
                     var data = jQuery.parseJSON(data);
                        if(data.result ==1){

                           window.location= '<?=base_url()?>admin/sdm/';
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