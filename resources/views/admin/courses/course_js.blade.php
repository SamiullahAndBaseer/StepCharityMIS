<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
</script>
<script>
    $(document).ready(function(){
        // add new course
        $(document).on('click', '.add_course', function(e){
            e.preventDefault();
            let name = $('#name').val();
            let description = $('#description').val();

            $('.errMsgName').text("");
            $('.errMsgDescription').text("");

            $.ajax({
                url: "{{ route('course.store') }}",
                method: 'post',
                data: {name: name, description: description},
                success: function(res){
                    if(res.status == 'success'){
                        $('#addCourseModal').modal('hide');
                        $('#addCourseForm')[0].reset();
                        $('#tableHover').load(location.href+" #tableHover");
                    }
                },
                error: function(response){
                    if(response.responseJSON.errors.name == undefined){
                        $('.errMsgName').text("");
                    }
                    if(response.responseJSON.errors.description == undefined){
                        $('.errMsgDescription').text("");
                    }
                    $('.errMsgName').text(response.responseJSON.errors.name);
                    $('.errMsgDescription').text(response.responseJSON.errors.description);
                }
            });
        });

        // show course value in update form
        $(document).on('click', '#updateCourse', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            var description = $(this).data('description');

            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_description').val(description);
        });

        // update course data
        $(document).on('click', '.update_course', function(e){
            e.preventDefault();
            let up_id = $('#up_id').val();
            let up_name = $('#up_name').val();
            let up_description = $('#up_description').val();

            $('.errName').text("");
            $('.errDescription').text("");

            $.ajax({
                url: "{{ route('update.course') }}",
                method: 'post',
                data: {id: up_id, name: up_name, description: up_description},
                success: function(res){
                    if(res.status == 'success'){
                        $('#editCourseModal').modal('hide');
                        $('#editCourseForm')[0].reset();
                        $('#tableHover').load(location.href+" #tableHover");
                    }
                },
                error: function(response){
                    if(response.responseJSON.errors.name == undefined){
                        $('.errName').text("");
                    }
                    if(response.responseJSON.errors.description == undefined){
                        $('.errDescription').text("");
                    }
                    $('.errName').text(response.responseJSON.errors.name);
                    $('.errDescription').text(response.responseJSON.errors.description);
                }
            });
        });

        // reset validation errors
        $(document).on('click', '#updateCourse', function(){
            $('.errName').text("");
            $('.errDescription').text("");
        });

        $(document).on('click', '#addCourse', function(){
            $('.errMsgName').text("");
            $('.errMsgDescription').text("");
        });

        // delete course data
        $(document).on('mouseenter', '.delete_course', function(e){
            e.preventDefault();
            let up_id = $(this).data('id');
            let name = $(this).data('name');
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
                    // if confirmed course will be delete.
                    $.ajax({
                        url: "{{ route('delete.course') }}",
                        method: 'post',
                        data: {id: up_id},
                        success: function(res){
                            if(res.status == 'success'){
                                Swal.fire(
                                    'Deleted!',
                                    'Course has been deleted.',
                                    'success'
                                );
                                $('#tableHover').load(location.href+" #tableHover");
                            }
                        }
                    });// end ajax
                } // end confirmed
            });
        });
            
        });
    });
</script>