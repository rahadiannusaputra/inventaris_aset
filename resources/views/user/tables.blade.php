@extends('layout.main')

@section('container')
    <!-- Page Heading -->


    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="
                                                                                                            alert">
            {{ session('success') }}
            <a type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></a>
        </div>
    @elseif(session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="
                                                                                                            alert">
            {{ session('delete') }}
            <a type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></a>
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 justify-content-between d-flex">
            <h6 class="m-0 font-weight-bold text-primary d-inline-block align-self-center">Data User</h6>
            <a href="{{ route('user.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm-w-20 text-white-50 mr-2 "></i>Tambah Data</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIP</th>
                            <th>Nama Pegawai</th>
                            <th>Bidang</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataUser as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nip }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->bidang->nama_bidang }}</td>
                                <td>{{ $item->role }}</td>
                                <td>{{ $item->status }}</td>
                                <td>

                                    <a href="#" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <a href="{{ route('user.edit', $item->id) }}" class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btnHapus btn-danger btn-circle btn-sm border-0" href="#"
                                        data-toggle="modal" data-target="#hapusModal" data-id="{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        {{-- Delete Modal --}}
                        <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus User</h5>
                                        <button class="close" type="button" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Yakin anda akan menghapus user ini?</div>
                                    <div class="modal-footer">

                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <form id="formHapusModal" action="" class="d-inline" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-primary" type="submit">Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.btnHapus').on('click', function() {

            $('#formHapusModal').attr('action', '/user/' + $(this).data('id'));
        })
    </script>
@endpush
