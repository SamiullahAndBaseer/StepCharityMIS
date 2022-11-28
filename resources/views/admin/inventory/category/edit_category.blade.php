<div id="editCategoryModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form class="mt-0" method="POST" action="{{ route('update.category') }}" id="editCategoryForm">
                @csrf
                <input type="hidden" name="id" id="up_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control mb-2" name="name" id="up_name" placeholder="Category name">
                        <span class="text-danger name_error"></span>
                    </div>
                </div>
                <div class="modal-footer md-button">
                    <button class="btn" data-bs-dismiss="modal"> <i class="flaticon-delete-1"></i> Discard</button>
                    <button type="submit" class="btn btn-primary update_Category">Update Category</button>
                </div>
            </form>
        </div>
    </div>
</div>