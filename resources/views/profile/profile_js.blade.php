<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
</script>
<script>
    $(document).ready(function(){
        // Profile information
        $('#updateProfileForm').on('submit', function(e){
            e.preventDefault();
            
            var form = this;
            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:new FormData(form),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(form).find('span.text-danger').text('');
                },
                success:function(data){
                    if(data.code == 0){
                        $.each(data.error, function(prefix, val){
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                    }else{
                        $(form)[0].reset();
                        document.location.reload();
                        Swal.fire(
                            'Updated',
                            data.msg,
                            'success'
                        );
                    }
                }
            });
        });

        // update password
        $('#updatePasswordForm').on('submit', function(e){
            e.preventDefault();
            
            var form = this;
            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:new FormData(form),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(form).find('span.text-danger').text('');
                },
                success:function(data){
                    if(data.code == 0){
                        $.each(data.error, function(prefix, val){
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                    }else{
                        $(form)[0].reset();
                        Swal.fire(
                            'Updated',
                            data.msg,
                            'success'
                        );
                    }
                }
            });
        });

        // Add education 
        $('#addEducationForm').on('submit', function(e){
            e.preventDefault();
            
            var form = this;
            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:new FormData(form),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(form).find('span.text-danger').text('');
                },
                success:function(data){
                    if(data.code == 0){
                        $.each(data.error, function(prefix, val){
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                    }else{
                        $(form)[0].reset();
                        $('.education_section').load(location.href+" .education_section");
                        Swal.fire(
                            'Added',
                            data.msg,
                            'success'
                        );
                    }
                }
            });
        });

        // logout from other browser 
        $('#logoutOtherBrowserForm').on('submit', function(e){
            e.preventDefault();
            
            var form = this;
            
            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:new FormData(form),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(form).find('span.text-danger').text('');
                },
                success:function(data){
                    if(data.code == 0){
                        $.each(data.error, function(prefix, val){
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                    }else{
                        $(form)[0].reset();
                        $('.education_section').load(location.href+" .education_section");
                        Swal.fire(
                            'Added',
                            data.msg,
                            'success'
                        );
                    }
                }
            });
        });

         // delete data
         $(document).on('mouseenter', '.delete_edu', function(e){
            e.preventDefault();
            let up_id = $(this).data('id');
            var selector = '.confirm-'+up_id;

            document.querySelector(selector).addEventListener('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: name+' delete?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/education/"+up_id,
                            method: 'delete',
                            success: function(res){
                                if(res.status == 'success'){
                                    Swal.fire(
                                        'Deleted!',
                                        'Education has been deleted.',
                                        'success'
                                    );
                                    $('.education_section').load(location.href+" .education_section");
                                }
                            }
                        });// end ajax
                    } // end confirmed
                });
            });
        });
    });
</script>