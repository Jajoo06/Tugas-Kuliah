<!DOCTYPE html>
<html>
    <head>
        <title>Form Biodata</title>
    </head>
    <body>
        <h2>Input Biodata</h2>
        <form action="/store" method="post">
            @csrf
            <label>Nama:</label>
            <input type="text" name="nama"><br><br>

            <label>No.telp:</label>
            <input type="number" name="telp"><br><br>

            <label>Tanggal:</label>
            <input type="date" name="tanggal"><br><br>

            <label>Deskripsi:</label>
            <textarea name="deskripsi"></textarea><br><br>

            <button type="submit">Kirim</button>
        </form>
    </body>
</html>