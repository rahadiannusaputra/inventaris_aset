@extends('layout.main')
{{-- 
@php
  dd($errors);  
@endphp  --}}

@section('container')

  
    {{-- Form Head  --}}
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Edit Data User</h6>
          
      </div>
     
      
      <form action="{{ route('user.update', $user->id) }}" method="post">
        @method('put')
        @csrf
        <div class="card-body ">
          <div class="mb-3 row ">
            <label for="formGroupExampleInput" class="form-label font-weight-bold col-sm-2 col-form-label">NIP</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('nip') is-invalid @enderror "name="nip" required value="{{ old('nip', $user->nip) }}">
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
              <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror " id="formGroupExampleInput2" required value="{{ old('nama', $user->nama)}}" >
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
              <select class="custom-select" name="id_bidang" required>
                @foreach ($bidang as $data)

                @if (old('id_bidang', $user->id_bidang) == $data->id)
                <option value="{{$data->id}}" selected>{{ $data->nama_bidang }}</option>
                @else
                <option value="{{$data->id}}">{{ $data->nama_bidang }}</option>
                @endif
  
                
                    
                @endforeach
               
              </select>
            </div>            
          </div>
          
          <div class="mb-3 row">
            <label for="formGroupExampleInput2" class="form-label font-weight-bold col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
              <select class="custom-select" name="role" required>
                <option value="">---- Pilih Role ----</option>
                <option {{ old('role', $user->role)==='admin'?'selected':'' }} value="admin">Admin</option>
                <option {{ old('role', $user->role)==='staff'?'selected':'' }} value="staff">Staff</option>
                <option {{ old('role', $user->role)==='verifikator'?'selected':'' }} value="verifikator">Verifikator</option>
              </select>
            </div>            
          </div>
          
          <div class="mb-3 row">
            <label for="formGroupExampleInput2" class="form-label font-weight-bold col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
              <select class="custom-select" name="status" required>
                <option value="">--- Pilih Status ---</option>
                <option {{ old('status', $user->status)==='aktif'?'selected':'' }} value="aktif">Aktif</option>
                <option {{ old('status', $user->status)==='tidak aktif'?'selected':'' }} value="tidak aktif">Tidak Aktif</option>
              </select>
            </div>            
          </div>

          <div class="mb-3 row">
            <label for="formGroupExampleInput4" class="form-label font-weight-bold col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input name= "password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" >
              @error('password')
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