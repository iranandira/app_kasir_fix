<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah member</title>
</head>
<body>
   <center>
       <br>
    <h1>Tambah member</h1>
    <form action="<?=base_url('Home/simpanmember') ?>" method="post">
        <table>
            <tr>
                <td>Nama member</td>
                <td>:</td>
                <td> <input type="text" name="nama_member" id="nama_member"> </td>
            </tr>

            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td> <input type="text" name="alamat" id="alamat"> </td>
            </tr>
            <tr>
                <td>No hp</td>
                <td>:</td>
                <td> <input type="number" name="no_hp" id="no_hp"> </td>
            </tr>
            <tr>
                <td>Tipe member</td>
                <td>:</td>
                <td>
                    <select name="tipe_member" id="tipe_member">
                        <option value="premium">Premium</option>
                        <option value="clasic">Clasic</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Dibuat pada</td>
                <td>:</td>
                <td> <input type="date" name="dibuat_pada" id="dibuat_pada"> </td>
            </tr>

            <tr>
                <td> <input type="submit" value="Tambah data" class="btn btn-sm btn-primary"> </td>
            </tr>
        </table>
    </form>
    </center>
</body>
</html>