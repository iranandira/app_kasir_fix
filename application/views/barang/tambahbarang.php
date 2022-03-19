<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
</head>
<body>
    <center>
        <br>
    <h1>Tambah Barang</h1>
    <form action="<?=base_url('Home/simpanbarang') ?>" method="post">
        <table>
            <tr>
                <td>Nama Barang</td>
                <td>:</td>
                <td> <input type="text" name="nama_barang" id="nama_barang"> </td>
            </tr>

            <tr>
                <td>Kategori</td>
                <td>:</td>
                <td>
                    <select name="nama_kategori" id="nama_kategori">
                        <?php foreach($kategori as $ktr): ?>
                        <option value="<?=$ktr->pk_kategori_id ?>"><?=$ktr->nama_kategori ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Satuan</td>
                <td>:</td>
                <td>
                    <select name="nama_satuan" id="nama_satuan">
                        <?php foreach($satuan as $stn): ?>
                        <option value="<?=$stn->pk_satuan_id ?>"><?=$stn->nama_satuan ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td> <input type="number" name="harga" id="harga"> </td>
            </tr>

            <tr>
                <td>Stok</td>
                <td>:</td>
                <td> <input type="number" name="stok" id="stok"> </td>
            </tr>

            <tr>
                <td> <input type="submit" value="Tambah data" class="btn btn-sm btn-primary"> </td>
            </tr>
        </table>
        </center>
    </form>
</body>
</html>