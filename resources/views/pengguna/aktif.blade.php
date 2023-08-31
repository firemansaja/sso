@extends("template.admin")

@section("title", "Daftar Pengguna Aktif")
@section("pengguna", aktif)
@section("pengguna.aktif", aktif)
@section("content.header", "Daftar Pengguna Aktif")

@push('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box no-border">
                <div class="box-body table-responsive">
                    <table class="table" id="pengguna">
                        <thead class="bg-navy">
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Kelas</th>
                                <th>Username</th>
                                <th>Passowrd</th>
                                <th>Peran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($daftar_pengguna as $pengguna)
                                @php $password = ($pengguna->password_str == null) ? "Dapodik" : $pengguna->password_str @endphp
                                @php $warna = ($pengguna->password_str == null) ? "text-red" : "" @endphp
                                <tr>
                                    <td align="center">{{ $nomor++ }}</td>
                                    <td>{{ $pengguna->nama }}</td>
                                    <td align="center">{{ ($pengguna->peserta_didik_id != null) ? rombel_saat_ini($pengguna->peserta_didik_id) : "PTK" }}</td>
                                    <td>{{ $pengguna->username }}</td>
                                    <td align="center" class="{{ $warna }}">{{ $password }}</td>
                                    <td align="center">{{ $pengguna->peran_id_str }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-navy">
                            <tr>
                                <th colspan="6"></th>
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
