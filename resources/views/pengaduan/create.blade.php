
    <form action="pengaduan" method="POST"  enctype="multipart/form-data" >
      @csrf
      <div class="card">
        <div class="card-header">
          
          <div class="row">
  
            <div class="col">
              <div class="form-group">
                <label for="disabledTextInput">NIK</label>
                <input type="text" id="nik" class="form-control" name="nik" value="{{ auth()->user()->nik }}" readonly >
              </div>
            </div>
            <div class="form-group">
              <label for="disabledTextInput">tanggal pengaduan</label>
              <input type="date" id="tgl_pengaduan" class="form-control w-30" name="tgl_pengaduan">
            </div>

          <div class="mb-3">
            <label for="disabledTextInput" name="jenis_pengaduan" id="jenis_pengaduan">Jenis pengaduan </label>
              <select class="form-select w-30" aria-label="Default select example"  name="jenis_pengaduan" id="jenis_pengaduan">
                <option selected>jenis pengaduan</option>
                <option value="jalan">jalan</option>
                <option value="bantuan">bantuan</option>
                <option value="kemacetan">kemacetan</option>
                <option value="bencana">bencana</option>
                <option value="dana">dana</option>
              </select>
          </div>

            <div class="mb-3">
              <label for="formFile" class="form-label">Default file input example</label>
              <input class="form-control w-30" type="file" id="foto" name="foto">
            </div>
    
    
          <textarea name="isi_laporan" id="isi_laporan" cols="30" rows="10" class="form-control pe-3 mb-3 " ></textarea>
          <div class="row">
              <div class="col d-flex ">
              <div class="col">
                <div class="col-auto my-1 d-flex justify-content-end m-2 ">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
          </div>
        </div>
    
      </div>
  </form>
  </div>
</div>
