<div id="editContractTypeModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Contract Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form class="mt-0" method="POST" id="editContractTypeForm">
                @csrf
                <input type="hidden" id="up_id">
            <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Contract Type Name</label>
                        <input type="text" class="form-control mb-2" id="up_name" placeholder="Contract type name">
                        <div class="errName text-danger"></div>
                   </div>
                   <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control mb-2" id="up_description" placeholder="Contract type description">
                        <div class="errDescription text-danger"></div>
                   </div>
            </div>
            <div class="modal-footer md-button">
                <button class="btn" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                <button type="submit" class="btn btn-primary update_contractType">Update Contract Type</button>
            </div>
            </form>
        </div>
    </div>
</div>