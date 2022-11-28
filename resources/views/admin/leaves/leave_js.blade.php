<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
</script>
<script>
    // search
    function searchFunction(){
        var wordSearch = $('#search').val();
        
        $.ajax({
            url: '{{ route('leave.search') }}',
            method: 'get',
            data: {wordSearch: wordSearch},
            success: function(res){
                if(res.status == 'success'){
                    $('.table').load(location.href+' .table');
                }
            }
        });
    }

    $(document).ready(function(){
        
        $(document).on('click', '.approved', function(e){
            e.preventDefault();
            var leave_id = $(this).data('id');
            var selector = "#yes_appr-"+leave_id;

            $.ajax({
                url: "{{ route('update.leave') }}",
                method: 'post',
                data: {id: leave_id, status: 'approved'},
                success: function(res){
                    if(res.status == 'success'){
                        $('#cancel-row').load(location.href+' #cancel-row');
                    }
                }
            });
        });

        $(document).on('click', '.rejected' , function(e){
            var leave_id = $(this).data('id');
            var selector = "#yes_reject-"+leave_id;

            $.ajax({
                url: "{{ route('update.leave') }}",
                method: 'post',
                data: {id: leave_id, status: 'rejected'},
                success: function(res){
                    if(res.status == 'success'){
                        $('#cancel-row').load(location.href+' #cancel-row');
                    }
                }
            });
        });

        // delete data
        $(document).on('mouseenter', '.delete_leave', function(e){
            e.preventDefault();
            let up_id = $(this).data('id');
            var selector = '.confirm-leave'+up_id;

            document.querySelector(selector).addEventListener('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: 'leave delete?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // if confirmed course will be delete.
                        $.ajax({
                            url: "{{ route('leave.delete') }}",
                            method: 'delete',
                            data: {id: up_id},
                            success: function(res){
                                if(res.status == 'success'){
                                    Swal.fire(
                                        'Deleted!',
                                        'Leave has been deleted.',
                                        'success'
                                    );
                                    $('#cancel-row').load(location.href+" #cancel-row");
                                }
                            }
                        });// end ajax
                    } // end confirmed
                });
            });
        });
    });
</script>