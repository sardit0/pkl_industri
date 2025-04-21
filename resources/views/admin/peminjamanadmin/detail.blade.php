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
                    <strong>Status:</strong><br>

                    @if (in_array($minjem->status, ['diterima', 'ditolak']))
                        <p class="text-muted mt-2"><i>Status is final ({{ ucfirst($minjem->status) }})</i></p>
                    @else
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
                    @endif
                </div>
            </div>

            <!-- Modal untuk alasan penolakan -->
            <div class="modal fade" id="reasonModal" tabindex="-1" aria-labelledby="reasonModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="rejectForm" action="{{ route('peminjaman.update', $minjem->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="ditolak">
                            <div class="modal-header">
                                <h5 class="modal-title" id="reasonModalLabel">Reason for Rejection</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="reason">Reason:</label>
                                    <textarea name="alasan" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <a href="{{ route('peminjamanadmin.index') }}" class="btn btn-danger">Back</a>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Show modal for rejection reason
        function showReasonModal() {
            var reasonModal = new bootstrap.Modal(document.getElementById('reasonModal'));
            reasonModal.show();
        }
    </script>
@endpush
