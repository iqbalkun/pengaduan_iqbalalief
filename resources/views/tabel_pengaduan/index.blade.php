@extends('template.layout')

@push('css')
    
@endpush

@section('isi')

            
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">JENIS PENGADUAN</th>
                    <th scope="col">NIK</th>
                    <th scope="col">FILE PENGADUAN</th>
                    <th scope="col">ACTION</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td>        
                        <div class="col d-flex  ">
                            <div class="col-auto my-1 d-flex justify-content-end m-2 ">
                                <button type="submit" class="btn btn-success">DETAIL</button>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

  @endsection

@push('js')
    
@endpush