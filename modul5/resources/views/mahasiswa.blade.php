<!DOCTYPE html>
<html>
    <head>
        <title>Daftar Mahasiswa</title>
    </head>
    <body>
        <h2>Daftar Mahasiswa</h2>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>email</th>
                <th>Umur</th>
                <th>Jurusan</th>
            </tr>

            @foreach ($mahasiswa as $mhs)
            <tr>
                <td>{{ $mhs->id }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->email }}</td>
                <td>{{ $mhs->umur }}</td>
                <td>{{ $mhs->jurusan }}</td>
            </tr>                
            @endforeach
        </table>
    </body>
</html>