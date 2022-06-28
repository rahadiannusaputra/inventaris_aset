@extends('layout.main')

{{-- @php
  dd($errors->has('kode_barang'));  
@endphp  --}}

@section('container')

    
    {{-- Form Head  --}}
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Input Data User</h6>
          
      </div>
     
      
      <form action="{{ route('user.store') }}" method="post">
        @csrf
        <div class="card-body ">
          <div class="mb-3 row ">
            <label for="formGroupExampleInput" class="form-label font-weight-bold col-sm-2 col-form-label">NIP</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('nip') is-invalid @enderror "name="nip">
              @error('nip')
              <div class="invalid-feedback">
                {{$message}}
              </div>      
              @enderror
            </div>           
            
          </div>

          <div class="mb-3 row">
            <label for="formGroupExampleInput2" class="form-label font-weight-bold col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
              <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror " id="formGroupExampleInput2" >
              @error('nama')
              <div class="invalid-feedback">
                {{$message}}
              </div>   
              @enderror
            </div>           
           
          </div>
          
          <div class="mb-3 row">
            <label for="formGroupExampleInput2" class="form-label font-weight-bold col-sm-2 col-form-label">Bidang</label>
            <div class="col-sm-10">
              <select class="custom-select" name="id_bidang">
                @foreach ($bidang as $data)
  
                <option value="{{$data->id}}">{{ $data->nama_bidang }}</option>
                    
                @endforeach
               
              </select>
            </div>            
          </div>
          
          <div class="mb-3 row">
            <label for="formGroupExampleInput2" class="form-label font-weight-bold col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
              <select class="custom-select" name="role">
                <option value="">---- Pilih Role ----</option>
                <option value="Admin">Admin</option>
                <option value="Staff">Staff</option>
                <option value="Verifikator">Verifikator</option>
              </select>
            </div>            
          </div>
          
          <div class="mb-3 row">
            <label for="formGroupExampleInput2" class="form-label font-weight-bold col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
              <select class="custom-select" name="status">
                <option value="">--- Pilih Status ---</option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
              </select>
            </div>            
          </div>

          <div class="mb-3 row">
            <label for="formGroupExampleInput4" class="form-label font-weight-bold col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input name= "password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" >
              @error('bahan')
              <div class="invalid-feedback">
                {{$message}}
              </div>   
              @enderror
            </div>
            
          </div>
          <div class="mb-3 row">
            <label for="formGroupExampleInput5" class="form-label font-weight-bold col-sm-2 col-form-label">Konfirmasi Password</label>
            <div class="col-sm-10">
              <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="formGroupExampleInput" >
              @error('password_confirmation')
              <div class="invalid-feedback">
                {{$message}}
              </div>   
              @enderror
            </div>         
          </div> 
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-success col-md-3 ms-auto mt-4" type="submit" >Submit</button>
          </div>
          
        </div>
      
      
      
      </form>     
  </div>
@endsection