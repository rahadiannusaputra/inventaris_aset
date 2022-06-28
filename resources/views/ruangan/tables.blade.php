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
    {{-- <div class="d-sm-flex align-items-center justify-content-end mb-4">
   
       
        
           
     </div> --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 justify-content-between d-flex">
            <h6 class="m-0 font-weight-bold text-primary d-inline-block align-self-center">Data Ruangan</h6>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"
                data-whatever="@getbootstrap">
                <i class="fas fa-plus fa-sm-w-20 text-white-55 mr-2 "></i>Tambah Data</a>
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Tambah Data Ruangan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('ruangan.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="col-form-label">Nama Bidang</label>
                                    <select class="custom-select" name="id_bidang">
                                        @foreach ($bidang as $b)
                                            <option value="{{ $b->id }}">{{ $b->nama_bidang }}</option>
                                        @endforeach
                                    </select>
                                    <label class="col-form-label">Ruangan:</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="recipient-name" name="nama_ruangan" required>
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="modal-footer mt-4">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table" width="100%" cellspacing="0">
                    <thead>
                        <tr></tr>
                        <tr>
                            <th>#</th>
                            <th>Ruangan</th>
                            <th>Jumlah Barang</th>
                            <th class="text-center">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataRuangan as $b)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $b->nama_ruangan }}</td>
                                <td>{{ $b->inventaris_count }}</td>
                                <td class="text-center">
                                    <a data-id="{{ $b->id }}" data-id_bidang="{{ $b->id_bidang }}"
                                        data-ruangan="{{ $b->nama_ruangan }}" href="#"
                                        class="btn btnEdit btn-info btn-circle btn-sm" data-toggle="modal"
                                        data-target="#editData">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btnHapus btn-danger btn-circle btn-sm " data-toggle="modal"
                                        data-target="#hapusModal" data-id="{{ $b->id }}">
                                        <i class="fas fa-trash"></i>
                                    </a>


                                </td>

                            </tr>

                            {{-- Edit Modal --}}
                            <div class="modal fade" id="editData" tabindex="-1" aria-labelledby="editDataLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title font-weight-bold" id="editDataLabel">
                                                Update Data Ruangan</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" id="formModal">
                                                @method('put')
                                                @csrf
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Nama
                                                        Bidang</label>
                                                    <select class="custom-select" name="id_bidang" id="selectedModal">
                                                        @foreach ($bidang as $b)
                                                            @if (old('id_bidang', $b->id_bidang) == $b->id)
                                                                <option value="{{ $b->id }}" selected>
                                                                    {{ $b->nama_bidang }}</option>
                                                            @else
                                                                <option value="{{ $b->id }}">
                                                                    {{ $b->nama_bidang }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <label for="recipient-name" class="col-form-label">Ruangan:</label>
                                                    <input type="text"
                                                        class="form-control @error('nama') is-invalid @enderror"
                                                        id="ruanganModal" name="nama_ruangan" required
                                                        value="{{ old('nama_ruangan', $b->nama_ruangan) }}">
                                                    @error('nama')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror

                                                </div>

                                                <div class="modal-footer mt-4">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary" name="submit">Tambah
                                                        Data</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- Delete Modal --}}
                        <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Ruangan
                                        </h5>
                                        <button class="close" type="button" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Yakin anda akan menghapus Ruangan ini?</div>
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
        $('.btnEdit').on('click', function() {
            $('#selectedModal').val($(this).data('id_bidang'));
            $('#ruanganModal').val($(this).data('ruangan'));
            $('#formModal').attr('action', '/ruangan/' + $(this).data('id'));
        })
        $('.btnHapus').on('click', function() {
            $('#formHapusModal').attr('action', '/ruangan/' + $(this).data('id'));
        })
    </script>
@endpush
