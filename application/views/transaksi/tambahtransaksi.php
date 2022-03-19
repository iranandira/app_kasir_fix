<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah transaksi</title>
</head>
<body>
<center>
    <br>
    <h1>Tambah transaksi</h1>
    <form action="<?=base_url('Home/simpantransaksi') ?>" method="post">
        <table >
            <tr>
                <td>Tanggal Transaksi</td>
                <td>:</td>
                <td> <input type="date" name="tanggal_transaksi" id="tanggal_transaksi"> </td>
            </tr>

            <tr>
                <td>Tipe Konsumen</td>
                <td>:</td>
                <td> 
                    <select name="tipe_konsumen" id="tipe_konsumen">
                        <option value="umum">umum</option>
                        <option value="member">member</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Member_id</td>
                <td>:</td>
                <td> <input type="number" name="member_id" id="member_id"> </td>
            </tr>

            <tr>
                <td> <input type="submit" value="Selanjutnya" class="btn btn-sm btn-primary"> </td>
            </tr>
        </table>
    </form>
    </center>
</body>
</html>