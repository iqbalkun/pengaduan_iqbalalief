    <table class="table align-items-center justify-content-center mb-0" id="data-laporanbug">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NO</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">JENIS</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DESKRIPSI</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TGL KEJADIAN</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PELAPOR</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> STATUS</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporanBug as $item)
                <tr>
                    <th scope="row">{{ $i = !isset($i) ? ($i = 1) : ++$i }}</th>
                    <td class="text-uppercase text-secondary text-xxs font-weight-bolder">{{ $item->jenis }}</td>
                    <td class="text-uppercase text-secondary text-xxs font-weight-bolder">{{ $item->deskripsi }}</td>
                    <td class="text-uppercase text-secondary text-xxs font-weight-bolder">{{ $item->tgl_kejadian }}</td>
                    <td class="text-uppercase text-secondary text-xxs font-weight-bolder">{{ $item->pelapor }}</td>
                    <td class="text-uppercase text-secondary text-xxs font-weight-bolder">{{ $item->status }}</td>
                    <td>
                        <div class="col d-flex">
                            <form action="{{ route('laporanbug.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confrmDelete"
                                    title="hapus">DELETE</button>
                            </form>
                            <div class="col-auto my-1 d-flex justify-content-end m-2 ">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" title="edit"
                                    data-bs-target="#laporanbug" data-mode="edit" data-id="{{ $item->id }}"
                                    data-jenis="{{ $item->jenis }}" data-deskripsi="{{ $item->deskripsi }}"
                                    data-tgl_kejadian="{{ $item->tgl_kejadian }}" data-pelapor="{{ $item->pelapor }}"
                                    data-status="{{ $item->status }}">EDIT
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
