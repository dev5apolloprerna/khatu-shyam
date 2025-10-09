<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="editTimetableForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Timetable</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_id">

                    <div class="mb-3">
                        <label class="form-label">Current Image</label><br>
                        <img id="current_image" src="" width="100">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Change Image</label>
                        <input type="file" name="image" id="edit_image" class="form-control">
                        <span class="text-danger" id="edit_image_error"></span>
                    </div>

                    {{-- <div class="mb-3">
                        <label class="form-label">Status <span style="color:red;">*</span></label><br>
                        <input type="radio" name="iStatus" value="1" id="edit_status_active"> Active
                        <input type="radio" name="iStatus" value="0" id="edit_status_inactive"> Inactive
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>
