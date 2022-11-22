<div id="editModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Teahcer's Courses</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form class="mt-0" method="POST" id="editForm">
                @csrf
                <input type="hidden" id="up_id">
            <div class="modal-body">
                    <div class="form-group">
                        <label for="up_teacher">Teacher</label>
                        <select id="t_id" class="form-control">
                            @foreach ($teachers as $th)
                                <option value="{{ $th->id }}">{{ $th->first_name }}&nbsp;{{ $th->last_name }}</option>
                            @endforeach
                        </select>
                   </div>
                   <div class="form-group mt-2">
                        <label for="description">Course</label>
                        <select id="c_id" class="form-control">
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                   </div>
            </div>
            <div class="modal-footer md-button">
                <button class="btn" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                <button type="submit" class="btn btn-primary update_ThCo">Update </button>
            </div>
            </form>
        </div>
    </div>
</div>