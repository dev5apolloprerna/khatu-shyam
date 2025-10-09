@extends('layouts.app')

@section('title', 'Live Video Master')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                {{-- Alert Messages --}}
                @include('common.alert')
                <div class="row">
                    <!-- Right Side: Listing -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Video Link</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($videos as $video)
                                                <tr>
                                                    <td>{{ $video->video_link }}</td>
                                                    <td>
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-sm btn-primary editVideo"
                                                            data-id="{{ $video->live_video_id }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        {{-- <a href="javascript:void(0);" class="btn btn-sm btn-danger deleteVideo" data-id="{{ $video->live_video_id }}">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a> --}}
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
        $(document).ready(function() {
            // Handle edit button click
            $('.editVideo').on('click', function() {
                let id = $(this).data('id');

                $.get("{{ url('admin/live_video_master/edit') }}/" + id, function(data) {
                    $('#edit_live_video_id').val(data.live_video_id);
                    $('#edit_video_link').val(data.video_link);

                    if (data.iStatus == 1) {
                        $('#edit_status_active').prop('checked', true);
                    } else {
                        $('#edit_status_inactive').prop('checked', true);
                    }

                    $('#editLiveVideoForm').attr('action', "{{ url('admin/live_video_master/update') }}/" + id);
                    $('#editModal').modal('show');
                });
            });

            // Optional: Uncomment when enabling bulk delete
            /*
            $('#checkAll').on('click', function() {
                $('.recordCheckbox').prop('checked', this.checked);
            });

            $('#bulkDelete').on('click', function() {
                let ids = [];
                $('.recordCheckbox:checked').each(function() {
                    ids.push($(this).val());
                });

                if (ids.length === 0) {
                    alert('Please select at least one record to delete.');
                    return;
                }

                if (confirm('Are you sure you want to delete selected records?')) {
                    $.ajax({
                        url: "{{ route('admin.live_video_master.bulk-delete') }}",
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            ids: ids
                        },
                        success: function(response) {
                            location.reload();
                        }
                    });
                }
            });

            $('.deleteVideo').on('click', function() {
                let id = $(this).data('id');

                if (confirm('Are you sure you want to delete this record?')) {
                    $.post("{{ route('admin.live_video_master.delete') }}", {
                        _token: '{{ csrf_token() }}',
                        id: id
                    }, function(response) {
                        location.reload();
                    });
                }
            });
            */
        });
    </script>
@endsection
