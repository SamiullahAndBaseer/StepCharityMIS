<div id="addMaktobTypeModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Maktob Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form class="mt-0" method="POST" id="addMaktobTypeForm">
                @csrf
            <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Maktob Type Name</label>
                        <input type="text" class="form-control mb-2" id="name" placeholder="Maktob type name">
                        <div class="errMsgName text-danger"></div>
                   </div>
                   <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control mb-2" id="description" placeholder="Maktob type description">
                        <div class="errMsgDescription text-danger"></div>
                   </div>
            </div>
            <div class="modal-footer md-button">
                <button class="btn" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                <button type="submit" class="btn btn-primary add_maktobType">Add Maktob Type</button>
            </div>
            </form>
        </div>
    </div>
</div>