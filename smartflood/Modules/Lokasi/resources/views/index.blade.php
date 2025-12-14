@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Data Lokasi Sensor</h3>

    <table class="table table-bordered" id="table-lokasi">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lokasi</th>
                <th>Latitude</th>
                <th>Longitude</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
$(function () {
    $.get("{{ url('/lokasi/get-data') }}", function(res){
        let html = '';
        res.data.forEach((item, i) => {
            html += `
                <tr>
                    <td>${i+1}</td>
                    <td>${item.nama_lokasi}</td>
                    <td>${item.latitude}</td>
                    <td>${item.longitude}</td>
                </tr>
            `;
        });
        $('#table-lokasi tbody').html(html);
    });
});
</script>
@endpush
