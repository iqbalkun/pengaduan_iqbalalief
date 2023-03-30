<div class="modal fade" id="formlaporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
   <div class="modal-dialog" role= "document">
    <div class= "modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Import Data laporan</h5>
         <button type="button" class="close" data-dismiss= "modal" aria-label="Close">
           <span aria-hidden= "true"></span>
        </button>
       </div>
       <div class= "modal-body">
         <form method="POST" action="{{  url(request()->segment(1).'/import') }}" enctype="multipart/form-data">
        @csrf
             <div class="card-body">
               <div class="form-group">
                     <label for="jenis">File Excel</label>
                     <input type="file" name="import" id="import">
                 </div>
             </div>
       </div>
       <div class= "modal-footer">
         <button type= "button" class="btn btn-secondary" data-dismiss="modal"">Close</button>
         <button type= "submit" class="btn btn-primary" id="btn-submit">Upload</button>
       </div>
     </div>
    </form>
   </div>
 </div>
 
        {{-- delete --}}
        <div class="modal fade" id="confrmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        apakah lapran <b id="data-dihapus"></b> akan di hapusss...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">tidak</button>
        <button type="submit" class="btn btn-primary" id="btn-ya">&nbsp;ya&nbsp;</button>
      </div>
    </div>
  </div>
</div>

 