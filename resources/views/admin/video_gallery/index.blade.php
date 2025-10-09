@extends('layouts.app')

@section('title', 'Video Gallery')

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
                        <div class="card-header">Add Video</div>
                        <div class="card-body">
                            <form action="{{ route('admin.video_gallery.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Name <span style="color:red;">*</span></label>
                                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Video Link <span style="color:red;">*</span></label>
                                    <input type="text" name="video_link" class="form-control" value="{{ old('video_link') }}">
                                    @if ($errors->has('video_link'))
                                        <span class="text-danger">{{ $errors->first('video_link') }}</span>
                                    @endif
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
                            <span>Video Listing</span>
                            <button id="bulkDelete" class="btn btn-danger btn-sm">Delete Selected</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="checkAll"></th>
                                            <th>Name</th>
                                            <th>Video Link</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($videos as $video)
                                            <tr>
                                                <td><input type="checkbox" class="recordCheckbox" value="{{ $video->video_Id }}"></td>
                                                <td>{{ $video->name }}</td>
                                                <td>{{ $video->video_link }}</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary editVideo"
                                                        data-id="{{ $video->video_Id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger deleteVideo"
                                                        data-id="{{ $video->video_Id }}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center mt-3">
                                    {{ $videos->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.video_gallery.edit-modal')
@endsection

@section('scripts')
<script>
$(document).ready(function() {

    // Open edit modal and load data
    $('.editVideo').on('click', function() {
        let id = $(this).data('id');
        $.get("{{ url('admin/video_gallery/edit') }}/" + id, function(data) {
            $('#edit_video_Id').val(data.video_Id);
            $('#edit_video_link').val(data.video_link);
            $('#edit_name').val(data.name);
            $('#editVideoForm').attr('action', "{{ url('admin/video_gallery/update') }}/" + id);
            $('#editModal').modal('show');
        });
    });

    // Select/Deselect All
    $('#checkAll').on('click', function() {
        $('.recordCheckbox').prop('checked', this.checked);
    });

    // Bulk delete
    $('#bulkDelete').on('click', function() {
        let ids = $(".recordCheckbox:checked").map(function() {
            return $(this).val();
        }).get();

        if (ids.length === 0) {
            alert('Please select at least one record to delete.');
            return;
        }

        if (confirm('Are you sure you want to delete selected records?')) {
            $.ajax({
                url: "{{ route('admin.video_gallery.bulk-delete') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    ids: ids
                },
                success: function(response) {
                    location.reload();
                }
            });
        }
    });

    // Single delete
    $('.deleteVideo').on('click', function() {
        let id = $(this).data('id');
        if (confirm('Are you sure you want to delete this record?')) {
            $.ajax({
                url: "{{ route('admin.video_gallery.delete') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success: function(response) {
                    location.reload();
                }
            });
        }
    });

});
</script>
@endsection
