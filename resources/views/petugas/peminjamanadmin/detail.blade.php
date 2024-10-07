@extends('layouts.backend.admin')
@section('content')
    <div class="card m-3">
        <div class="card-body">
            <h4 class="card-title">Detail Borrower</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Book Name:</strong>
                    <p>{{ $minjem->buku->judul }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Borrower Name:</strong>
                    <p>{{ $minjem->nama }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Amount:</strong>
                    <p>{{ $minjem->jumlah }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Date Borrower:</strong>
                    <p>{{ $minjem->tanggal_minjem }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Status:</strong>
                    <form action="{{ route('peminjaman.update', $minjem->id) }}" method="POST">
                        @csrf
                        @method('PUT')
            
                        <button type="submit" name="status" value="diterima" 
                            class="btn {{ $minjem->status == 'diterima' ? 'btn-success' : 'btn-outline-success' }} mt-2">
                            Accepted
                        </button>
            
                        <button type="button" 
                            class="btn {{ $minjem->status == 'ditolak' ? 'btn-danger' : 'btn-outline-danger' }} mt-2"
                            onclick="showReasonModal()">
                            Rejected
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Modal untuk alasan penolakan -->
            <div class="modal fade" id="reasonModal" tabindex="-1" aria-labelledby="reasonModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reasonModalLabel">Reason for Rejection</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="rejectForm" action="{{ route('peminjaman.update', $minjem->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="ditolak">
                                <div class="form-group">
                                    <label for="reason">Reason:</label>
                                    <textarea name="alasan" id="reasonModal" class="form-control" required></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" form="rejectForm" class="btn btn-danger">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            
@endsection

<script>
    // Show modal for rejection reason
    function showReasonModal() {
        var reasonModal = new bootstrap.Modal(document.getElementById('reasonModal'), {});
        reasonModal.show();
    }

    // Function to update status for other cases (e.g. Detained)
    function updateStatus(status) {
        let form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route('peminjaman.update', $minjem->id) }}';

        let statusInput = document.createElement('input');
        statusInput.type = 'hidden';
        statusInput.name = 'status';
        statusInput.value = status;
        form.appendChild(statusInput);

        let csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}';
        form.appendChild(csrfInput);

        let methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'PUT';
        form.appendChild(methodInput);

        document.body.appendChild(form);
        form.submit();
    }
</script>
