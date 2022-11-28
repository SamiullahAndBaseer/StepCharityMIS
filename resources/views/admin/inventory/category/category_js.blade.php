<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
</script>
<script>
    $(document).ready(function(){
        // add new Category
        $('#addCategoryForm').on('submit', function(e){
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
                        $('#addCategoryModal').modal('hide');
                        $(form)[0].reset();
                        $('#tableHover').load(location.href+" #tableHover");
                        Swal.fire(
                            'Added!',
                            data.msg,
                            'success'
                        );
                    }
                }
            });
        });

        // show Category value in update form
        $(document).on('click', '#updateCategory', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');

            $('#up_id').val(id);
            $('#up_name').val(name);
        });

        // update category
        $('#editCategoryForm').on('submit', function(e){
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
                        $('#editCategoryModal').modal('hide');
                        $(form)[0].reset();
                        $('#tableHover').load(location.href+" #tableHover");
                        Swal.fire(
                            'Updated!',
                            data.msg,
                            'success'
                        );
                    }
                }
            });
        });

        // reset validation errors
        $(document).on('click', '#updateCategory', function(){
            $('#editCategoryForm').find('span.text-danger').text('');
        });

        $(document).on('click', '#addCategory', function(){
            $('#addCategoryForm').find('span.text-danger').text('');
        });

        // delete category data
        $(document).on('mouseenter', '.delete_Category', function(e){
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
                    // if confirmed category will be delete.
                    $.ajax({
                        url: "/category/"+up_id,
                        method: 'delete',
                        success: function(res){
                            if(res.status == 'success'){
                                Swal.fire(
                                    'Deleted!',
                                    'Category has been deleted.',
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