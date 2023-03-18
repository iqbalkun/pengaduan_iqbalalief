@extends('template.layout')

@push('css')
    
@endpush

@section('isi')
{{-- card body --}}

<section class="content">
    <div class="card">
      <h5 class="card-header">Form</h5>
      <div class="card-body">
        <form method="post" action="cucian" id="form-cucian">
          <div class="form-group row">
            <label for="nama-produk" class="col-sm-4 col-form-label">No Transaksi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="id" placeholder="ID" name="id" autofocus>
            </div>
          </div>
          <div class="row">
          <div class="form-group row">
            <label for="nama-produk" class="col-sm-4 col-form-label">No. HP/WA</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nophone" placeholder="nophone" name="nophone" autofocus>
            </div>
          </div>
          <div class="form-group row">
            <label for="nama-produk" class="col-sm-4 col-form-label">Jenis Cucian</label>
            <div class="col-sm-10">
              <select class="form-control" name="jenisCucian" id="jenisCucian">
                <option value="standar">Standar</option>
                <option value="expresh">Expresh</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="nama-produk" class="col-sm-4 col-form-label">Nama Pelanggan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama" placeholder="Nama Pelanggan" name="nama" autofocus>
            </div>
          </div>
          <div class="form-group row">
            <label for="nama-produk" class="col-sm-4 col-form-label">Tanggal cuci</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="tgl" name="tgl" placeholder="tgl">
            </div>
        </div>
          <div class="form-group col">
            <label for="berat" class="col-sm-4 col-form-label">Berat</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="berat" name="berat" min="1" step="1" required>
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
      <div class="table-responsive">
        <table class="table table-compact table-stripped table-bordered" id="data-cucian">
          <thead>
            <tr>
              <th>No Transaksi</th>
              <th>Nama Pelanggan</th>
              <th>No.HP/WA</th>
              <th>Tanggal Cuci</th>
              <th>jenis Cucian</th>
              <th>Berat</th>
              <th>Diskon</th>
              <th>Total Harga</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="6" align="center"> blom ada data</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </section>
  
  {{-- java script --}}
  @endsection
  
  @push('js')
  <script>
    function insertData(datacucian){
         const data = $('#form-cucian').serializeArray()
         // console.log(data)
   
         let newData = {}
         data.forEach(function(item, index){
           let name = item['name']
           let value = (name === 'id' || name == 'berat'? Number(item['value']) : item['value'])
           newData[name] = value
         })
         console.log(newData)
   
         localStorage.setItem('datacucian', JSON.stringify([...datacucian, newData]))
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
           return row = `<tr><td colspan="6" align="center">Belum ada data</td></tr>`
         }
         let jumlah_berat = jumlah_diskon = jumlah_total = 0
         arr.forEach(function(item, index){
            let harga = item['jenisCucian'] = 'standar' ? 7500 : 10000
            let jumlah_harga = harga * item['berat']
            let diskon = jumlah_harga > 5000 ? harga * 0.1 : 0
            let total = jumlah_harga - diskon

            jumlah_berat += item['berat']
            jumlah_diskon += diskon
            jumlah_total += total



           row += `<tr>`
           row += `<td class="text-center">${item['id']}</td>`
           row += `<td class="text-center">${item['nama']}</td>`
           row += `<td class="text-center">${item['nophone']}</td>`
           row += `<td class="text-center">${item['tgl']}</td>`
           row += `<td class="text-center">${item['jenisCucian']}</td>`
           row += `<td class="text-center">${item['berat']}</td>`
           row += `<td class="text-center">${diskon}</td>`
           row += `<td class="text-center">${total}</td>`
           row += `</tr>`

         })
         row += `<tr class="bg-light font-weight-bold">`
           row += `<td colspan="5" class="text-center"> jumlah total </td>`
           row += `<td class="text-center">${jumlah_berat}</td>`
           row += `<td class="text-center">${jumlah_diskon}</td>`
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
       let datacucian = JSON.parse(localStorage.getItem('datacucian')) || []
       $('#data-cucian tbody').html(showData(datacucian))
   
      //event klik input data
      $('#btn-insert').on('click',function(){
           datacucian.push(insertData(datacucian)) 
           $('#data-cucian tbody').html(showData(datacucian))
         })
   
      //event klik sorting
      $('#btn-sorting').on('click',function(){
          datacucian = sorting(datacucian, 'nama')
  
          $('#data-cucian tbody').html(showData(datacucian))
        })
  
       //event klik searching
        $('#btn-search').on('click',function(){
          let teksSearch = $('#teks-cari').val()
          let id = searching(datacucian,'nama', teksSearch)
          let data = []
          if(id >= 0)
            data.push(datacucian[id])
          console.log(id)
          console.log(data)
          $('#data-cucian tbody').html(showData(data))
        })
   
     })
  </script>
@endpush