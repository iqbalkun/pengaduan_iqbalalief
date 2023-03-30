@extends('template.layout')
{{-- @include('guru.create') --}}

@push('css')
@endpush

@section('isi')

<div class="card">
  @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('error') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endif
</div>

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>guru</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
<button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#Guru">tambah data </button>
    <a href="{{ route('export-guru') }}" class="btn btn-success m-3">
      <i class="fa fa-file-excel"></i>export  
    </a>
    <button type="button" data-bs-toggle="modal" data-bs-target="#formImport" class="btn btn-warning m-3">
      <i class="fa fa-file-excel"></i> import 
    </button>
    @include('guru.form')
@include('guru.tabel')
@include('guru.create')

                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
<!-- boostrap -->
@endsection


@push('js')
  <script>
      // $('#guru').DataTable();
      // $('.alert-success').fadeTo(2000,500).slideUp(500, function(){
      //   $('.alert-success').slideUp(500)
      // })

      
    // $('.btn-delete').on('click', function(e) {
    //   e.preventDefault();
    //   const data = $(this).closest('tr').find('td:eq(4)').text()

    //   Swal.fire({
    //       title: 'Are you sure?',
    //       text: "You won't be able to revert this!",
    //       icon: 'warning',
    //       showCancelButton: true,
    //       confirmButtonColor: '#3085d6',
    //       cancelButtonColor: '#d33',
    //       confirmButtonText: 'Yes, delete it!'
    //     }).then((result) => {
    //       if (result.isConfirmed) 
    //       $(e.target).closest('form').submit()
    //       else swal.close()
            
    //     })

    // })
          $('#guru').on('show.modal', function(e){
            const btn = $(e.relatedTarget)
            // console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const nama = btn.data('nama')
            const nip = btn.data('nip')
            const jenisKelamin = btn.data('jenisKelamin')
            const tempatLahir = btn.data('tempatLahir')
            const tanggalLahir = btn.data('tanggalLahir')
            const nik = btn.data('nik')
            const agama = btn.data('agama')       
            const alamat = btn.data('alamat')       
            const isActive = btn.data('isActive')       
            const isDeleted = btn.data('isDeleted')       
            const id = btn.data('id')
            const modal = $(this)
            
            if(mode === 'edit'){
              modal.find('.modal-title').text('Edit Data guru')
              modal.find('#nama').val(nama)
              modal.find('#nip').val(nip)
              modal.find('#jenisKelamin').val(jenisKelamin)
              modal.find('#tempatLahir').val(tempatLahir)
              modal.find('#tanggalLahir').val(tanggalLahir)
              modal.find('#nik').val(nik)
              modal.find('#agama').val(agama)
              modal.find('#alamat').val(alamat)
              modal.find('#isActive').val(isActive)
              modal.find('#isDelete').val(isDelete)
              modal.find('.modal-body form').attr('action',`{{ url("guru") }}/${id}`)
              modal.find('#method').html('@method("PATCH")')
            }else{
              modal.find('.modal-title').text('Input Data guru')
              modal.find('#nama').val('')
              modal.find('#nip').val('')
              modal.find('#jenisKelamin').val('')
              modal.find('#tempatLahir').val('')
              modal.find('#tanggalLahir').val('')
              modal.find('#nik').val('')
              modal.find('#agama').val('')
              modal.find('#alamat').val('')
              modal.find('#isActive').val('')
              modal.find('#isDelete').val('')
              modal.find('#method').html('')
              modal.find('.modal-body form').attr('action', '{{ url("guru") }}')
          
            }

          })
  </script>
@endpush