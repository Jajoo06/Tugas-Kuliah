@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Pendaftaran</h3>
                </div>

                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3"
                        data-bs-toggle="modal" data-bs-target="#floodmonitorModal">
                        <i class="fas fa-plus"></i> Tambah Data
                    </button>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="floodmonitor-table">
                            <thead class="thead-light">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama Lokasi</th>
                                    <th>Kecamatan</th>
                                    <th>Deskripsi</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data via AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Modal Form --}}
<div class="modal fade" id="floodmonitorModal" tabindex="-1"
    aria-labelledby="floodmonitorModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="floodmonitorModalLabel">Form Pendaftaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="floodmonitorForm">
                    @csrf
                    <input type="hidden" name="id" id="id">

                    <div class="mb-3">
                        <label for="nama_lokasi" class="form-label">
                            Nama Lokasi <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" required>
                        <div class="invalid-feedback" id="nama_lokasi-error"></div>
                    </div>

                    <div class="mb-3">
                        <label for="kecamatan" class="form-label">
                            Kecamatan <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="kecamatan"
                            name="kecamatan" required>
                        <div class="invalid-feedback" id="kecamatan-error"></div>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">
                            Deskripsi <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="deskripsi"
                            name="deskripsi" required>
                        <div class="invalid-feedback" id="deskripsi-error"></div>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Tutup
                </button>

                <button type="button" class="btn btn-primary" id="saveBtn">
                    <span class="submit-text">Simpan</span>
                    <span class="spinner-border spinner-border-sm d-none"
                        role="status"></span>
                </button>
            </div>

        </div>
    </div>
</div>
@endsection


@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<style>
    .table th, .table td {
        vertical-align: middle;
    }
    .invalid-feedback {
        display: block;
    }
</style>
@endpush


@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(function () {

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    loadData();

    // -------------------------------------------------------------------------
    // LOAD DATA
    // -------------------------------------------------------------------------
    function loadData() {
        $.ajax({
            url: "{{ route('floodmonitor.data') }}",
            type: "GET",
            dataType: "json",
            success: function (data) {

                let html = '';
                let no = 1;

                if (data.length) {
                    data.forEach(item => {
                        html += `
                            <tr>
                                <td>${no++}</td>
                                <td>${item.nama_lokasi}</td>
                                <td>${item.kecamatan}</td>
                                <td>${item.deskripsi}</td>
                                <td class="text-center">
                                    <button class="edit btn btn-warning btn-sm" data-id="${item.id}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <button class="delete btn btn-danger btn-sm" data-id="${item.id}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                } else {
                    html = `<tr><td colspan="5" class="text-center">Tidak ada data</td></tr>`;
                }

                $('#floodmonitor-table tbody').html(html);
            },
            error: function () {
                alert('Gagal memuat data. Silakan refresh halaman.');
            }
        });
    }

    // -------------------------------------------------------------------------
    // MODAL BEHAVIOR
    // -------------------------------------------------------------------------
    const modal = new bootstrap.Modal('#floodmonitorModal');

    $('#floodmonitorModal').on('hidden.bs.modal', function () {
        $('#floodmonitorForm')[0].reset();
        $('.invalid-feedback').text('');
        $('.is-invalid').removeClass('is-invalid');
        $('#id').val('');
    });

    // -------------------------------------------------------------------------
    // SAVE DATA
    // -------------------------------------------------------------------------
    $('#saveBtn').click(function () {

        const btn = $(this);
        btn.prop('disabled', true);
        btn.find('.submit-text').text('Menyimpan...');
        btn.find('.spinner-border').removeClass('d-none');

        $('.invalid-feedback').text('');
        $('.is-invalid').removeClass('is-invalid');

        $.ajax({
            url: "{{ route('floodmonitor.store') }}",
            type: "POST",
            data: $('#floodmonitorForm').serialize(),
            success: function (res) {
                if (res.success) {
                    modal.hide();
                    loadData();
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, val) {
                        $('#' + key).addClass('is-invalid');
                        $('#' + key + '-error').text(val[0]);
                    });
                } else {
                    alert("Terjadi kesalahan.");
                }
            },
            complete: function () {
                btn.prop('disabled', false);
                btn.find('.submit-text').text('Simpan');
                btn.find('.spinner-border').addClass('d-none');
            }
        });

    });

    // -------------------------------------------------------------------------
    // EDIT DATA
    // -------------------------------------------------------------------------
    $(document).on('click', '.edit', function () {
        const id = $(this).data('id');

        $.get("{{ route('floodmonitor.index') }}/" + id + "/edit", function (data) {
            $('#floodmonitorModalLabel').text("Edit floodmonitor");
            $('#id').val(data.id);
            $('#nama_lokasi').val(data.nama_lokasi || '');
            $('#kecamatan').val(data.kecamatan || '');
            $('#deskripsi').val(data.deskripsi || '');

            modal.show();
        }).fail(function () {
            alert("Gagal memuat data.");
        });
    });

    // -------------------------------------------------------------------------
    // HAPUS DATA
    // -------------------------------------------------------------------------
    $(document).on('click', '.delete', function () {

        const id = $(this).data('id');

        if (!confirm("Apakah Anda yakin ingin menghapus data ini?")) return;

        $.ajax({
            url: "{{ route('floodmonitor.index') }}/" + id,
            type: "DELETE",
            success: function (res) {
                if (res.success) loadData();
                else alert(res.message || 'Gagal menghapus data.');
            },
            error: function () {
                alert("Gagal menghapus data.");
            }
        });

    });

});
</script>
@endpush
