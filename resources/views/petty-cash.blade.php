@extends('layout.main')
@section('container')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Petty Cash</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Petty Cash</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#addDataModal">
                Add Data
            </button>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Responsive Hover Table</h3>
                    
                    <div class="card-tools">
                        <div class="d-flex align-items-center">
                            <!-- Pagination -->
                            <div class="">
                                <label class="mr-2">Show:</label>
                                <form action="{{ url()->current() }}" method="GET" class="d-inline-block">
                                    <select name="perPage" id="perPage" class="form-control form-control-sm" onchange="this.form.submit()">
                                        <option value="10" {{ Request::input('perPage') == 10 ? 'selected' : '' }}>10</option>
                                        <option value="25" {{ Request::input('perPage') == 25 ? 'selected' : '' }}>25</option>
                                        <option value="50" {{ Request::input('perPage') == 50 ? 'selected' : '' }}>50</option>
                                        <option value="100" {{ Request::input('perPage') == 100 ? 'selected' : '' }}>100</option>
                                    </select>
                                </form>
                            </div>

                            <!-- Search input -->
                            <div class="input-group input-group-sm ml-3" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Actions</th>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pettyCashList as $index => $ps)
                            <tr>
                                <td>{{ ($pettyCashList->currentPage() - 1) * $pettyCashList->perPage() + $loop->iteration }}</td>
                                <td>
                                <div class="d-flex">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $ps->id }}"><i class="fas fa-pen mr-1"></i></button>
    <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#deleteModal{{ $ps->id }}"><i class="fas fa-trash-alt mr-1"></i></button>
    <form action="{{ route('pettyCash.updateStatus', $ps->id) }}" method="POST" class="ml-2">
        @csrf
        <button type="submit" class="btn btn-warning" style="color: white !important;">
            @if ($ps->status == 1)
                <i class="fas fa-lock-open"></i>
                <input type="hidden" name="status" value="0">
            @else
                <i class="fas fa-lock"></i>
                <input type="hidden" name="status" value="1">
            @endif
        </button>
    </form>
</div>

</td>

                                <td>{{ $ps->noVoucher }}</td>
                                <td>{{ $ps->detail }}</td>
                                <td>{{ $ps->account }}</td>
                                <td>{{ $ps->jenis }}</td>
                                <td>{{ $ps->tanggal }}</td>
                                <td>{{ $ps->karyawan }}</td>
                                <td>{{ $ps->divisi }}</td>
                                <td>{{ $ps->deskripsi }}</td>
                                <td>{{ $ps->debit }}</td>
                                <td>{{ $ps->credit }}</td>
                                <td>{{ $ps->createdBy }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

                <!-- Pagination -->
                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $pettyCashList->appends(['perPage' => Request::get('perPage')])->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <!-- Include the modal -->
    @include('modal.add-data-ps')

</section>
<!-- /.content -->

@endsection
