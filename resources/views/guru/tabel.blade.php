
<table class="table align-items-center justify-content-center mb-0">

    <thead>
    <tr>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NO</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NAMA</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIP</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">JENIS KELAMIN</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TEMPAT LAHIR</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TANGGAL LAHIR</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIK</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">AGAMA</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ALAMAT</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">IsActive</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">IsDeleted</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ACTION</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($guru as $item)
        <tr>
            <th scope="row">{{ $i =!isset($i)?$i=1:++$i }}</th>
            <td class="text-uppercase text-secondary text-xxs font-weight-bolder" >{{ $item->nama }}</td>
            <td class="text-uppercase text-secondary text-xxs font-weight-bolder">{{ $item->nip }}</td>
            <td class="text-uppercase text-secondary text-xxs font-weight-bolder">{{ $item->jenisKelamin }}</td>
            <td class="text-uppercase text-secondary text-xxs font-weight-bolder">{{ $item->tempatLahir }}</td>
            <td class="text-uppercase text-secondary text-xxs font-weight-bolder">{{ $item->tanggalLahir }}</td>
            <td class="text-uppercase text-secondary text-xxs font-weight-bolder">{{ $item->nik }}</td>
            <td class="text-uppercase text-secondary text-xxs font-weight-bolder">{{ $item->agama }}</td>
            <td class="text-uppercase text-secondary text-xxs font-weight-bolder">{{ $item->alamat }}</td>
            <td class="text-uppercase text-secondary text-xxs font-weight-bolder">{{ $item->isActive }}</td>
            <td class="text-uppercase text-secondary text-xxs font-weight-bolder">{{ $item->isDeleted }}</td>
            <td> 
                <div class="col d-flex  ">
                    <form action="{{ route('guru.destroy', $item->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="col-auto my-1 d-flex justify-content-end m-2 ">
                            <button type="submit"" class="btn btn-danger"  title="remove">DELETE</button>
                        </div>
                     </form>
                    <div class="col-auto my-1 d-flex justify-content-end m-2 ">
                        <button type="button" data-bs-toggle="modal" class="btn btn-success" data-bs-target="#TblpengaduanModal" title="collapse">EDIT</button>
                    </div>
                </div>
            </td>
    </tr>    
        @endforeach

    </tbody>
</table>