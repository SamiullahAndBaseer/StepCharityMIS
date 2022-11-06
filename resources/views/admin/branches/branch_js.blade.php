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
        $(document).on('click', '.add_branch', function(e){
            e.preventDefault();
            var name = $('#name').val();
            var description = $('#description').val();

            $('.errMsgName').text("");
            $('.errMsgDescription').text("");

            $.ajax({
                url: "{{ route('branch.store') }}",
                method: 'post',
                data: {branch_name: name, branch_description: description},
                success: function(res){
                    if(res.status == 'success'){
                        $('#addBranchModal').modal('hide');
                        $('#addBranchForm')[0].reset();
                        $('#tableHover').load(location.href+' #tableHover');
                    }
                },
                error: function(response){
                    if(response.responseJSON.errors.branch_name == undefined){
                        $('.errMsgName').text("");
                    }
                    if(response.responseJSON.errors.branch_description == undefined){
                        $('.errMsgDescription').text("");
                    }
                    $('.errMsgName').text(response.responseJSON.errors.branch_name);
                    $('.errMsgDescription').text(response.responseJSON.errors.branch_description);
                }
            });
        });

        // reset validation errors
        $(document).on('click', '#addBranch', function(){
            $('.errMsgName').text("");
            $('.errMsgDescription').text("");
        });

        $(document).on('click', '#updateBranch', function(){
            $('.errName').text("");
            $('.errDescription').text("");
        });

        // show course value in update form
        $(document).on('click', '#updateBranch', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            var description = $(this).data('description');

            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_description').val(description);
        });

        // update role data
        $(document).on('click', '.update_branch', function(e){
            e.preventDefault();
            let up_id = $('#up_id').val();
            let up_name = $('#up_name').val();
            let up_description = $('#up_description').val();

            $('.errName').text("");
            $('.errDescription').text("");

            $.ajax({
                url: "{{ route('update.branch') }}",
                method: 'post',
                data: {branch_id: up_id, branch_name: up_name, branch_description: up_description},
                success: function(res){
                    if(res.status == 'success'){
                        $('#editBranchModal').modal('hide');
                        $('#editBranchForm')[0].reset();
                        $('#tableHover').load(location.href+" #tableHover");
                    }
                },
                error: function(response){
                    if(response.responseJSON.errors.branch_name == undefined){
                        $('.errName').text("");
                    }
                    if(response.responseJSON.errors.branch_description == undefined){
                        $('.errDescription').text("");
                    }
                    $('.errName').text(response.responseJSON.errors.branch_name);
                    $('.errDescription').text(response.responseJSON.errors.branch_description);
                }
            });
        });

        // delete the role
        $(document).on('mouseenter', '.delete_branch', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            var selector = '.confirm-branch-'+id;

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
                            url: "{{ route('delete.branch') }}",
                            method: 'post',
                            data: {id: id},
                            success: function(res){
                                if(res.status == 'success'){
                                    Swal.fire(
                                        'Deleted!',
                                        'Branch has been deleted.',
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