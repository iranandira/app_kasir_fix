<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kategori</title>
</head>
<body>
    <center>
        <br>
    <h1>Tambah Kategori</h1>
    <form action="<?=base_url('Home/simpankategori') ?>" method="post">
        <table>
            <tr>
                <td>Nama Kategori</td>
                <td>:</td>
                <td> <input type="text" name="nama_kategori" id="nama_kategori"> </td>
            </tr>

            <tr>
                <td> <input type="submit" value="Tambah data" class="btn btn-sm btn-primary"> </td>
            </tr>
        </table>
    </form>
    </center>
</body>
</html>