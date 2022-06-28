@extends('layout.main')

{{-- @php
  dd($errors->has('kode_barang'));  
@endphp --}}

@section('container')
    {{-- Form Head --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Data Inventaris</h6>

        </div>




        <div class="card-body ">

            <div class="mb-3 row ">
                <label for="formGroupExampleInput" class="form-label font-weight-bold col-sm-2 col-form-label">Barcode
                    Barang</label>
                <div class="col-sm-10">
                    <div class="mb-3">{!! DNS2D::getBarcodeHTML($inventaris->kode_barang, 'QRCODE', 4, 4) !!}</div>

                </div>
            </div>
            <div class="mb-3 row ">
                <label for="formGroupExampleInput" class="form-label font-weight-bold col-sm-2 col-form-label">Kode
                    Barang</label>
                <div class="col-sm-10">
                    <input disabled type="text" class="form-control @error('kode_barang') is-invalid @enderror "
                        name="kode_barang" required value="{{ old('kode_barang', $inventaris->kode_barang) }}">
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
                        value="{{ old('keterangan', $inventaris->keterangan) }}">
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
                            @if (old('id_ruangan', $inventaris->id_ruangan) == $data->id)
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
                        <option {{ old('jenis_mutasi', $inventaris->jenis_mutasi) === 'Masuk' ? 'selected' : '' }}
                            value="Masuk">
                            Masuk
                        </option>
                        <option {{ old('jenis_mutasi', $inventaris->jenis_mutasi) === 'Keluar' ? 'selected' : '' }}
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
                        id="formGroupExampleInput" name="harga" required value="{{ old('harga', $inventaris->harga) }}">
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
                        required value="{{ old('tahun_perolehan', $inventaris->tahun_perolehan) }}">
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
                        <option {{ old('kondisi', $inventaris->kondisi) === 'Baik' ? 'selected' : '' }} value="Baik">
                            Baik
                        </option>
                        <option {{ old('kondisi', $inventaris->kondisi) === 'Rusak Ringan' ? 'selected' : '' }}
                            value="Rusak Ringan">
                            Rusak Ringan
                        </option>
                        <option {{ old('kondisi', $inventaris->kondisi) === 'Rusak Berat' ? 'selected' : '' }}
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
                        formGroupExampleInput2" value="{{ old('tag', $inventaris->tag) }}">

                </div>

            </div>

            <div class="mb-3 row">
                <label for="formGroupExampleInput"
                    class="form-label font-weight-bold col-sm-2 col-form-label">Uraian</label>
                <div class="col-sm-10">
                    <input disabled name="uraian" type="text" class="form-control 
                        id="
                        formGroupExampleInput2" value="{{ old('uraian', $inventaris->uraian) }}">

                </div>

            </div>


            @if ($inventaris->verifikasi->alasan != null)
                <div class="justify-content-md-between mt-5">
                    <span class="text-danger font-weight-bold">*Alasan ditolak:
                        {{ $inventaris->verifikasi->alasan }}</span>
                </div>
            @endif

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
