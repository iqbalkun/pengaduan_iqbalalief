<div class="modal fade" id="formImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
   <div class="modal-dialog" role= "document">
    <div class= "modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Import Data Paket</h5>
         <button type="button" class="close" data-dismiss= "modal" aria-label="Close">
           <span aria-hidden= "true">6times;</span>
        </button>
       </div>
       <div class= "modal-body">
         <form method="POST" action="{{  url(request()->segment(1).'/guru/import') }}" enctype="multipart/form-data">
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
