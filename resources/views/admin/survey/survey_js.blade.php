<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
</script>
<script>
    $(document).on('click', '.whatsappMsg', function(){
        var number = $(this).data('number');
        $('#msgTo').val(number);
        $('#message').val('');
        $('#attachment').val('');
    });

    $(function(){
        $('#form').on('submit', function(e){
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
                    $(form).find('span.validation-text').text('');
                },
                success:function(data){
                    if(data.code == 0){
                        $.each(data.error, function(prefix, val){
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                    }else{
                        $(form)[0].reset();
                        alert(data.msg);
                    }
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function(){
        // For approved
        $(document).on('click', '.approved', function(e){
            e.preventDefault();
            var survey_id = $(this).data('id');
            var selector = "#yes_appr-"+survey_id;

            $.ajax({
                url: "{{ route('status.survey') }}",
                method: 'put',
                data: {id: survey_id, status: 'approved'},
                success: function(res){
                    if(res.status == 'success'){
                        document.location.reload();
                    }
                }
            });
        });

        // For rejected
        $(document).on('click', '.rejected' , function(e){
            var survey_id = $(this).data('id');
            var selector = "#yes_reject-"+survey_id;

            $.ajax({
                url: "{{ route('status.survey') }}",
                method: 'put',
                data: {id: survey_id, status: 'rejected'},
                success: function(res){
                    if(res.status == 'success'){
                        document.location.reload();
                    }
                }
            });
        });

        // For delete the survey
        $(document).on('mouseenter', '.delete_survey', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var selector = '.confirm-'+id;

            document.querySelector(selector).addEventListener('click', function(){
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'survey delete?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // if confirmed course will be delete.
                        $.post({
                            url: "/delete/survey/"+id,
                            success: function(res){
                                document.location.reload();
                            }
                        });
                    } // end confirmed
                });
            });
        });
        // end delete
    });
</script>
<script>
    var surveyList = $('#survey-table').DataTable({
        "dom": "<'inv-list-top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'l<'dt-action-buttons align-self-center'B>><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f<'toolbar align-self-center'>>>>" +
            "<'table-responsive'tr>" +
            "<'inv-list-bottom-section d-sm-flex justify-content-sm-between text-center'<'inv-list-pages-count  mb-sm-0 mb-3'i><'inv-list-pagination'p>>",

        headerCallback:function(e, a, t, n, s) {
            e.getElementsByTagName("th")[0].innerHTML=`
            <div class="form-check form-check-primary d-block new-control">
                <input class="form-check-input chk-parent" type="checkbox" id="form-check-default">
            </div>`
        },
        columnDefs:[{
            targets:0,
            width:"30px",
            className:"",
            orderable:!1,
            render:function(e, a, t, n) {
                return `
                <div class="form-check form-check-primary d-block new-control">
                    <input class="form-check-input child-chk" type="checkbox" id="form-check-default">
                </div>`
            },
        }],
        buttons: [
            {
                text: 'Add New',
                className: 'btn btn-primary',
                action: function(e, dt, node, config ) {
                    window.location = '{{ route('survey.create') }}';
                }
            }
        ],
        "order": [[ 1, "asc" ]],
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 10
    });

    $("div.toolbar").html('<button class="dt-button dt-delete btn btn-danger" tabindex="0" aria-controls="invoice-list"><span>Delete</span></button>');

    multiCheck(surveyList);
</script>