

  <!-- Modal -->
  <div class="modal fade" id="Guru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
{{-- awal --}}
<form action="guru" method="POST" >
    @csrf
    <div class="card">
      <div class="card-header">
        
        <div class="row">
          <div class="col">
                <div class="form-group">
                    <label for="disabledTextInput">NAMA</label>
                    <input type="text" id="nama" class="form-control" name="nama"  >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">NIP</label>
                    <input type="text" id="nip" class="form-control" name="nip"  >
                </div>
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">JenisKelamin</label>
                    <input type="text" id="jenisKelamin" class="form-control" name="jenisKelamin"  >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">TempatLahir</label>
                    <input type="text" id="tempatLahir" class="form-control" name="tempatLahir" >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">TanggalLahir</label>
                    <input type="date" id="tanggalLahir" class="form-control" name="tanggalLahir" >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">NIK</label>
                    <input type="text" id="nik" class="form-control" name="nik" >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">agama</label>
                    <input type="text" id="agama" class="form-control" name="agama"  >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">alamat</label>
                    <input type="text" id="alamat" class="form-control" name="alamat" >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">isActive</label>
                    <input type="number" id="isActive" class="form-control" name="isActive" >
                </div>
                <div class="form-group">
                    <label for="disabledTextInput">isDeleted</label>
                    <input type="number" id="isDeleted" class="form-control" name="isDeleted" >
                </div>
            </div>
            <div class="row">
                <div class="col d-flex ">
                 <div class="col">
                    <div class="col-auto my-1 d-flex justify-content-end m-2 ">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </form>

{{-- akhir --}}

    </div>
  </div>