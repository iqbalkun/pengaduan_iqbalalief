@extends('template.layout')
@push('css')
@endpush
@section('isi')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3>Simulasi Penjualan Baju Polos</h3>
            </div>
            <div class="card-body">
                <form method="post" action="transaksi" id="form-cucian">
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="id">No Transaksi</label>
                            <input type="text" class="form-control" id="transaksi" placeholder="transaksi"
                                name="transaksi" required>
                        </div>
                        <div class="form-group col-md-10">
                            <label for="nama">Tanggal Beli</label>
                            <input type="date" class="form-control" id="tanggal" placeholder="Tanggal Beli"
                                name="tanggal" required>
                        </div>
                    </div>
                    <div class="form-select-row col-md-10">
                        <label for="nama">warna baju</label>
                        <select class="form-select col" aria-label="Default select example" id="baju" name="baju">
                            <option value="merah">merah</option>
                            <option value="kuning">kuning</option>
                            <option value="putih">putih</option>
                        </select>
                    </div>
                    <div class="form-select-row col-md-10">
                        <label for="nama">Ukuran Baju</label>
                        <select class="form-select col" aria-label="Default select example" id="ukuran"name="ukuran">
                            <option value="s"data-harga="25000">s</option>
                            <option value="m"data-harga="30000">m</option>
                            <option value="l"data-harga="35000">l</option>
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="inputPassword4">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" placeholder="Jumlah" name="jumlah"
                                min="0" step="1" value="0" required>
                        </div>
                        <div class="form-group col-md-10">
                            <label for="inputPassword4">Nama Pembeli</label>
                            <input type="text" class="form-control" id="pembeli" placeholder="Pembeli" name="pembeli"
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="save" class="col-sm-4 col-form-label"></label>
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
                            <div class="form-check form-check-inline mt-1 ml-2">
                                <input class="form-check-input filter" type="checkbox" name="ukuran" id="ukurans"
                                    value="s">
                                <label class="form-check-label" for="us">s</label>
                            </div> &nbsp;
                            <div class="form-check form-check-inline mt-1">
                                <input class="form-check-input filter" type="checkbox" name="ukuran" id="ukuranm"
                                    value="m">
                                <label class="form-check-label" for="ukuranm">m</label>
                            </div>
                            <div class="form-check form-check-inline mt-1">
                                <input class="form-check-input filter" type="checkbox" name="ukuran" id="ukuranl"
                                    value="l">
                                <label class="form-check-label" for="ukuranl">l</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <input type="search" class="form-control" id="teks-cari">
                        </div>
                        <div class="col-sm-2">
                            <button type="button" id="btn-search" class="btn btn-secondary">Cari</button>
                        </div>
                    </div>
                    <table class="table table-bordered table-compact table-hover" id="data-cucian">
                        <thead>
                            <tr>
                                <th>No Transaksi</th>
                                <th>Tanggal Beli</th>
                                <th>Warna Baju</th>
                                <th>Ukuran </th>
                                <th>Harga </th>
                                <th>Jumlah </th>
                                <th>Nama Pembeli</th>
                                <th>Diskon</th>
                                <th>Total</th>
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
        function insertData(dataCucian) {
            const data = $('#form-cucian').serializeArray()

            // console.log(data)
            let newData = {} //mendefinisikan objek kosong
            data.forEach(function(item, index) { // panggil fungsi forEach() pada array data
                let name = item['name'] // isi variabel name dengan nilai properti 'name' dari item
                let value = name === 'transaksi' || name == 'jumlah' ? Number(item['value']) : item['value']
                // isi variabel value dengan nilai properti 'value' dari item, dan ubah menjadi tipe data angka jika name sama dengan 'transaksi' atau 'jumlah'
                newData[name] = value // tambahkan pasangan properti-nilai baru pada objek newData
            })
            console.log(newData)

            localStorage.setItem('dataCucian', JSON.stringify([...dataCucian, newData]))
            return newData
        }

        function showData(arr) {
            let row = ''

            if (arr.length == 0) {
                return row = `<tr><td colspan="8" align="center">Belum ada data</td></tr>`
            }

            let jmlBarang = jmlDiskon = jmlTotal = jmlBeli = 0
            arr.forEach(function(item, index) {
                let harga = item['ukuran'] === "s" ? 25000 : (item['ukuran'] === "m" ? 30000 : 35000);
                let jmlHarga = harga * item['jumlah']
                let diskon = item['jumlah'] >= 10 ? jmlHarga * 0.1 : 0
                let total = jmlHarga - diskon
                //Operator += dapat digunakan untuk memperpendek kode ketika kita ingin menambahkan nilai ke variabel yang sudah ada
                jmlBeli += harga
                jmlBarang += item['jumlah']
                jmlDiskon += diskon
                jmlTotal += total
                row += `<tr>`
                row += `<td>${item['transaksi']}</td>`
                row += `<td>${item['tanggal']}</td>`
                row += `<td>${item['baju']}</td>`
                row += `<td>${item['ukuran']}</td>`
                row += `<td>${harga}</td>`
                row += `<td>${item['jumlah']}</td>`
                row += `<td>${item['pembeli']}</td>`
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

        function sorting(arr, key) {
            let i, j, id, value;
            for (i = 1; i < arr.length; i++) {
                value = arr[i];
                id = arr[i][key]
                j = i - 1;
                while (j >= 0 && arr[j][key] > id) {
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

        function filter(arrays, key) {
            let filtered = []
            if (key.length == 0) {
                return arrays
            }
            key.forEach((i) => {
                x = arrays.filter(array => array['ukuran'] == i)
                filtered = [...filtered, ...x]
            })
            return filtered
        }

        $(function() {
            // initialize
            let dataCucian = JSON.parse(localStorage.getItem('dataCucian')) || []
            $('#data-cucian tbody').html(showData(dataCucian))

            //event klik input data
            $('#btn-insert').on('click', function() {
                //  e.prevantDefault()
                dataCucian.push(insertData(dataCucian))
                $('#data-cucian tbody').html(showData(dataCucian))
            })

            //event klik sorting
            $('#btn-sorting').on('click', function() {
                dataCucian = sorting(dataCucian, 'harga')

                $('#data-cucian tbody').html(showData(dataCucian))
            })

            //event klik searching
            $('#btn-search').on('click', function() {
                let teksSearch = $('#teks-cari').val()
                let id = searching(dataCucian, 'barang', teksSearch)
                let data = []
                if (id >= 0)
                    data.push(dataCucian[id])
                console.log(id)
                console.log(data)
                $('#data-cucian tbody').html(showData(data))
            })

            //ambil data dari element option
            $('#barang').on('change', function() {
                const harga = $('#barang option:selected').data('harga');

                $('[name=harga]').val(harga);
            })

            //filter 
            $('.filter').on('click', function() {
                const checked = [...document.querySelectorAll('.filter:checked')].map(e => e.value);
                const data = filter(dataCucian, checked)
                $('#data-cucian tbody').html(showData(data))
            })

        })
    </script>
@endpush
