<!-- Data table plugin-->
	<script type="text/javascript" src="<?= base_url()?>public/vali/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>public/vali/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>public/vali/plugins/tinymce/tinymce.min.js"></script>
   <script type="text/javascript">
	   tinymce.init({
      selector: "#sambutan",
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
   </script>

   <script type="text/javascript">
	   tinymce.init({
      selector: "#visi",
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
   </script>

   <script type="text/javascript">
	   tinymce.init({
      selector: "#misi",
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
   </script>
	
</body>
</html>