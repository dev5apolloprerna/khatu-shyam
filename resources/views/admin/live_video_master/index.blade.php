@extends('layouts.app')

@section('title', 'Live Video Master')

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
                        <div class="card-header">Add Live Video</div>
                        <div class="card-body">
                            <form action="{{ route('admin.live_video_master.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Video Link <span style="color:red;">*</span></label>
                                    <input type="text" name="video_link" class="form-control" value="{{ old('video_link') }}">
                                    @if($errors->has('video_link'))
                                        <span class="text-danger">
                                            {{ $errors->first('video_link') }}
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
                            <span>Live Video Listing</span>
                            <button id="bulkDelete" class="btn btn-danger btn-sm">Delete Selected</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="checkAll"></th>
                                            <th>Video Link</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($videos as $video)
                                            <tr>
                                                <td><input type="checkbox" class="recordCheckbox" value="{{ $video->live_video_id }}"></td>
                                                <td>{{ $video->video_link }}</td>
                                                <td>{{ $video->created_at }}</td>
                                                <td>
                                                    @if($video->iStatus == 1)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary editVideo" data-id="{{ $video->live_video_id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger deleteVideo" data-id="{{ $video->live_video_id }}">
                                                        <i class="fas fa-trash-alt "></i>
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

<!-- Modal for Edit will be added here -->
@include('admin.live_video_master.edit-modal')
@endsection

@section('scripts')
<script>
    
    $(document).ready(function () {
    // Handle edit button click
    $('.editVideo').on('click', function () {
        let id = $(this).data('id');

        $.get('/admin/live_video_master/edit/' + id, function (data) {
            $('#edit_live_video_id').val(data.live_video_id);
            $('#edit_video_link').val(data.video_link);

            if (data.iStatus == 1) {
                $('#edit_status_active').prop('checked', true);
            } else {
                $('#edit_status_inactive').prop('checked', true);
            }

            $('#editLiveVideoForm').attr('action', '/admin/live_video_master/update/' + id);
            $('#editModal').modal('show');
        });
    });

    // Bulk delete
    $('#checkAll').on('click', function () {
        $('.recordCheckbox').prop('checked', this.checked);
    });

    $('#bulkDelete').on('click', function () {
        let ids = [];
        $('.recordCheckbox:checked').each(function () {
            ids.push($(this).val());
        });

        if (ids.length === 0) {
            alert('Please select at least one record to delete.');
            return;
        }

        if (confirm('Are you sure you want to delete selected records?')) {
            $.ajax({
                url: '/admin/live_video_master/bulk-delete',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    ids: ids
                },
                success: function (response) {
                    location.reload();
                }
            });
        }
    });

    // Single delete
    $('.deleteVideo').on('click', function () {
        let id = $(this).data('id');

        if (confirm('Are you sure you want to delete this record?')) {
            $.post('/admin/live_video_master/delete', {
                _token: '{{ csrf_token() }}',
                id: id
            }, function (response) {
                location.reload();
            });
        }
    });
});
</script>
@endsection