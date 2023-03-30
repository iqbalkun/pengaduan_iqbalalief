<!-- Modal -->
<div class="modal fade" id="laporanbug" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">create data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- awal --}}
                <form action="laporanbug" method="POST">
                    @csrf
                    <div id="method"></div>
                    <div class="card">
                        <div class="card-header">

                            <div class="row">
                                <div class="col">
                                    <label for="disabledTextInput">JENIS</label>
                                    <select class="form-select col" aria-label="Default select example" id="jenis"
                                        name="jenis">
                                        <option selected class="col-sm-4 col-form-label">Jenis bug</option>
                                        <option value="funcional_errorr">funcional_errorr</option>
                                        <option value="performance_defects">performance_defects</option>
                                        <option value="usability_defects">usability_defects</option>
                                        <option value="compatibility_erorr">compatibility_erorr</option>
                                        <option value="security_erorr">security_erorr</option>
                                        <option value="syntax_erorr">syntax_erorr</option>
                                        <option value="logic_erorr">logic_erorr</option>
                                    </select>
                                    <div class="form-group">
                                        <label for="disabledTextInput">DESKRIPSI</label>
                                        <input type="text" id="deskripsi" class="form-control" name="deskripsi">
                                    </div>

                                    <div class="form-group">
                                        <label for="disabledTextInput">TGL KEJADIAN</label>
                                        <input type="date" id="tgl_kejadian" class="form-control"
                                            name="tgl_kejadian">
                                    </div>
                                    <div class="form-group">
                                        <label for="disabledTextInput">PELAPOR</label>
                                        <input type="text" id="pelapor" class="form-control" name="pelapor">
                                    </div>
                                    <label for="disabledTextInput">STATUS</label>
                                    <select class="form-select col" aria-label="Default select example" id="status"
                                        name="status">
                                        <option selected class="col-sm-4 col-form-label">Open this select menu</option>
                                        <option value="reported">reported</option>
                                        <option value="on_progres">on_progres</option>
                                        <option value="solved">solved</option>
                                    </select>
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
