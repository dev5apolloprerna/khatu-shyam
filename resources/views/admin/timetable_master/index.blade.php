@extends('layouts.app')

@section('title', 'Timetable Master')

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
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($timetables as $item)
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset('timetable_master/' . $item->image) }}" width="70">
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-sm btn-primary editTimetable"
                                                            data-id="{{ $item->id }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-3">
                                        {{ $timetables->links() }}
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
    @include('admin.timetable_master.edit-modal')
@endsection


@section('scripts')
<script>
    $(document).ready(function() {
        // Edit click handler
        $('.editTimetable').on('click', function() {
            let id = $(this).data('id');

            $.get("{{ url('admin/timetable_master/edit') }}/" + id, function(data) {
                $('#edit_id').val(data.id);
                $('#current_image').attr('src', "{{ asset('timetable_master') }}/" + data.image);

                if (data.iStatus == 1) {
                    $('#edit_status_active').prop('checked', true);
                } else {
                    $('#edit_status_inactive').prop('checked', true);
                }

                $('#editTimetableForm').attr('action', "{{ url('admin/timetable_master/update') }}/" + id);
                $('#editModal').modal('show');
            });
        });

        // Bulk delete
        $('#checkAll').on('click', function() {
            $('.recordCheckbox').prop('checked', this.checked);
        });

        $('#bulkDelete').on('click', function() {
            let ids = $('.recordCheckbox:checked').map(function() {
                return $(this).val();
            }).get();

            if (ids.length === 0) {
                alert('Please select at least one record to delete.');
                return;
            }

            if (confirm('Are you sure you want to delete selected records?')) {
                $.ajax({
                    url: "{{ route('admin.timetable_master.bulk-delete') }}",
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

        // Single delete
        $('.deleteTimetable').on('click', function() {
            let id = $(this).data('id');
            if (confirm('Are you sure you want to delete this record?')) {
                $.post("{{ route('admin.timetable_master.delete') }}", {
                    _token: '{{ csrf_token() }}',
                    id: id
                }, function(response) {
                    location.reload();
                });
            }
        });
    });
</script>
@endsection
`