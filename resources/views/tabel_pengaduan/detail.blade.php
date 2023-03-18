<!-- Modal -->
@foreach ($pengaduan as $item)
<div class="modal fade" id="TblpengaduanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


            <div class="row">
                <div class="col">
                  <div class="d-flex">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{ Auth()->user()->name }}</h6>
                      <p class="text-xs text-secondary mb-0">{{ Auth()->user()->email }}</p>
                    </div>
                  </div>
                </div>
                <div class="col d-flex justify-content-end">
                  
                </div>
                <textarea name="isi_pengaduan" id="isi_pengaduan" cols="30" rows="10" class="form-control mt-3" disabled>{{ $item->isi_laporan }}</textarea>
              </div>
{{-- 
        </div>
        <h5>DATA</h5>
        <textarea name="" id="" cols="30" rows="10" class="form-control mt-3" disabled>{{ $item->isi_laporan }}</textarea>
      </div> --}}

        </div>
       
      </div>
    </div>
  </div>
  @endforeach
  @push('js')

  
  <script>
    const jenisPengaduan = document.getElementById("jenis_pengaduan");
const isiLaporan = document.getElementById("isi_laporan");
  </script>
    
@endpush
