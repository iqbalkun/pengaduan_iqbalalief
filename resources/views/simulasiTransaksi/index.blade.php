@extends('template.layout')
@push('css')
@endpush
@section('isi')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3>Simulasi Penjualan Aksesoris</h3>
            </div>
            <div class="card-body">
                <form method="post" action="simulasi" id="form-simulasi">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="id">Id</label>
                                <input type="text" class="form-control" id="id" placeholder="Id" name="id"
                                    required>
                            </div>

                            <label for="nama">barang </label>
                            <select class="form-select" aria-label="Default select example" id="barang" name="barang">
                                <option value="gantunganKunci">Gantungan Kunci</option>
                                <option value="ikatRambut">Ikat Rambut</option>
                            </select>
                            <div class="form-group">
                                <label for="inputPassword4">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" placeholder="Jumlah"
                                    name="jumlah" min="0" step="1" value="0" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="nama">Tanggal Beli</label>
                                <input type="date" class="form-control" id="tanggal" placeholder="Tanggal Beli"
                                    name="tanggal" required>
                            </div>
                            <div class="form-select-row">
                                <label for="nama">warna </label>
                                <select class="form-select col" aria-label="Default select example" id="warna"
                                    name="warna">
                                    <option value="merah">merah</option>
                                    <option value="biru">biru</option>
                                    <option value="kuning">kuning</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">nama Pembeli</label>
                                <input type="text" class="form-control" id="nama" placeholder="nama" name="nama"
                                    required let>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="save" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-2">
                                <button type="button" class="form-control btn btn-primary" id="btn-insert">Submit</button>
                            </div>
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
                        <div class="col-sm-4">
                            <input type="search" class="form-control" id="teks-cari">
                        </div>
                        <div class="col-sm-2">
                            <button type="button" id="btn-search" class="btn btn-secondary">Cari</button>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-success" id="btn-sorting">Urutkan</button>
                        </div>
                    </div>

                    <table class="table table-bordered table-compact table-hover" id="data-ujikom">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Tanggal Beli</th>
                                <th>barang</th>
                                <th>warna </th>
                                <th>harga </th>
                                <th>Jumlah beli</th>
                                <th>Nama Pelanggan</th>
                                <th>Diskon</th>
                                <th>Totalharga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="8" align="center">Belum Ada Data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

    </section>
@endsection

@push('js')
    <script>
        function insertData(dataAksesoris) {
            const data = $('#form-simulasi').serializeArray()

            // console.log(data)
            let newData = {} //mendefinisikan objek kosong
            data.forEach(function(item, index) { // panggil fungsi forEach() pada array data
                let name = item['name'] // isi variabel name dengan nilai properti 'name' dari item
                let value = name === 'simulasi' || name == 'jumlah' ? Number(item['value']) : item['value']
                // isi variabel value dengan nilai properti 'value' dari item, dan ubah menjadi tipe data angka jika name sama dengan 'transaksi' atau 'jumlah'
                newData[name] = value // tambahkan pasangan properti-nilai baru pada objek newData
            })
            console.log(newData)

            localStorage.setItem('dataAksesoris', JSON.stringify([...dataAksesoris, newData]))
            return newData
        }

        function showData(arr) {
            let row = ''

            if (arr.length == 0) {
                return row = `<tr><td colspan="8" align="center">Belum ada data</td></tr>`
            }

            let jmlBarang = jmlDiskon = jmlTotal = jmlBeli = 0
            arr.forEach(function(item, index) {
                let harga = (item['barang'] === "gantunganKunci" ? 5000 : 2500);
                let jmlHarga = harga * item['jumlah']
                let diskon = item['jumlah'] >= 10 ? jmlHarga * 0.2 : 0
                let total = jmlHarga - diskon
                //Operator += dapat digunakan untuk memperpendek kode ketika kita ingin menambahkan nilai ke variabel yang sudah ada
                jmlBeli += harga
                jmlBarang += item['jumlah']
                jmlDiskon += diskon
                jmlTotal += total
                row += `<tr>`
                row += `<td>${item['id']}</td>`
                row += `<td>${item['tanggal']}</td>`
                row += `<td>${item['barang']}</td>`
                row += `<td>${item['warna']}</td>`
                row += `<td>${harga}</td>`
                row += `<td>${item['jumlah']}</td>`
                row += `<td>${item['nama']}</td>`
                row += `<td>${diskon}</td>`
                row += `<td>${total}</td>`
                row += `</tr>`

            })
            row += '<tr style="font-weight:bold; background:#E9ECEF;color="black";>'
            row += `<td colspan="4">Jumlah Total</td>`
            row += `<td>${jmlBeli}</td>`
            row += `<td>${jmlBarang}</td>`
            row += `<td></td>`
            row += `<td>${jmlDiskon}</td>`
            row += `<td>${jmlTotal}</td>`
            row += '</tr>'
            return row
        }

        // function sorting(arr, key) {
        //     for (let i = 1; i < arr.length; i++) {
        //         let currentVal = arr[i];
        //         let j;
        //         for (j = i - 1; j >= 0 && arr[j].id > currentVal.id; j--) {
        //             arr[j + 1] = arr[j];
        //         }
        //         arr[j + 1] = currentVal;
        //     }
        //     return arr;
        // }

        function sorting(arr,key){
      let i, j, id, value; 
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


        function searching(arr, key, teks) {
            for (let i = 0; i < arr.length; i++) {
                if (arr[i][key] == teks)
                    return i
            }
            return -1
        }

        $(function() {
            // initialize
            let dataAksesoris = JSON.parse(localStorage.getItem('dataAksesoris')) || []
            $('#data-ujikom tbody').html(showData(dataAksesoris))

            //event klik input data
            $('#btn-insert').on('click', function() {
                //  e.prevantDefault()
                dataAksesoris.push(insertData(dataAksesoris))
                $('#data-ujikom tbody').html(showData(dataAksesoris))
            })

            //event klik sorting
            $('#btn-sorting').on('click', function() {
                dataAksesoris = sorting(dataAksesoris, 'id')

                $('#data-ujikom tbody').html(showData(dataAksesoris))
            })

            //event klik searching
            $('#btn-search').on('click', function() {
                let teksSearch = $('#teks-cari').val()
                let id = searching(dataAksesoris, 'barang', teksSearch)
                let data = []
                if (id >= 0)
                    data.push(dataAksesoris[id])
                console.log(id)
                console.log(data)
                $('#data-ujikom tbody').html(showData(data))
            })

            //ambil data dari element option
            $('#barang').on('change', function() {
                const harga = $('#barang option:selected').data('harga');

                $('[name=harga]').val(harga);
            })

            //filter 
            $('.filter').on('click', function() {
                const checked = [...document.querySelectorAll('.filter:checked')].map(e => e.value);
                const data = filter(dataAksesoris, checked)
                $('#data-ujikom tbody').html(showData(data))
            })

        })
    </script>
@endpush
