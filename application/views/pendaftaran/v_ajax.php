
   <script src="<?= base_url() ?>public/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>public/gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>public/gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>public/gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>public/gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?= base_url() ?>public/gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>public/gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>public/gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?= base_url() ?>public/gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url() ?>public/gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>public/gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?= base_url() ?>public/gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?= base_url() ?>public/gentelella/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?= base_url() ?>public/gentelella/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>public/gentelella/vendors/pdfmake/build/vfs_fonts.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">

      function get_dokter(id){
         var value = {
            id: id
         };
         $.ajax({
            url: "<?= base_url() ?>pendaftaran/getdokter/"+id,
            type: "POST",
            data : value,
            success: function (data){
               $("#get_dokter").html(data);
               $("#no_pendaftaran").val('');
            }
         });
      }

      function get_pendaftaran(id){
         var value = {
            id: id
         };
         $.ajax({
            url: "<?= base_url() ?>pendaftaran/getpendaftaran/"+id,
            type: "POST",
            data : value,
            success: function (data){
               $("#get_pendaftaran").html(data);
            }
         });
      }

      $(document).on("click",".btncaripasien",function(){
         $("#modal_pasien").modal('show');
      });

      $(document).on("click",".btnsetpasien",function(){
         var id =$(this).attr("data-id");
         var value = {
            id: id
         };
         $.ajax({
            url: "<?= base_url() ?>pendaftaran/setpasien/",
            type: "POST",
            data : value,
            success: function (data){
               $("#set_pasien").html(data);
               $("#modal_pasien").modal('hide');
            }
         });
      });

      $(document).on("click",".btnhapus",function(){
         var id =$(this).attr("data-id");
         swal({
            title: "Peringatan!",
            text: "Apakah anda ingin menghapus data ini?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
         })
            .then((willDelete) => {
            if (willDelete) {
               window.location = "<?= base_url() ?>pendaftaran/delete/"+id;
            } else {
               swal("Cancelled", "Batal :)", "error");
            }
         });
      });

   </script>