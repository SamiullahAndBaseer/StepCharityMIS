<div id="addCategoryModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Graduate a student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('graduated.store') }}" id="addForm">
                    <div class="form-group">
                        <label for="student">Student</label>
                        <select id="student" name="student_id" class="form-control">
                            <option value="">Choose Student</option>
                            @foreach ($students as $th)
                                <option value="{{ $th->id }}">{{ $th->first_name }}&nbsp;{{ $th->last_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger student_id_error"></span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="course">Courses</label>
                        <select id="course" name="course_id" class="form-control">
                            <option value="">Choose Course</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger course_id_error"></span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="add btn btn-primary mt-3 float-end">Graduate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>