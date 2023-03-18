@extends('template.layout')

@push('css')
    
@endpush

@section('isi')
{{-- card body --}}

<section class="content">
    <div class="card">
      <h5 class="card-header">Featured</h5>
      <div class="card-body">
        <form method="post" id="form-pegawai">
          <div class="form-group row">
            <label for="nama-produk" class="col-sm-4 col-form-label">ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="id" placeholder="ID" name="id" autofocus>
            </div>
          </div>
          <div class="row">
          <div class="form-group col">
            <label for="nama-produk" class="col-sm-4 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" autofocus>
            </div>
          </div>
          <div class="form-group col">
            <label for="gaji" class="col-sm-4 col-form-label">gaji</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="gaji" placeholder="gaji" name="gaji" min="1000000" step="50000" required>
            </div>
          </div>
          <div class="form-group col">
            <label for="lembur" class="col-sm-4 col-form-label">lembur</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="lembur" placeholder="lembur" name="lembur" autofocus>
            </div>
          </div>
          </div>
          <div class="form-group col">
            <label for="jk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L">
                <label class="form-check-label" for="jk">Laki-Laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P">
                <label class="form-check-label" for="jk">Perempuan</label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="nama-produk" class="col-sm-4 col-form-label"></label>
            <div class="col-sm-2">
              <button type="button" class="form-control btn btn-primary" id="btn-insert">Submit</button>
          </div>
          </div>
          </form>
      </div>
    </div>
  
  <p></p>
  <div class="card">
    <div class="card-header">
      <h3>Data</h3>
    </div>
    <div class="card-body">
      <div class="mt-2 mb-2">
        <div class="form-group row mt-2">
          <div class="col-sm-2">
             <button type="button" class="btn btn-success" id="btn-sorting">Urutkan</button>  
          </div>
          <div class="col-sm-4">
            <input type="search" class="form-control" id="teks-cari">
          </div>
          <div class="col-sm-2">
            <button type="button"  id="btn-search" class="btn btn-secondary">Cari</button>
          </div>
      </div>
      <table class="table table-compact table-stripped table-bordered" id="data-pegawai">
        <thead>
          <tr>
            <th class="bg-light font-weight-bold">Id</th>
            <th class="bg-light font-weight-bold">Nama</th>
            <th class="bg-light font-weight-bold">Jenis Kelamin</th>
            <th class="bg-light font-weight-bold">Gaji</th>
            <th class="bg-light font-weight-bold">Lembur</th>
            <th class="bg-light font-weight-bold">Total gaji</th>
            <th class="bg-light font-weight-bold">Bonus</th>
            <th class="bg-light font-weight-bold">Pajak</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="3" align="center"> blom ada data</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  </section>
  
  {{-- java script --}}
  @endsection
  
  @push('js')
  <script>
    const harga_lembur = 100000

    function insertData(dataPegawai){
         const data = $('#form-pegawai').serializeArray()
         // console.log(data)
   
         let newData = {}
         data.forEach(function(item, index){
           let name = item['name']
           let value = (name === 'id' || name == 'gaji'|| name == 'lembur'? Number(item['value']) : item['value'])
           newData[name] = value
         })
         console.log(newData)
   
         localStorage.setItem('dataPegawai', JSON.stringify([...dataPegawai, newData]))
         return newData
       }
  
     function searcing(){
       console.log('cari')
     }
     function sorting(){
       console.log('sorting')
     }
   
     function showData(arr){
         let row = ''
         
         if(arr.length == 0){
           return row = `<tr><td colspan="8" align="center">Belum ada data</td></tr>`
         }
         let jumlah_gaji = jumlah_lembur = jumlah_total= jumlah_bonus = jumlah_pajak = bonus = pajak = 0
         arr.forEach(function(item, index){
            let bonus = item['lembur'] >= 10? item['gaji']* 0.5 :0
            let pajak = item['gaji'] * 0.1
            let total = item['gaji']+(item['lembur']*harga_lembur) + bonus - pajak
            jumlah_gaji += item['gaji']
            jumlah_lembur += item['lembur']
            jumlah_bonus += bonus
            jumlah_pajak += pajak
            jumlah_total += total



           row += `<tr>`
           row += `<td class="text-center">${item['id']}</td>`
           row += `<td class="text-center">${item['nama']}</td>`
           row += `<td class="text-center">${item['jenis_kelamin']}</td>`
           row += `<td class="text-center">${item['gaji']}</td>`
           row += `<td class="text-center">${item['lembur']}</td>`
           row += `<td class="text-center">${total}</td>`
           row += `<td class="text-center">${bonus}</td>`
           row += `<td class="text-center">${pajak}</td>`
           row += `</tr>`

         })
         row += `<tr class="bg-light font-weight-bold">`
           row += `<td colspan="3" class="text-center"> jumlah total </td>`
           row += `<td class="text-center">${jumlah_gaji}</td>`
           row += `<td class="text-center">${jumlah_lembur}</td>`
           row += `<td colspan="3" class="text-center">${jumlah_total}</td>`
           row += `</tr>` 
         
         return row
       }
  
       function sorting(arr,key){
        let i,  j, id, value; 
        for (i = 1; i < arr.length; i++)
        { 
            value = arr[i]; 
            id = arr[i][key]
            j = i - 1; 
            while (j >= 0 && arr[j][key] > id)
            { 
                arr[j + 1] = arr[j]; 
                j = j - 1;  
            } 
            arr[j + 1] = value; 
        } 
        return arr
      }
  
      function searching(arr, key, teks){
        for(let i= 0; i < arr.length; i++){
          if(arr[i][key] == teks)
            return i
          }
        return -1
      }
  
     $(function(){
       // initialize
       let dataPegawai = JSON.parse(localStorage.getItem('dataPegawai')) || []
       $('#data-pegawai tbody').html(showData(dataPegawai))
   
      //event klik input data
      $('#btn-insert').on('click',function(){
           dataPegawai.push(insertData(dataPegawai)) 
           $('#data-pegawai tbody').html(showData(dataPegawai))
         })
   
      //event klik sorting
      $('#btn-sorting').on('click',function(){
          dataPegawai = sorting(dataPegawai, 'nama')
  
          $('#data-pegawai tbody').html(showData(dataPegawai))
        })
  
       //event klik searching
        $('#btn-search').on('click',function(){
          let teksSearch = $('#teks-cari').val()
          let id = searching(dataPegawai,'nama', teksSearch)
          let data = []
          if(id >= 0)
            data.push(dataPegawai[id])
          console.log(id)
          console.log(data)
          $('#data-pegawai tbody').html(showData(data))
        })
   
     })
     </script>
@endpush