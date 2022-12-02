<div id="addCoureSettingModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Course Attendance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form class="mt-0" method="POST" action="{{ route('st-attend-setting.store') }}" id="addCourseSetting">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="start_attendance">Start Attendance <span class="text-danger">*</span></label>
                        <input type="time" class="form-control mb-3" name="start_attendance"/>
                        <span class="text-danger start_attendance_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="end_attendance">End Attendance <span class="text-danger">*</span></label>
                        <input type="time" class="form-control mb-3" name="end_attendance"/>
                        <span class="text-danger end_attendance_error"></span>
                    </div>

                    <div class="form-group">
                        <label for="course_id">Course</label>
                        <select class="form-select" name="course_id" id="course_id">
                            <option value="">Choose course</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger course_id_error"></span>
                    </div>
                </div>
                <div class="modal-footer md-button">
                    <button class="btn" data-bs-dismiss="modal"> <i class="flaticon-delete-1"></i> Discard</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>