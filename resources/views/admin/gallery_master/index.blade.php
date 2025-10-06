@extends('layouts.app')

@section('title', 'Gallery Master')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            {{-- Alert Messages --}}
            @include('common.alert')
            <div class="row">
                <!-- Left Side: Form -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Gallery Image</div>
                        <div class="card-body">
                            <form action="{{ route('admin.gallery_master.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Album <span style="color:red;">*</span></label>
                                    <select name="album_id" class="form-control">
                                        <option value="">Select Album</option>
                                        @foreach($albums as $album)
                                            <option value="{{ $album->album_id }}">{{ $album->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('album_id'))
                                        <span class="text-danger">
                                            {{ $errors->first('album_id') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Image <span style="color:red;">*</span></label>
                                    <input type="file" name="image" class="form-control">
                                    @if($errors->has('image'))
                                        <span class="text-danger">
                                            {{ $errors->first('image') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="iStatus" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>


                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Listing -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <span>Gallery Listing</span>
                            <button id="bulkDelete" class="btn btn-danger btn-sm">Delete Selected</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="checkAll"></th>
                                            <th>Album</th>
                                            <th>Image</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($gallery as $item)
                                            <tr>
                                                <td><input type="checkbox" class="recordCheckbox" value="{{ $item->gallery_id }}"></td>
                                                <td>{{ $item->album_name }}</td>
                                                <td><img src="{{ asset('public_html/khatum shyam/gallery_master/'.$item->image) }}" width="70"></td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    @if($item->iStatus == 1)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary editGallery" data-id="{{ $item->gallery_id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger deleteGallery" data-id="{{ $item->gallery_id }}">
                                                        <i class="fas fa-trash-alt "></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center mt-3">
                                    {{ $gallery->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Edit will be added here -->
@include('admin.gallery_master.edit-modal')
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
    // Open modal and load gallery data
    $('.editGallery').on('click', function () {
        let galleryId = $(this).data('id');


        $.get('/admin/gallery_master/edit/' + galleryId, function (data) {
            $('#edit_gallery_id').val(data.gallery_id);
            $('#edit_album_id').val(data.album_id);
            $('#current_image').attr('src', '/public_html/khatum shyam/gallery_master/' + data.image);

            if (data.iStatus == 1) {
                $('#edit_status_active').prop('checked', true);
            } else {
                $('#edit_status_inactive').prop('checked', true);
            }

        $('#editGalleryForm').attr('action', '/admin/gallery_master/update/' + galleryId);
            $('#editModal').modal('show');
        });
    });
});

</script>
@endsection