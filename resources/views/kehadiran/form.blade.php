<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="kehadiran" method="post">
                    @csrf
                    <div id="method"></div>
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    {{-- awal modal --}}
                                    <div class="form-group">
                                        <label for="disabledTextInput">nama karyawan</label>
                                        <input type="text" id="namaKaryawan" class="form-control"
                                            name="namaKaryawan">
                                    </div>
                                    <div class="form-group">
                                        <label for="disabledTextInput">Tanggal Masuk</label>
                                        <input type="date" id="tanggalMasuk" class="form-control"
                                            name="tanggalMasuk">
                                    </div>
                                    <div class="form-group">
                                        <label for="disabledTextInput">Waktu Masuk</label>
                                        <input type="time" id="waktuMasuk" class="form-control" name="waktuMasuk">
                                    </div>
                                    <label for="disabledtextinput">status</label>
                                    <select class="form-select col" aria-label="Default select example" id="status" name="status">
                                        <option selected class="col-sm-4 col-form-label">Open this select menu</option>
                                        <option value="masuk">masuk</option>
                                        <option value="cuti">cuti</option>
                                        <option value="sakit">sakit</option>
                                    </select>
                                    <div class="form-group">
                                        <label for="disabledTextInput">waktu keluar</label>
                                        <input type="time" id="waktuKeluar" class="form-control" name="waktuKeluar">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btn-submit" name="btn-submit">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- hapus --}}
