@extends('template.layout')
@include('tabel_pengaduan.detail')

@push('css')
    
@endpush

@section('isi')

            
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">NIK</th>
                    <th scope="col">JENIS PENGADUAN</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">ACTION</th>
                </tr>
                </thead>
                <tbody>
                 @foreach ($pengaduan as $item)
                <tr>
                    <th scope="row">{{ $i =!isset($i)?$i=1:++$i }}</th>
                    <td>{{ Auth()->user()->name }}</td>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->jenis_pengaduan }}</td>
                    <td>
                        <div class="text-center">
                        <img src="{{ asset('fotoPengaduan/'.$item->foto) }}" alt="" style="width: 100px;" class="rounded">
                    </div>
                    </td>
                    <td>status</td>
                    <td> 
                        <div class="col d-flex  ">
                            <div class="col-auto my-1 d-flex justify-content-end m-2 ">
                                <button type="button" data-bs-toggle="modal" class="btn btn-success" data-bs-target="#TblpengaduanModal" title="d">DETAIL</button>
                            </div>
                        </div>
                    </td>

                </tr>
                @endforeach
                </tbody>
            </table>

  @endsection
  @include('tabel_pengaduan.detail')
@push('js')

    
@endpush
