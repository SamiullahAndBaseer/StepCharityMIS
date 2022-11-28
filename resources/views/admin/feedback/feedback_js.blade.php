<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
</script>
<script>
    $(document).ready(function(){
        // delete course data
        $(document).on('mouseenter', '.delete_Feedback', function(e){
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
                        url: "/feedback/"+up_id,
                        method: 'delete',
                        success: function(res){
                            if(res.status == 'success'){
                                Swal.fire(
                                    'Deleted!',
                                    'Feedback has been deleted.',
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