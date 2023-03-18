@extends('template.layout')

@push('css')
    
@endpush

@section('isi')
{{-- <div class="card">
  @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('error') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      @endif
    </div> --}}

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>DAFTAR PETUGAS</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#modalPetugas">Tambah Petugas</button>
            <div class="table-responsive p-0">
                @include('petugas.tabel')
                @include('petugas.create')
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('js')
    
@endpush