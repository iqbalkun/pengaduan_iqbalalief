<!-- Modal -->
<div class="modal fade" id="modalPetugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="petugaz" method="POST" >
          @csrf
          <div class="card">
            <div class="card-header">

              <div class="row">
                <div class="col">
                  {{-- awal modal --}}
                  <div class="form-group">
                    <label for="disabledTextInput">Id Petugas</label>
                    <input type="text" id="idPetugas" class="form-control" name="idPetugas"  >
                  </div>
                  <div class="form-group">
                    <label for="disabledTextInput">Nama Petugas</label>
                    <input type="text" id="namaPetugas" class="form-control" name="namaPetugas"  >
                  </div>
                  <div class="form-group">
                    <label for="disabledTextInput">Username</label>
                    <input type="text" id="username" class="form-control" name="username"  >
                  </div>
                  <div class="form-group">
                    <label for="disabledTextInput">Password</label>
                    <input type="password" id="password" class="form-control" name="password"  >
                  </div>
                  <div class="form-group">
                    <label for="disabledTextInput">No Telp</label>
                    <input type="number" id="telp" class="form-control" name="telp"  >
                  </div>
                  <div class="form-group">
                    <label for="disabledTextInput">Email</label>
                    <input type="email" id="telp" class="form-control" name="email"  >
                  </div>
                </div>
              </div>
            </div>
        {{-- akhir modal --}}
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>