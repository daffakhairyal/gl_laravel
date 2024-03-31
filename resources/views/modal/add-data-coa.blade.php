<!-- Modal -->
<div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Add Data COA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('accounts.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <input type="text" class="form-control" id="level" name="level" placeholder="Enter level">
                    </div>
                    <div class="form-group">
                        <label for="account">Account</label>
                        <input type="text" class="form-control" id="account" name="account" placeholder="Enter account">
                    </div>
                    <div class="form-group">
                        <label for="induk">Induk</label>
                        <input type="text" class="form-control" id="induk" name="induk" placeholder="Enter induk">
                    </div>
                    <div class="form-group">
                        <label for="klasifikasi">Klasifikasi</label>
                        <input type="text" class="form-control" id="klasifikasi" name="klasifikasi" placeholder="Enter klasifikasi">
                    </div>
                    <div class="form-group">
                        <label for="defSaldo">DefSaldo</label>
                        <input type="text" class="form-control" id="defSaldo" name="defSaldo" placeholder="Enter defSaldo">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" class="form-control" id="type" name="type" placeholder="Enter type">
                    </div>
                    <!-- Add more form fields as needed -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
