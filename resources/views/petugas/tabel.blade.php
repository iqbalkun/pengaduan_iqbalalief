
<table class="table align-items-center justify-content-center mb-0">
    <thead>
    <tr>
        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">No</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id petugas</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Petugas</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor Telepon</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($petugaz as $item)
        <tr>
            <th  class="text-uppercase text-center text-secondary text-xxs font-weight-bolder"scope="row">{{ $i =!isset($i)?$i=1:++$i }}</th>
            <td class="text-uppercase text-secondary text-xxs font-weight-bolder" >202316030500{{ $item->idPetugas }}</td>
            <td class="text-uppercase text-secondary text-xxs font-weight-bolder" >{{ $item->namaPetugas }}</td>
            <td class="text-uppercase text-secondary text-xxs font-weight-bolder" >{{ $item->username }}</td>
            <td class="text-uppercase text-secondary text-xxs font-weight-bolder" >{{ $item->telp }}</td>
            <td class="text-uppercase text-secondary text-xxs font-weight-bolder" >{{ $item->email }}</td>
            <td> 
                <div class="col d-flex  ">
                    <div class="col-auto my-1 d-flex justify-content-end m-2 ">
                        <button type="button" data-bs-toggle="modal" class="btn btn-success" data-bs-target="//" title="collapse">EDIT</button>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>