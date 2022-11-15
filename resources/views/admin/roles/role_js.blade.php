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
        $(document).on('click', '.add_role', function(e){
            e.preventDefault();
            var name = $('#name').val();
            var description = $('#description').val();

            $('.errMsgName').text("");
            $('.errMsgDescription').text("");

            $.ajax({
                url: "{{ route('role.store') }}",
                method: 'post',
                data: {role_name: name, role_description: description},
                success: function(res){
                    if(res.status == 'success'){
                        $('#addRoleModal').modal('hide');
                        $('#addRoleForm')[0].reset();
                        $('#tableHover').load(location.href+' #tableHover');
                    }
                },
                error: function(response){
                    if(response.responseJSON.errors.role_name == undefined){
                        $('.errMsgName').text("");
                    }
                    if(response.responseJSON.errors.role_description == undefined){
                        $('.errMsgDescription').text("");
                    }
                    $('.errMsgName').text(response.responseJSON.errors.role_name);
                    $('.errMsgDescription').text(response.responseJSON.errors.role_description);
                }
            });
        });

        // reset validation errors
        $(document).on('click', '#addRole', function(){
            $('.errMsgName').text("");
            $('.errMsgDescription').text("");
        });

        $(document).on('click', '#updateRole', function(){
            $('.errName').text("");
            $('.errDescription').text("");
        });

        // show role value in update form
        $(document).on('click', '#updateRole', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            var description = $(this).data('description');

            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_description').val(description);
        });

        // update role data
        $(document).on('click', '.update_role', function(e){
            e.preventDefault();
            let up_id = $('#up_id').val();
            let up_name = $('#up_name').val();
            let up_description = $('#up_description').val();

            $('.errName').text("");
            $('.errDescription').text("");

            $.ajax({
                url: "{{ route('update.role') }}",
                method: 'post',
                data: {role_id: up_id, role_name: up_name, role_description: up_description},
                success: function(res){
                    if(res.status == 'success'){
                        $('#editRoleModal').modal('hide');
                        $('#editRoleForm')[0].reset();
                        $('#tableHover').load(location.href+" #tableHover");
                    }
                },
                error: function(response){
                    if(response.responseJSON.errors.role_name == undefined){
                        $('.errName').text("");
                    }
                    if(response.responseJSON.errors.role_description == undefined){
                        $('.errDescription').text("");
                    }
                    $('.errName').text(response.responseJSON.errors.role_name);
                    $('.errDescription').text(response.responseJSON.errors.role_description);
                }
            });
        });

        // delete the role
        $(document).on('mouseenter', '.delete_role', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            var selector = '.confirm-role-'+id;

            document.querySelector(selector).addEventListener('click', function(){
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
                            url: "{{ route('delete.role') }}",
                            method: 'post',
                            data: {id: id},
                            success: function(res){
                                if(res.status == 'success'){
                                    Swal.fire(
                                        'Deleted!',
                                        'Role has been deleted.',
                                        'success'
                                    );
                                    $('#tableHover').load(location.href+" #tableHover");
                                }
                            }
                        });// end ajax
                    } // end confirmed
                });
            });
        })
    });
</script>