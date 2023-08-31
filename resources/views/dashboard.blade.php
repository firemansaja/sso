@extends("template.admin")

@section("dashboard", aktif)
@section("content.header", "Dashboard")
@section("title", "Dashboard")

@push('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-navy"><i class="fa fa-files-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Website Aktif</span>
                    <span class="info-box-number">{{ $EWebsiteAktif }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-maroon"><i class="fa fa-files-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Website Tidak Aktif</span>
                    <span class="info-box-number">{{ $EWebsiteTidakAktif }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-files-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Pengguna Aktif</span>
                    <span class="info-box-number">{{ $EPenggunaAktif }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-files-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Pengguna Tidak Aktif</span>
                    <span class="info-box-number">{{ $EPenggunaTidakAktif }}</span>
                </div>
            </div>
        </div>
    </div>
@endpush
