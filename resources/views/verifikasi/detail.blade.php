@extends('layout.main')

{{-- @php
  dd($errors->has('kode_barang'));  
@endphp --}}

@section('container')
    {{-- Form Head --}}
    @if (session()->has('alreadyVerificated'))
        <div class="alert alert-danger alert-dismissible fade show"
            role="
                                                                                                                                                                        alert">
            {{ session('alreadyVerificated') }}
            <a type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></a>
        </div>
    @elseif(session()->has('alreadyDeclined'))
        <div class="alert alert-danger alert-dismissible fade show"
            role="
                                                                                                                                                                        alert">
            {{ session('alreadyDeclined') }}
            <a type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></a>
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Data Inventaris</h6>

        </div>




        <div class="card-body ">

            <div class="mb-3 row ">
                <label for="formGroupExampleInput" class="form-label font-weight-bold col-sm-2 col-form-label">Barcode
                    Barang</label>
                <div class="col-sm-10">
                    <div class="mb-3">{!! DNS2D::getBarcodeHTML($dataInventaris->kode_barang, 'QRCODE', 4, 4) !!}</div>

                </div>
            </div>
            <div class="mb-3 row ">
                <label for="formGroupExampleInput" class="form-label font-weight-bold col-sm-2 col-form-label">Kode
                    Barang</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control @error('kode_barang') is-invalid @enderror "
                        name="kode_barang" required value="{{ old('kode_barang', $dataInventaris->kode_barang) }}">
                    @error('kode_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>

            <div class="mb-3 row">
                <label for="formGroupExampleInput2"
                    class="form-label font-weight-bold col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <input disabled name="keterangan" type="text"
                        class="form-control @error('keterangan') is-invalid @enderror " id="formGroupExampleInput2" required
                        value="{{ old('keterangan', $dataInventaris->keterangan) }}">
                    @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>

            <div class="mb-3 row">
                <label for="formGroupExampleInput2"
                    class="form-label font-weight-bold col-sm-2 col-form-label">Ruangan</label>
                <div class="col-sm-10">
                    <select disabled class="custom-select" name="id_ruangan">
                        @foreach ($ruangan as $data)
                            @if (old('id_ruangan', $dataInventaris->id_ruangan) == $data->id)
                                <option value="{{ $data->id }}" selected>{{ $data->nama_ruangan }}</option>
                            @else
                                <option value="{{ $data->id }}">{{ $data->nama_ruangan }}</option>
                            @endif
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="formGroupExampleInput2" class="form-label font-weight-bold col-sm-2 col-form-label">Jenis
                    Mutasi</label>
                <div class="col-sm-10">
                    <select disabled class="custom-select" name="jenis_mutasi" required>
                        <option value="">---- Jenis Mutasi ----</option>
                        <option {{ old('jenis_mutasi', $dataInventaris->jenis_mutasi) === 'Masuk' ? 'selected' : '' }}
                            value="Masuk">
                            Masuk
                        </option>
                        <option {{ old('jenis_mutasi', $dataInventaris->jenis_mutasi) === 'Keluar' ? 'selected' : '' }}
                            value="Keluar">
                            Keluar
                        </option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="formGroupExampleInput10"
                    class="form-label font-weight-bold col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">

                    <input disabled type="number" class="form-control @error('harga') is-invalid @enderror"
                        id="formGroupExampleInput" name="harga" required
                        value="{{ old('harga', $dataInventaris->harga) }}">
                    @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>


            <div class="mb-3 row">
                <label for="formGroupExampleInput6" class="form-label font-weight-bold col-sm-2 col-form-label">Tahun
                    Perolehan</label>
                <div class="col-sm-10">
                    <input disabled type="text" name="tahun_perolehan"
                        class="form-control datepicker @error('tahun_perolehan') is-invalid @enderror" id="datepicker"
                        required value="{{ old('tahun_perolehan', $dataInventaris->tahun_perolehan) }}">
                    @error('tahun_perolehan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="formGroupExampleInput2"
                    class="form-label font-weight-bold col-sm-2 col-form-label">Kondisi</label>
                <div class="col-sm-10">
                    <select disabled class="custom-select" name="kondisi" required>
                        <option value="">---- Pilih Kondisi ----</option>
                        <option {{ old('kondisi', $dataInventaris->kondisi) === 'Baik' ? 'selected' : '' }} value="Baik">
                            Baik
                        </option>
                        <option {{ old('kondisi', $dataInventaris->kondisi) === 'Rusak Ringan' ? 'selected' : '' }}
                            value="Rusak Ringan">
                            Rusak Ringan
                        </option>
                        <option {{ old('kondisi', $dataInventaris->kondisi) === 'Rusak Berat' ? 'selected' : '' }}
                            value="Rusak Berat">
                            Rusak Berat</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="formGroupExampleInput" class="form-label font-weight-bold col-sm-2 col-form-label">Tag</label>
                <div class="col-sm-10">
                    <input disabled name="tag" type="text" class="form-control 
                        id="
                        formGroupExampleInput2" value="{{ old('tag', $dataInventaris->tag) }}">

                </div>

            </div>

            <div class="mb-3 row">
                <label for="formGroupExampleInput"
                    class="form-label font-weight-bold col-sm-2 col-form-label">Uraian</label>
                <div class="col-sm-10">
                    <input disabled name="uraian" type="text" class="form-control 
                        id="
                        formGroupExampleInput2" value="{{ old('uraian', $dataInventaris->uraian) }}">

                </div>

            </div>

            <div class="justify-content-md-end d-flex">
                <a href="" class="btn btn-danger  mt-5" data-toggle="modal" data-target="#exampleModal"><i
                        class="fas fa-times mr-2"></i></i>Tolak</a>

                <a href="" class="btn btn-info  mt-5 mx-3" data-toggle="modal" data-target="#exampleModalVerif"><i
                        class="fas fa-check mr-2"></i></i>Setujui</a>



            </div>

            <div class="modal fade" id="exampleModalVerif" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Setujui Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('verifikasi.decline', $dataInventaris->id) }}" name="alasan"
                                method="POST">
                                @csrf
                                <div class="form-group">
                                    <span>Apakah anda ingin menyetujui data berikut?</span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <a href="/verification/confirm/{{ $dataInventaris->id }}" class="btn btn-info mx-3"
                                        type="button"><i class="fas fa-check mr-2"></i>
                                        Setujui
                                    </a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Alasan Ditolak</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('verifikasi.decline', $dataInventaris->id) }}" name="alasan"
                                method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Alasan:</label>
                                    <textarea class="form-control" id="message-text" name="alasan"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>







    </div>

    @push('scripts')
        <script>
            $("#datepicker").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true //to close picker once year is selected
            });
        </script>
    @endpush
@endsection
