<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
</script>
<script>
    $(document).ready(function(){
        // add new leave_type
        $(document).on('click', '.add_FeedbackType', function(e){
            e.preventDefault();
            let name = $('#name').val();
            let description = $('#description').val();

            $('.errMsgName').text("");
            $('.errMsgDescription').text("");
            
            $.ajax({
                url: "{{ route('feedback-type.store') }}",
                method: 'post',
                data: {name: name, description: description},
                success: function(res){
                    if(res.status == 'success'){
                        $('#addFeedbackTypeModal').modal('hide');
                        $('#addFeedbackTypeForm')[0].reset();
                        $('#tableHover').load(location.href+" #tableHover");
                        Swal.fire(
                            'Added!',
                            'Feedback type has been added.',
                            'success'
                        );
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

        // show LeaveType value in update form
        $(document).on('click', '#updateFeedbackType', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            var description = $(this).data('description');

            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_description').val(description);
        });

        // update course data
        $(document).on('click', '.update_FeedbackType', function(e){
            e.preventDefault();
            let up_id = $('#up_id').val();
            let up_name = $('#up_name').val();
            let up_description = $('#up_description').val();

            $('.errName').text("");
            $('.errDescription').text("");

            $.ajax({
                url: "/feedback-type/"+up_id,
                method: 'put',
                data: {id: up_id, name: up_name, description: up_description},
                success: function(res){
                    if(res.status == 'success'){
                        $('#editFeedbackTypeModal').modal('hide');
                        $('#editFeedbackTypeForm')[0].reset();
                        $('#tableHover').load(location.href+" #tableHover");
                        Swal.fire(
                            'Updated!',
                            'Feedback type has been updated.',
                            'success'
                        );
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
        $(document).on('click', '#updateFeedbackType', function(){
            $('.errName').text("");
            $('.errDescription').text("");
        });

        $(document).on('click', '#addFeedbackType', function(){
            $('.errMsgName').text("");
            $('.errMsgDescription').text("");
        });

        // delete course data
        $(document).on('mouseenter', '.delete_FeedbackType', function(e){
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
                        url: "/feedback-type/"+up_id,
                        method: 'delete',
                        success: function(res){
                            if(res.status == 'success'){
                                Swal.fire(
                                    'Deleted!',
                                    'Feedback type has been deleted.',
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