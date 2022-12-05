<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
</script>
<script>
    $(document).ready(function(){
        // add graduated
        $('#addForm').on('submit', function(event){
            event.preventDefault();

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
                    }else if(data.code == 2){
                        $('#addCategoryModal').modal('hide');
                        $(form)[0].reset();
                        Swal.fire(
                            'Error',
                            data.msg,
                            'warning'
                        );
                    }else{
                        $('#addCategoryModal').modal('hide');
                        $(form)[0].reset();
                        $('#graduatedTable').load(location.href+" #graduatedTable");
                        Swal.fire(
                            'Added',
                            data.msg,
                            'success'
                        );
                    }
                }
            });
        });

        $('#addGraduate').on('click', function(){
            $('.course_id_error').text('');
            $('.student_id_error').text('');
        });

        // show course value in update form
        $(document).on('click', '#updateStudentCourse', function(e){
            e.preventDefault();
            var up_id = $(this).data('id');
            var student_id = $(this).data('s_id');
            var course_id = $(this).data('c_id');

            $('#up_id').val(up_id);
            $('#s_id').val(student_id);
            $('#c_id').val(course_id);
        });

        // update graduated
        $('#updateForm').on('submit', function(event){
            event.preventDefault();

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
                        $('#editModal').modal('hide');
                        $(form)[0].reset();
                        $('#graduatedTable').load(location.href+" #graduatedTable");
                        Swal.fire(
                            'Updated',
                            data.msg,
                            'success'
                        );
                    }
                }
            });
        });

        // delete
        $(document).on('mouseenter', '.delete_graduated', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var selector = '.confirm-gr-'+id;

            document.querySelector(selector).addEventListener('click', function(){
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'graduated student delete?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "graduated/"+id,
                            method: 'delete',
                            success: function(res){
                                if(res.status == 'success'){
                                    $('#graduatedTable').load(location.href+" #graduatedTable");
                                    Swal.fire(
                                        'Deleted',
                                        'Graduated Student has been deleted.',
                                        'success'
                                    );
                                }
                            }
                        });// end ajax
                    } // end confirmed
                });
            });
        });
    });
</script>