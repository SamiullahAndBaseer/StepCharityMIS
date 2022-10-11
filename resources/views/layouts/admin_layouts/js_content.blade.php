<!-- <script src="{{ asset('assets/src/assets/js/jquery-3.6.1.js') }}"></script> -->
<script>
    // ===============
    //    Javascript
    // ===============
    
    window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('simple-example');
    var invalid = $('.simple-example .invalid-feedback');
    
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
            invalid.css('display', 'block');
        } else {
    
            invalid.css('display', 'none');
    
            form.classList.add('was-validated');
        }
      }, false);
    });
    
    }, false);
    </script>
    <script src="{{ asset('assets/src/plugins/src/filepond/filepond.min.js')}}"></script>
    <script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginFileValidateType.min.js')}}"></script>
    <script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js')}}"></script>
    <script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImagePreview.min.js')}}"></script>
    <script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImageCrop.min.js')}}"></script>
    <script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImageResize.min.js')}}"></script>
    <script src="{{ asset('assets/src/plugins/src/filepond/FilePondPluginImageTransform.min.js')}}"></script>
    <script src="{{ asset('assets/src/plugins/src/filepond/filepondPluginFileValidateSize.min.js')}}"></script>
    <script src="{{ asset('assets/src/plugins/src/notification/snackbar/snackbar.min.js')}}"></script>
    <script src="{{ asset('assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js')}}"></script>
    {{-- <script src="{{ asset('assets/src/assets/js/users/account-settings.js')}}"></script> --}}