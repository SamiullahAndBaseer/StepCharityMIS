<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
</script>
<script>
    $(document).ready(function(){
        // add new role
        $(document).on('click', '.add_teach_course', function(e){
            e.preventDefault();
            var teacher_id = $('#teacher').val();
            var course_id = $('#course').val();

            $('.errMsgTeacher').text("");
            $('.errMsgCourse').text("");

            $.ajax({
                url: "{{ route('teacher-course.store') }}",
                method: 'post',
                data: {teacher_id: teacher_id, course_id: course_id},
                success: function(res){
                    if(res.status == 'success'){
                        $('#addFormThCo')[0].reset();
                        $('#th-co').load(location.href+' #th-co');
                    }
                },
                error: function(response){
                    if(response.responseJSON.errors.teacher_id == undefined){
                        $('.errMsgTeacher').text("");
                    }
                    if(response.responseJSON.errors.course_id == undefined){
                        $('.errMsgCourse').text("");
                    }
                    $('.errMsgTeacher').text(response.responseJSON.errors.teacher_id);
                    $('.errMsgCourse').text(response.responseJSON.errors.course_id);
                }
            });
        });

        // reset validation errors
        $(document).on('click', '#addRole', function(){
            $('.errMsgTeacher').text("");
            $('.errMsgCourse').text("");
        });

        // show course value in update form
        $(document).on('click', '#updateTechCourse', function(e){
            e.preventDefault();
            var up_id = $(this).data('id');
            var teacher_id = $(this).data('t_id');
            var course_id = $(this).data('c_id');

            $('#up_id').val(up_id);
            $('#t_id').val(teacher_id);
            $('#c_id').val(course_id);
        });

        // update role data
        $(document).on('click', '.update_ThCo', function(e){
            e.preventDefault();
            let teacher_id = $('#t_id').val();
            let course_id = $('#c_id').val();
            let up_id = $('#up_id').val();

            $.ajax({
                url: "{{ route('update.teacher-course') }}",
                method: 'post',
                data: {id: up_id, teacher_id: teacher_id, course_id: course_id},
                success: function(res){
                    if(res.status == 'success'){
                        $('#editModal').modal('hide');
                        $('#editForm')[0].reset();
                        $('#th-co').load(location.href+" #th-co");
                    }
                },
                error: function(response){
                    $('.errTeacher').text(response.responseJSON.errors.teacher_id);
                    $('.errCourse').text(response.responseJSON.errors.course_id);
                }
            });
        });

        // delete
        $(document).on('mouseenter', '.delete_tech_course', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var selector = '.confirm-th_co-'+id;

            document.querySelector(selector).addEventListener('click', function(){
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'teacher with course delete?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // if confirmed course will be delete.
                        $.ajax({
                            url: "{{ route('delete.teacher-course') }}",
                            method: 'post',
                            data: {id: id},
                            success: function(res){
                                if(res.status == 'success'){
                                    Swal.fire(
                                        'Deleted!',
                                        'Record has been deleted.',
                                        'success'
                                    );
                                    $('#th-co').load(location.href+" #th-co");
                                }
                            }
                        });// end ajax
                    } // end confirmed
                });
            });
        });
    });
</script>