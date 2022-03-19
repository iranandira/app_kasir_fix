<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data satuan</title>
</head>
<body>
    <center>
        <br>
    <h1>Data satuan</h1>
    <form action="<?= base_url('Home/simpansatuan')?>" method="post">
        <table>
            <tr>
                <td>Nama satuan</td>
                <td>:</td>
                <td> <input type="text" name="nama_satuan" id="nama_satuan"> </td>
            </tr>

            <tr>
                <td> <input type="submit" value="Tambah data" class="btn btn-sm btn-primary"> </td>
            </tr>
        </table>
    </form>
    </center>
</body>
</html>