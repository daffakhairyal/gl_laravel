<!-- Modal -->
<div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addDataModalLabel">
                    <i class="fas fa-book"></i> Journal Entry
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('pettyCash.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="noVoucher"><i class="fas fa-receipt"></i> Nomor Voucher</label>
                                <input type="text" class="form-control" id="noVoucher" name="noVoucher" placeholder="Masukkan Nomor Voucher" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="jenis"><i class="fas fa-clipboard-list"></i> Jenis</label>
                                <select class="form-control" id="jenis" name="jenis" required>
                                    <option value="Petty Cash In">Petty Cash In</option>
                                    <option value="Petty Cash Out">Petty Cash Out</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="tanggal"><i class="fas fa-calendar-alt"></i> Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Enter tanggal" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="karyawan"><i class="fas fa-user"></i> Karyawan</label>
                                <input type="text" class="form-control" id="karyawan" name="karyawan" placeholder="Enter karyawan" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="divisi"><i class="fas fa-sitemap"></i> Divisi</label>
                                <input type="text" class="form-control" id="divisi" name="divisi" placeholder="Enter divisi" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="createdBy"><i class="fas fa-user"></i> Created By</label>
                                <input type="text" class="form-control" id="createdBy" name="createdBy" value="{{ Auth::user()->name }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="detail"><i class="fas fa-info-circle"></i> Detail</label>
                                <input type="text" class="form-control autocomplete" id="detail" name="detail" placeholder="Enter detail" required autocomplete="off">
                            </div>
                            <div id="autocomplete-output"></div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="account"><i class="fas fa-coins"></i> Account</label>
                                <input type="text" class="form-control" id="account" name="account" placeholder="Enter account" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="deskripsi"><i class="fas fa-comment"></i> Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Enter description" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="debit"><i class="fas fa-arrow-circle-down"></i> Debit</label>
                                <input type="text" class="form-control" id="debit" name="debit" placeholder="Enter debit" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="credit"><i class="fas fa-arrow-circle-up"></i> Credit</label>
                                <input type="text" class="form-control" id="credit" name="credit" placeholder="Enter credit" required>
                            </div>
                        </div>

                    </div>
                    <!-- Add more form fields as needed -->

                    <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="applyChanges" style="display: none;"><i class="fas fa-check"></i> Apply</button>
                        <button type="button" class="btn btn-info" id="addMore" data-mode="add"><i class="fas fa-plus"></i> Add</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save changes</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
        <!-- Table -->
        <table class="table">
            <!-- Table Header -->
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Voucher</th>
                    <th>Detail</th>
                    <th>Account</th>
                    <th>Jenis</th>
                    <th>Tanggal</th>
                    <th>Karyawan</th>
                    <th>Divisi</th>
                    <th>Deskripsi</th>
                    <th>Debit</th>
                    <th>Credit</th>
                    <th>Created By</th>
                    <th>Actions</th>
                    <!-- Add more table headers as needed -->
                </tr>
            </thead>
            <!-- Table Body -->
            <tbody id="tableBody">
                <!-- Table rows will be added dynamically here -->
            </tbody>
        </table>
    </div>
        </div>
    </div>
</div>
