@extends("template.admin")

@section("pengguna", aktif)
@section("pengguna.tidak-aktif", aktif)
@section("title", "Daftar Pengguna Tidak Aktif")
@section("content.header", "Daftar Pengguna Tidak Aktif")

@push('style')
    .table tbody tr td {padding-top: 3px; padding-bottom: 3px;}
@endpush

@push('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box no-border">
                <div class="box-body table-responsive">
                    <table class="table table-striped" id="pengguna">
                        <thead class="bg-navy">
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Nama Lengkap</th>
                                <th rowspan="2">Kelas</th>
                                <th rowspan="2">Username</th>
                                <th rowspan="2">Passowrd</th>
                                <th rowspan="2">Peran</th>
                                <th colspan="2">Keluar</th>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <th>Alasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($daftar_pengguna as $pengguna)
                                <tr>
                                    <td align="center">{{ $nomor++ }}</td>
                                    <td>{{ $pengguna->nama }}</td>
                                    <td align="center">{{ ($pengguna->peserta_didik_id != null) ? rombel_saat_ini($pengguna->peserta_didik_id) : "PTK" }}</td>
                                    <td>{{ $pengguna->username }}</td>
                                    <td>{{ $pengguna->password_str }}</td>
                                    <td align="center">{{ $pengguna->peran_id_str }}</td>
                                    <td align="center">{{ $pengguna->mutasi_pd->tanggal }}{{ $pengguna->mutasi_ptk->tanggal }}</td>
                                    <td>{{ $pengguna->mutasi_pd->alasan }}{{ $pengguna->mutasi_ptk->alasan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-navy">
                            <tr>
                                <th colspan="8"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endpush


@push("admin.javascript")
    <script>
        $(function() {
            $('#pengguna').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false,
                'pageLength'  : 100
            })
        })
    </script>
@endpush
