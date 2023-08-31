@extends("template.user")

@section("title", "Daftar Website")

@push('content')
    @foreach ($daftar_bypass as $bypass)
        @php $text = ($bypass == "Ya") ? "TANPA LOGIN" : "HARUS LOGIN"; @endphp
        <div class="row">
            <div class="col-xs-12">
                <div class="box no-border">
                    <div class="box-header bg-black">
                        <h3 class="box-title">
                            <b><i class="fa fa-th"></i> &nbsp; DAFTAR WEBSITE {{ $text }}</b>
                        </h3>
                    </div>
                </div>
                @foreach (daftar_website_by_bypass($bypass) as $web)
                    @php $url = ($bypass == "Ya") ? $web->url . sesi('bypass') : $web->url; @endphp
                    <div class="col-md-4 col-xs-12">
                        <div class="box no-border">
                            <div class="box-body">
                                <a href="{{ $url }}" style="color: black">
                                    <center>
                                        <img src="{{ asset($web->logo) }}" height="100px;" style="margin-bottom: 10px;">
                                        <div><b>{{ $web->judul }}</b></div>
                                        <div><p><small>{{ $web->deskripsi }}</small></p></div>
                                    </center>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
@endpush
