@extends('template.layout')
@include('kehadiran.form')
@include('kehadiran.import')

@push('css')
@endpush

@section('isi')
    <div class="card">
        <div class="card-header">
            <h5 class="card-header">Cek Kehadiran</h5>
        </div>
        <div class="card-body">
            <div class="mt-2 mb-2">
                <div class="form-group row mt-2">
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-primary" id="btn-tambah" name="btn-tambah" data-bs-toggle="modal"
                            data-bs-target="#modalTambah"> + Tambah Data</button>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#formImport">
                            import
                            Data</button>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ route('export-kehadiran') }}" class="btn btn-success ">
                            <i class="fa fa-file-excel"></i>export
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <input type="search" class="form-control" id="teks-cari">
                    </div>
                    <div class="col-sm-2">
                        <button type="button" id="btn-search" class="btn btn-secondary">Cari</button>
                    </div>
                </div>
                <table class="table table-compact table-stripped table-bordered" id="data-pegawai">
                    <thead>
                        <tr>
                            <th class="bg-light font-weight-bold">no</th>
                            <th class="bg-light font-weight-bold">Nama Karyawan</th>
                            <th class="bg-light font-weight-bold">Tanggal Masuk</th>
                            <th class="bg-light font-weight-bold">waktu masuk</th>
                            <th class="bg-light font-weight-bold">status</th>
                            <th class="bg-light font-weight-bold">waktu selesai kerja</th>
                            <th class="bg-light font-weight-bold">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kehadiran as $item)
                            <tr>
                                <th class=" font-weight-bold"scope="row">{{ $i = !isset($i) ? ($i = 1) : ++$i }}</th>
                                <th class=" font-weight-bold">{{ $item->namaKaryawan }}</th>
                                <th class=" font-weight-bold">{{ $item->tanggalMasuk }}</th>
                                <th class=" font-weight-bold">{{ $item->waktuMasuk }}</th>
                                <th class=" font-weight-bold">{{ $item->status }}</th>
                                <th class=" font-weight-bold">{{ $item->waktuKeluar }}</th>
                                <th class=" font-weight-bold">


                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" title="edit"
                                        data-bs-target="#modalTambah" data-mode="edit" 
                                        data-id="{{ $item->id }}"
                                        data-nama_karyawan="{{ $item->namaKaryawan }}"
                                        data-tanggal_masuk="{{ $item->tanggalMasuk }}"
                                        data-waktu_masuk="{{ $item->waktuMasuk }}" 
                                        data-status_masuk="{{ $item->status }}"
                                        data-Waktu_keluar="{{ $item->waktuKeluar }}">edit</button>


                                    <form action="{{ route('kehadiran.destroy', $item->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <div class="col-auto   ">
                                            <button type="submit" class="btn btn-danger" title="remove">DELETE</button>
                                        </div>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </section>

        {{-- java script --}}
    @endsection

    @push('js')
        <script>
            $('#modaltambah').on('show.bs.modal', function(e) {
                const btn = $(e.relatedTarget)
                const modal = $(this)
                const mode = btn.data('mode')
                const id = btn.data('id')
                const nama_karyawan = btn.data('nama_karyawan')
                const tanggal_masuk = btn.data('tanggal_masuk')
                const waktu_masuk = btn.data('waktu_masuk')
                const status = btn.data('status_masuk')
                const waktu_keluar = btn.data('waktu_keluar')
              
                if (mode === 'edit') {
   modal.find('.modal-title').text('Edit Data')
   modal.find('.btn-update').text('Update')
   modal.find('#namaKaryawan').val(nama_karyawan)
   modal.find('#tanggalMasuk').val(tanggal_masuk)
   modal.find('#waktuMasuk').val(waktu_masuk)
   modal.find('#status').val(status)
   modal.find('#waktuKeluar').val(waktu_keluar)
   modal.find('#method').html('@method('PATCH')')
   modal.find('form').attr('action', `{{ url('kehadiran') }}/${id}`)
} else {
   modal.find('.modal-title').text('Form Absensi')
   modal.find('.btn-update').text('Simpan')
   modal.find('#namaKaryawan').val('')
   modal.find('#tanggalMasuk').val('')
   modal.find('#waktuMasuk').val('')
   modal.find('#status').val('')
   modal.find('#waktuKeluar').val('')
   modal.find('#method').html('')
   modal.find('form').attr('action', '{{ url('kehadiran') }}')
}
            })
        </script>
    @endpush
