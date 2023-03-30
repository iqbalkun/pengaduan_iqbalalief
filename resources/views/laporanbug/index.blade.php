@extends('template.layout')
{{-- @include('guru.create') --}}


@push('css')
@endpush

@section('isi')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>LAPORAN BUG</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2 ">
                        <div class="table-responsive p-0 d-flex">
                            <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal"
                                data-bs-target="#laporanbug">tambah data </button>
                            <a href="{{ route('export-laporanbug') }}" class="btn btn-success m-3">
                                <i class="fa fa-file-excel"></i>export
                            </a>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#formlaporan"
                                class="btn btn-warning m-3">
                                <i class="fa fa-file-excel"></i> import
                            </button>
                            <div class="col-sm-4">
                                <input type="search" class="form-control" id="teks-cari">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" id="btn-search" class="btn btn-secondary">Cari</button>
                            </div>
                        </div>
                        @include('laporanbug.import')
                        @include('laporanbug.tabel')
                        @include('laporanbug.form')
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
        $('#laporanbug').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            const modal = $(this)
            const mode = btn.data('mode')
            const id = btn.data('id')
            const jenis = btn.data('jenis')
            const deskripsi = btn.data('deskripsi')
            const tgl_kejadian = btn.data('tgl_kejadian')
            const pelapor = btn.data('pelapor')
            const status = btn.data('status')

            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit Data')
                modal.find('.btn-update').text('Update')
                modal.find('#jenis').val(jenis)
                modal.find('#deskripsi').val(deskripsi)
                modal.find('#tgl_kejadian').val(tgl_kejadian)
                modal.find('#pelapor').val(pelapor)
                modal.find('#status').val(status)
                modal.find('#method').html('@method('PATCH')')
                modal.find('form').attr('action', `{{ url('laporanbug') }}/${id}`)
            } else {
                modal.find('.modal-title').text('Form laporan')
                modal.find('.btn-update').text('Simpan')
                modal.find('#jenis').val('')
                modal.find('#deskripsi').val('')
                modal.find('#tgl_kejadian').val('')
                modal.find('#pelapor').val('')
                modal.find('#status').val('')
                modal.find('#method').html('')
                modal.find('form').attr('action', '{{ url('laporanbug') }}')
            }
        })


        $('.remove').on('click', function(e) {
            e.preventDefault()
            const data = $(this).closest('tr').find('td:eq(1)').text()
            $('#data-dihapus').text(data)

            const form = $(this).closest('tr').find('form')
            $('#btn-ya').on('click', function() {
                form.submit()
            })
        })

        function searching(arr, key, teks) {
            for (let i = 0; i < arr.length; i++) {
                if (arr[i][key] == teks)
                    return i
            }
            return -1
        }

        //event cari
        $('#btn-search').on('click', function() {
            let teksSearch = $('#teks-cari').val()
            let id = searching(dataLaporan, 'barang', teksSearch)
            let data = []
            if (id >= 0)
                data.push(dataLaporan[id])
            console.log(id)
            console.log(data)
            $('#data-laporanbug tbody').html(showData(data))
        })
    </script>
@endpush
