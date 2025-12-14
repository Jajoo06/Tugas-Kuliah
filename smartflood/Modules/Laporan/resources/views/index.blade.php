@extends('layouts.main')

@section('content')
<div class="card shadow">
    <div class="card-header bg-danger text-white">
        <h5>Laporan Banjir</h5>
    </div>

    <div class="card-body">
        <form id="form-laporan" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Lokasi Sensor</label>
                <select name="lokasi_sensor_id" class="form-control" required>
                    <option value="">-- Pilih Lokasi --</option>
                    @foreach($lokasi as $l)
                        <option value="{{ $l->id }}">{{ $l->nama_lokasi }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Ketinggian Air (cm)</label>
                <input type="number" name="ketinggian_air" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label>Foto Bukti</label>
                <input type="file" name="foto_bukti" class="form-control">
            </div>

            <button class="btn btn-primary">Kirim Laporan</button>
        </form>
    </div>
</div>

<div class="card shadow mt-4">
    <div class="card-header">
        <h5>Daftar Laporan</h5>
    </div>

    <div class="card-body">
        <table class="table table-bordered" id="table-laporan">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Lokasi</th>
                    <th>Ketinggian</th>
                    <th>Status</th>
                    <th>Bukti</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function(){
    loadData();

    $('#form-laporan').submit(function(e){
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url:'/laporan',
            method:'POST',
            data:formData,
            processData:false,
            contentType:false,
            success:function(res){
                alert(res.message);
                $('#form-laporan')[0].reset();
                loadData();
            }
        });
    });
});

function loadData(){
    $.get('/laporan/get-data', function(res){
        let html = '';
        $.each(res.data, function(i, item){
            html += `
            <tr>
                <td>${i+1}</td>
                <td>${item.lokasi_sensor_id}</td>
                <td>${item.ketinggian_air} cm</td>
                <td>
                    <span class="badge bg-${item.status_risiko=='Bahaya'?'danger':(item.status_risiko=='Siaga'?'warning':'success')}">
                        ${item.status_risiko}
                    </span>
                </td>
                <td>
                    ${item.foto_bukti ? `<a href="/storage/${item.foto_bukti}" target="_blank">Lihat</a>` : '-'}
                </td>
                <td>
                    <button class="btn btn-danger btn-sm" onclick="hapus(${item.id})">Hapus</button>
                </td>
            </tr>`;
        });
        $('#table-laporan tbody').html(html);
    });
}

function hapus(id){
    if(confirm('Hapus laporan ini?')){
        $.ajax({
            url:'/laporan/'+id,
            method:'DELETE',
            data:{ _token:$('meta[name="csrf-token"]').attr('content') },
            success:function(res){
                alert(res.message);
                loadData();
            }
        });
    }
}
</script>
@endpush
