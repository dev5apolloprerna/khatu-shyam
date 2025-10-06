@extends('layouts.app')
@section('title','Albums')

@section('content')
<div class="main-content">
  <div class="page-content">
    <div class="container-fluid">

      @include('common.alert')

      <meta name="csrf-token" content="{{ csrf_token() }}"/>

      <div class="row g-3">
        <!-- LEFT: ADD FORM -->
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header"><h5 class="mb-0">Add Album</h5></div>
            <div class="card-body">
              <form method="POST" action="{{ route('albums.store') }}">
                @csrf
                <div class="mb-3">
                  <label class="form-label">Name <span class="text-danger">*</span></label>
                  <input type="text" name="name" class="form-control" required maxlength="200" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="iStatus" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Save</button>
              </form>
            </div>
          </div>
        </div>


        <!-- RIGHT: LISTING -->
         <div class="col-md-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title mb-0">Client List</h5>
                            <button type="button" id="btnBulkDelete" class="btn btn-danger btn-sm">
                                Delete Selected
                            </button>
                        </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                    <tr>
                      <th style="width:40px">
                        <input type="checkbox" id="checkAll">
                      </th>
                      <th>Name</th>
                      <th style="width:120px">Status</th>
                      <th style="width:130px" class="text-end">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($albums as $a)
                    <tr data-id="{{ $a->album_id }}" data-name="{{ $a->name }}" data-status="{{ $a->iStatus }}">
                      <td><input type="checkbox" class="row-check" value="{{ $a->album_id }}"></td>
                      <td>{{ $a->name }}</td>
                      <td>
                        <div class="form-check form-switch">
                            <form action="{{ route('albums.toggle-status',$a->album_id) }}" method="POST" class="d-inline">
                             @csrf 
                             <button class="btn btn-sm toggle-status {{ $a->iStatus ? 'btn-success' : 'btn-warning' }}">
                                {{ $a->iStatus ? 'Active' : 'Inactive' }}
                             </button>

                            </form>

                        </div>
                      </td>
                      <td class="text-end">
                        <button class="btn btn-sm btn-primary btnEdit" data-bs-toggle="modal" data-bs-target="#editModal">
                          <i class="fa fa-edit"></i>
                        </button>
                        <form class="d-inline" method="POST" action="{{ route('albums.destroy', $a->album_id) }}" onsubmit="return confirm('Delete this album?')">
                          @csrf @method('DELETE')
                          <button class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center text-muted py-4">No records found.</td></tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>

            @if($albums->hasPages())
              <div class="card-footer">
                {{ $albums->links() }}
              </div>
            @endif
          </div>
        </div>
      </div>

      <!-- EDIT MODAL -->
      <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <form id="editForm" method="POST" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
              <h5 class="modal-title">Edit Album</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="edit_name" class="form-control" required maxlength="200">
              </div>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="edit_status" name="iStatus" value="1">
                <label class="form-check-label" for="edit_status">Active</label>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary w-100">Update</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
(function(){
  const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  const checkAll = document.getElementById('checkAll');
  const bulkBtn = document.getElementById('btnBulkDelete');

  function selectedIds() {
    return Array.from(document.querySelectorAll('.row-check:checked')).map(x => x.value);
  }
  function refreshBulkBtn() {
    const cnt = selectedIds().length;
    bulkBtn.classList.toggle('d-none', cnt === 0);
    bulkBtn.textContent = cnt ? `Bulk Delete (${cnt})` : 'Bulk Delete';
  }

  // Select all
  checkAll?.addEventListener('change', e=>{
    document.querySelectorAll('.row-check').forEach(cb => { cb.checked = e.target.checked; });
    refreshBulkBtn();
  });
  // Row checks
  document.querySelectorAll('.row-check').forEach(cb=>{
    cb.addEventListener('change', refreshBulkBtn);
  });

  // BULK DELETE
  bulkBtn?.addEventListener('click', async ()=>{
    const ids = selectedIds();
    if (!ids.length) return;
    if (!confirm(`Delete ${ids.length} record(s)?`)) return;

    const res = await fetch(`{{ route('albums.bulk-destroy') }}`, {
      method: 'POST',
      headers: {
        'Content-Type':'application/json',
        'X-CSRF-TOKEN': token,
        'Accept': 'application/json'
      },
      body: JSON.stringify({ ids })
    });
    const data = await res.json();
    if (data.ok) {
      // remove rows from DOM quickly
      ids.forEach(id=>{
        const tr = document.querySelector(`tr[data-id="${id}"]`);
        tr?.remove();
      });
      refreshBulkBtn();
      // also uncheck master
      if (checkAll) checkAll.checked = false;
    } else {
      alert(data.message || 'Bulk delete failed');
    }
  });

  // EDIT POPUP
  document.querySelectorAll('.btnEdit').forEach(btn=>{
    btn.addEventListener('click', e=>{
      const tr = e.currentTarget.closest('tr');
      const id = tr.getAttribute('data-id');
      const name = tr.getAttribute('data-name');
      const status = tr.getAttribute('data-status') === '1';

      document.getElementById('edit_name').value = name;
      document.getElementById('edit_status').checked = status;

      const form = document.getElementById('editForm');
      form.action = `{{ url('admin/albums') }}/${id}`;
    });
  });

  // STATUS TOGGLE (AJAX)
  document.querySelectorAll('.toggle-status').forEach(sw=>{
    sw.addEventListener('change', async (e)=>{
      const tr = e.currentTarget.closest('tr');
      const id = tr.getAttribute('data-id');

      const res = await fetch(`{{ url('admin/albums/toggle-status') }}/${id}`, {
        method: 'POST',
        headers: {'X-CSRF-TOKEN': token, 'Accept':'application/json'}
      });
      const data = await res.json();
      if (!data.ok) {
        alert(data.message || 'Toggle failed');
        // revert UI if failure
        e.currentTarget.checked = !e.currentTarget.checked;
      } else {
        tr.setAttribute('data-status', data.status ? '1' : '0');
      }
    });
  });

})();
</script>
@endsection
