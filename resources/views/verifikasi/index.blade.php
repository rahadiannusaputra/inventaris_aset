@extends('layout.main')


<!-- Page Heading -->


@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show"
            role="
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                alert">
            {{ session('success') }}
            <a type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></a>
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show"
            role="
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                alert">
            {{ session('error') }}
            <a type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></a>
        </div>
    @endif


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 justify-content-between d-flex">
            <h6 class="m-0 font-weight-bold text-primary d-inline-block align-self-center">Data Inventaris Barang </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Registrasi</th>
                            <th>Keterangan</th>
                            <th>Jenis Mutasi</th>
                            <th>Kondisi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataInventaris as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->inventaris->kode_barang }}</td>
                                <td>{{ $item->inventaris->keterangan }}</td>
                                <td>{{ $item->inventaris->jenis_mutasi }}</td>
                                <td>{{ $item->inventaris->kondisi }}</td>
                                <td>
                                    {{ $item->status !== null ? $item->status : '-' }}

                                </td>

                                <td>
                                    <a href="{{ route('verifikasi.detail', $item->inventaris->id) }}"
                                        class="btn btn-success btn-circle btn-sm" data-toggle="tooltip" data-placement="top"
                                        title="Detail Data">
                                        <i class="fas fa-info"></i>
                                    </a>



                                </td>

                                {{-- <form action="{{route('inventaris.destroy',$item->id)}}" class="d-inline" method="post" id="{{ $item->id }}" >
                                @method('DELETE')
                                @csrf
                            <button class="btn btn-danger btn-circle btn-sm border-0 btn-hapus" data-id="{{ $item->id }}"><i class="fas fa-trash"></i>
                            </button>
                            </form> --}}

                                {{-- Delete Modal --}}
                                <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data
                                                </h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Yakin anda akan menghapus data?</div>
                                            <div class="modal-footer">

                                                <button class="btn btn-secondary" type="button"
                                                    data-dismiss="modal">Cancel</button>
                                                <form id="formHapusModal" action="" class="d-inline" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-primary" type="submit">Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- @push('scripts')
    <script>
        document.querySelector(".btn-hapus").addEventListener("click", function(e) {          
            e.preventDefault();

            let id = this.data.id;
            Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(id).click();
        //   Swal.fire(
        //     'Deleted!',
        //     'Your file has been deleted.',
        //     'success'
        //   )
        }
        });
        });

    </script>
    
    @endpush --}}
@endsection
@push('scripts')
    <script>
        $('.btnHapus').on('click', function() {

            $('#formHapusModal').attr('action', '/inventaris/' + $(this).data('id'));
        })
    </script>
@endpush
