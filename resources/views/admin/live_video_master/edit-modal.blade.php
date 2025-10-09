<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="editLiveVideoForm" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Live Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                </div>
                <div class="modal-body">
                    <input type="hidden" name="live_video_id" id="edit_live_video_id">

                    <div class="mb-3">
                        <label class="form-label">Video Link <span style="color:red;">*</span></label>
                        <input type="text" name="video_link" id="edit_video_link" class="form-control">
                        <span class="text-danger" id="edit_link_error"></span>
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
