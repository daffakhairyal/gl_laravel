<!-- Edit Modal -->
<div class="modal fade" id="editModal{{ $account->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $account->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $account->id }}">Edit Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Your edit form goes here -->
                <form method="POST" action="{{ route('accounts.update', $account->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $account->name }}">
                    </div>
                    <div class="form-group">
                        <label for="account">Account</label>
                        <input type="text" class="form-control" id="account" name="account" value="{{ $account->account }}">
                    </div>
                    <div class="form-group">
                        <label for="induk">Induk</label>
                        <input type="text" class="form-control" id="induk" name="induk" value="{{ $account->induk }}">
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <input type="text" class="form-control" id="level" name="level" value="{{ $account->level }}">
                    </div>
                    <div class="form-group">
                        <label for="defSaldo">DefSaldo</label>
                        <input type="text" class="form-control" id="defSaldo" name="defSaldo" value="{{ $account->defSaldo }}">
                    </div>
                    <div class="form-group">
                        <label for="klasifikasi">Klasifikasi</label>
                        <input type="text" class="form-control" id="klasifikasi" name="klasifikasi" value="{{ $account->klasifikasi }}">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" class="form-control" id="type" name="type" value="{{ $account->type }}">
                    </div>
                    <!-- Add more form fields for editing -->
                
                    <!-- Tombol "Save changes" ditempatkan di dalam elemen <form> -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
