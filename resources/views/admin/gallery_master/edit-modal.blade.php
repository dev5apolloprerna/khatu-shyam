<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="editGalleryForm" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- no @method('PUT') because our route is POST -->
                <input type="hidden" name="gallery_id" id="edit_gallery_id">

                 <!-- Not PUT since our route is post -->

                <div class="modal-header">
                  <h5 class="modal-title">Edit Gallery</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Album <span style="color:red;">*</span></label>
                        <select name="album_id" id="edit_album_id" class="form-control">
                            @foreach($albums as $album)
                                <option value="{{ $album->album_id }}">{{ $album->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="edit_album_error"></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Current Image</label><br>
                        <img id="current_image" src="" width="100">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Change Image</label>
                        <input type="file" name="image" id="edit_image" class="form-control">
                        <span class="text-danger" id="edit_image_error"></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status <span style="color:red;">*</span></label><br>
                        <select name="iStatus" id="edit_status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>