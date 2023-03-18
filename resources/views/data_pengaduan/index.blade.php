@extends('template.layout')
@include('data_pengaduan.detail')

@push('css')
    
@endpush

@section('isi')


{{-- value="{{ auth()->user()->nik }}" --}}
<div class="row">
  @if (auth()->user()->nik);

  @foreach ($pengaduan as $item)

  <div class="card mb-4">
    <div class="card-header">
      <h6>Status: <span class="font-weight-bold text-danger">Delay</span></h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col">
          <div class="d-flex">
            <div>
              <img src="{{asset('assets')}}/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
            </div>
            <div class="d-flex flex-column justify-content-center">
              <h6 class="mb-0 text-sm">{{ Auth()->user()->name }}</h6>
              <p class="text-xs text-secondary mb-0">{{ Auth()->user()->email }}</p>
            </div>
          </div>          
        </div>
      </div>
      </div class="col">
      <div class="m-3">
        <textarea name="" id="" cols="10" rows="10" class="form-control mt-3" disabled>{{ $item->isi_laporan }}</textarea>
      </div>
        <div>

            <img src="{{ asset('fotoPengaduan/'.$item->foto) }}" class="rounded float-left m-3" alt="..." style="width: 300px;">

        </div>

    </div>
    </div>

    </div>
  </div>

  @endforeach
  @endif
</div>

@endsection

@push('js')
    
@endpush