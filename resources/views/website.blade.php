@extends("template.admin")

@section("web", aktif)
@section("title", "Daftar Web")
@section("content.header", "Daftar Website")

@push('style')
    <style>
        .form-group label {
            line-height: 100%;
        }
        .table thead tr th {
            vertical-align: middle;
            text-align: center;
        }
        .table tbody tr td {
            vertical-align: middle;
            border-color: black;
        }
        .table tfoot tr th {
            padding: 2px;
        }
    </style>
@endpush

@push('content')
    {{ Form::open(["url" => route('admin.web.simpan.urutan')]) }}
    <div class="row marbot5">
        <div class="col-xs-12">
            <button type="button" class="btn btn-flat bg-navy" id="tambah"><i class="fa fa-plus"></i> &nbsp; Tambah</button>
            <button type="submit" class="btn btn-flat bg-navy" name="submit"><i class="fa fa-save"></i> &nbsp; Simpan Urutan</button>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box no-border">
                <div class="box-body table-responsive no-padding">
                    <table class="table">
                        <thead class="bg-navy">
                            <tr>
                                <th>No</th>
                                <th>Logo</th>
                                <th>Judul</th>
                                <th>Link</th>
                                <th>ByPass</th>
                                <th>No. Urut</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($daftar_website as $web)
                                <input type="hidden" name="website_id[]" value="{{ $web->website_id }}">
                                <tr>
                                    <td align="center">{{ $nomor++ }}</td>
                                    <td align="center"><img src="{{ asset($web->logo) }}" width="50" height="50"></td>
                                    <td>
                                        <div><b>{{ $web->judul }}</b></div>
                                        <div><small><i>{{ $web->deskripsi }}</i></small></div>
                                    </td>
                                    <td>{{ $web->url }}</td>
                                    <td align="center">{{ $web->bypass }}</td>
                                    <td><center><input class="form-control" type="number" name="no_urut[]" min="1" value="{{ $web->urut }}" style="width: 100px; text-align: center;"></center></td>
                                    <td width="125px">
                                        <a href="#" class="ubah_data"
                                            data-website_id="{{ $web->website_id }}"
                                            data-urut="{{ $web->urut }}"
                                            data-bypass="{{ $web->bypass }}"
                                            data-judul="{{ $web->judul }}"
                                            data-deskripsi="{{ $web->deskripsi }}"
                                            data-url="{{ $web->url }}"
                                        ><small class="label label-warning">ubah</small></a>
                                        <a href="#" class="hapus_data" data-hapus="{{ route('admin.web.hapus', $web->website_id) }}"><small class="label label-danger">hapus</small></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-navy">
                            <tr>
                                <th colspan="7"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endpush
@push('modal')
    <div class="modal fade" id="modal-aksi">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body no-padding">
                    {{ Form::open(["url" => route('admin.web.simpan'), "enctype" => "multipart/form-data"]) }}
                        <input type="hidden" name="website_id" id="website_id" class="form-control">
                        <div class="box no-border">
                            <div class="box-header bg-black">
                                <h3 class="box-title">
                                    <b><i class="fa fa-globe"></i> &nbsp; REGISTRASI WEBSITE</b>
                                </h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label>No. Urut</label>
                                            <input type="number" name="no_urut" id="no_urut" class="form-control" min="1" placeholder="No. Urut">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group">
                                            <label>Bypass</label>
                                            <select name="bypass" id="bypass" class="form-control">
                                                <option value="">== PIlih Bypass ==</option>
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Judul Website</label>
                                    <input type="text" name="judul" id="judul" placeholder="Judul Website" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Website</label>
                                    <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control" placeholder="Deskripsi Singkat Website"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>URL Website</label>
                                    <textarea name="url" id="url" rows="3" class="form-control" placeholder="URL Website"></textarea>
                                </div>
                                <div class="form-group marbot5">
                                    <label>Logo</label>
                                    <input type="file" name="logo" class="form-control">
                                </div>
                                <button class="btn bg-blue full-width" name="submit">Simpan</button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endpush

@push('admin.javascript')
    <script>
        $(function() {
            $("#tambah").click(function() {
                $(".form-control").val("")
                $("#modal-aksi").modal("show")
            })
            $(".ubah_data").click(function() {
                $("#website_id").val($(this).data("website_id"))
                $("#no_urut").val($(this).data("urut"))
                $("#bypass").val($(this).data("bypass"))
                $("#judul").val($(this).data("judul"))
                $("#deskripsi").val($(this).data("deskripsi"))
                $("#url").val($(this).data("url"))
                $("#modal-aksi").modal("show")
            })
            $(".hapus_data").click(function() {
                var url = $(this).data('hapus')
                Swal.fire({
                    title: 'Konfirmasi Hapus',
                    text: "Apakah anda yakin ingin menghapus website ini dari aplikasi?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Tidak jadi'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "" + url + ""
                    }
                })
            })
        })
    </script>
@endpush
