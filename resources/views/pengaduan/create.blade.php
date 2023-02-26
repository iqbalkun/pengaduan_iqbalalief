<form action="{{ route('simpan_pengaduan')}} " method="POST" >
    {{ csrf_field() }}
    <div class="card">
      <div class="card-header">
        
        <div class="row">
          <div class="col">
            <label class="form-label" for="inlineFormCustomSelect">Jenis Pengaduan</label>
            <select class="form-select custom-select mr-sm-2 w-70 p-2" id="jenis_pengaduan" name="jenis_pengaduan" >
              <option selected>Pilih...</option>
              <option value="jalan" id="jalan">Jalan</option>
              <option value="bantuan" id="bantuan">Bantuan</option>
              <option value="kemacetan" id="kemacetan">Kemacetan</option>
              <option value="bencana" id="bencana">Bencana</option>
              <option value="dan_lain-lain" id="dan_lain-lain">Dan lain-lain</option>
            </select>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="disabledTextInput">NIK</label>
              <input type="text" id="nik" class="form-control" name="nik" placeholder="{{ auth()->user()->nik }}" disabled >
            </div>
          </div>
          <div class="col d-flex justify-content-end">
            <button type="submit" class="btn btn-danger w-250 p-2  d-flex">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path fill="currentColor" d="M18 22H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h7a.104.104 0 0 1 .027 0h.006a.15.15 0 0 0 .029.006c.088.006.175.023.259.051h.042a.421.421 0 0 1 .052.043a.988.988 0 0 1 .293.2l6 6a.987.987 0 0 1 .2.293a.735.735 0 0 1 .023.066l.01.028c.028.083.044.17.049.258a.1.1 0 0 0 .007.029v.006A.112.112 0 0 1 20 9v11a2 2 0 0 1-2 2Zm-3.576-8v5h.94v-2.04h1.46v-.838h-1.46v-1.281H17V14h-2.576Zm-3.7 0v5h1.206a1.67 1.67 0 0 0 1.332-.56a2.3 2.3 0 0 0 .486-1.549v-.81a2.287 2.287 0 0 0-.5-1.526c-.325-.37-.8-.574-1.293-.555h-1.231ZM7 14v5h.94v-1.759h.626c.418.023.826-.132 1.124-.426a1.62 1.62 0 0 0 .41-1.16a1.725 1.725 0 0 0-.412-1.194A1.4 1.4 0 0 0 8.585 14H7Zm6-10v5h5l-5-5Zm-1.054 14.162h-.282v-3.321h.342a.716.716 0 0 1 .62.292c.147.303.21.64.182.976v.869c.022.32-.047.64-.2.921a.765.765 0 0 1-.662.263ZM8.585 16.4h-.646v-1.559h.655a.475.475 0 0 1 .4.227c.108.179.16.385.15.594a.89.89 0 0 1-.147.55a.5.5 0 0 1-.412.188Z"/></svg>
              UPLOAD PDF
            </button>
          </div>
        </div>
      </div>
  
  
        <textarea name="isi_laporan" id="isi_laporan" cols="30" rows="10" class="form-control pe-3" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Et explicabo quod odio voluptate sequi laudantium eveniet. Deserunt pariatur enim sed ipsum quod! Earum voluptate amet, cumque veniam natus, inventore eos dolorum officia, culpa provident ex dignissimos eveniet id in maiores? Odit quae adipisci est accusamus? Maiores vel deserunt consectetur sequi!</textarea>
        <div class="row">
            <div class="col d-flex ">
              <div class="col-auto my-1 m-2">
              <button type="submit" id="foto" class="btn btn-secondary">Upload Image</button>
            </div>
            <div class="col">
              <div class="col-auto my-1 d-flex justify-content-end m-2 ">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
      </div>
  
    </div>
  </form>