
<!DOCTYPE html>


<head>



<link href="https://www.tiny.cloud/css/codepen.min.css">
<div class="dummy-header">
    TinyMCE Fabric Skin
</div>
<div class="my-custom-editor-container">
    <textarea id="premiumskinsandicons-fabric"></textarea>
</div>

      <script type="text/javascript" src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/5/tinymce.min.js"></script>

<script type="text/javascript">
  


tinymce.init({
  selector: 'textarea#premiumskinsandicons-fabric',
  skin: 'fabric',
  content_css: [
    'fabric',
    '//www.tiny.cloud/css/codepen.min.css'
  ],
  toolbar_mode: 'floating',
  plugins: 'advlist anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars wordcount',
  toolbar: 'undo redo | formatselect | bold italic strikethrough forecolor backcolor blockquote | link image media | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent | removeformat',
  height: 400
});


</script>