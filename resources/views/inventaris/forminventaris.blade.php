@extends('layout.main')

{{-- @php
  dd($errors->has('kode_barang'));  
@endphp --}}

@section('container')
    {{-- Form Head --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Input Data Inventaris</h6>

        </div>


        <form action="{{ route('inventaris.store') }}" method="post">

            @csrf
            <div class="card-body ">
                <div class="mb-3 row ">
                    <label for="formGroupExampleInput" class="form-label font-weight-bold col-sm-2 col-form-label">Kode
                        Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('kode_barang') is-invalid @enderror "
                            name="kode_barang" required value="{{ old('kode_barang') }}">
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
                        <input name="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror "
                            id="formGroupExampleInput2" required value="{{ old('keterangan') }}">
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
                        <select class="custom-select" name="id_ruangan" required>
                            <option value="">=== Masukan Nama Ruangan ===</option>
                            @foreach ($ruangan as $data)
                                @if (old('id_ruangan') == $data->id)
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
                        <select class="custom-select" name="jenis_mutasi" required>
                            <option value="">---- Pilih Jenis Mutasi ----</option>
                            <option {{ old('jenis_mutasi', $data->jenis_mutasi) === 'Masuk' ? 'selected' : '' }}
                                value="Masuk">
                                Masuk
                            </option>
                            <option {{ old('jenis_mutasi', $data->jenis_mutasi) === 'Keluar' ? 'selected' : '' }}
                                value="Keluar">Keluar
                            </option>

                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="formGroupExampleInput10"
                        class="form-label font-weight-bold col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">

                        <input type="number" class="form-control @error('harga') is-invalid @enderror"
                            id="formGroupExampleInput" name="harga" required value="{{ old('harga') }}">
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
                        <input type="text" name="tahun_perolehan"
                            class="form-control datepicker @error('tahun_perolehan') is-invalid @enderror" id="datepicker"
                            required value="{{ old('tahun_perolehan') }}">
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
                        <select class="custom-select" name="kondisi" required>
                            <option value="">---- Pilih Kondisi ----</option>
                            <option {{ old('kondisi', $data->kondisi) === 'Baik' ? 'selected' : '' }} value="Baik">
                                Baik
                            </option>
                            <option {{ old('kondisi', $data->kondisi) === 'Rusak Ringan' ? 'selected' : '' }}
                                value="Rusak Ringan">Rusak Ringan
                            </option>
                            <option {{ old('kondisi', $data->kondisi) === 'Rusak Berat' ? 'selected' : '' }}
                                value="Rusak Berat">
                                Rusak Berat</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="formGroupExampleInput9"
                        class="form-label font-weight-bold col-sm-2 col-form-label">Tag</label>
                    <div class="col-sm-10">

                        <input name="tag" type="text" class="form-control @error('tag') is-invalid @enderror"
                            id="formGroupExampleInput2" required value="{{ old('tag') }}">
                        @error('tag')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                </div>




                <div class="mb-3 row">
                    <label for="formGroupExampleInput"
                        class="form-label font-weight-bold col-sm-2 col-form-label">Uraian</label>

                    <div class="col-sm-10">
                        <input name="uraian" type="text" class="form-control" id="formGroupExampleInput2"
                            value="{{ old('uraian') }}">
                    </div>

                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success col-md-3 ms-auto mt-4" type="submit">Submit</button>

                </div>

            </div>



        </form>



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
