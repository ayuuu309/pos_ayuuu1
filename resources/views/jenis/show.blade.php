@extends('layouts.app')

@section('title', 'Detail Jenis Produk')

@section('content')

<div class="container py-4">

    @include('layouts.navbar')

    {{-- Header --}}
    <div class="card border-0 shadow-sm rounded-4 mb-4"
         style="background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
                border-left: 5px solid #0d6efd !important;">

        <div class="card-body p-4">

            <div class="d-flex align-items-center gap-3">

                <div class="rounded-circle bg-primary-subtle text-primary
                            d-flex align-items-center justify-content-center"
                     style="width: 55px; height: 55px;">

                    <i class="bi bi-tags-fill fs-4"></i>

                </div>

                <div>
                    <span class="badge bg-primary-subtle text-primary mb-1">
                        Detail Data
                    </span>

                    <h3 class="fw-bold text-dark mb-0">
                        Detail Jenis Produk
                    </h3>

                    <p class="text-muted mb-0">
                        Informasi lengkap jenis produk AyuMart
                    </p>
                </div>

            </div>

        </div>
    </div>


    {{-- Card Detail --}}
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

        <div class="card-header bg-white border-0 p-4">
            <h5 class="fw-bold mb-0">
                <i class="bi bi-info-circle-fill text-primary me-2"></i>
                Informasi Jenis
            </h5>
        </div>

        <div class="card-body p-4">

            {{-- Nama Jenis --}}
            <div class="detail-box mb-3">

                <div class="icon-box bg-primary-subtle text-primary">
                    <i class="bi bi-grid-fill"></i>
                </div>

                <div>
                    <small class="text-muted d-block">
                        Nama Jenis
                    </small>

                    <span class="fw-bold fs-5 text-dark">
                        {{ $jenis->nama_jenis }}
                    </span>
                </div>

            </div>


            {{-- Ditambahkan Oleh --}}
            <div class="detail-box mb-3">

                <div class="icon-box bg-success-subtle text-success">
                    <i class="bi bi-person-fill"></i>
                </div>

                <div>
                    <small class="text-muted d-block">
                        Ditambahkan Oleh
                    </small>

                    <span class="fw-semibold text-dark">
                        {{ $jenis->user?->name ?? 'Tidak diketahui' }}
                    </span>
                </div>

            </div>


            {{-- Tanggal Dibuat --}}
            <div class="detail-box mb-3">

                <div class="icon-box bg-warning-subtle text-warning">
                    <i class="bi bi-calendar-check-fill"></i>
                </div>

                <div>
                    <small class="text-muted d-block">
                        Tanggal Ditambahkan
                    </small>

                    <span class="fw-semibold text-dark">
                        {{ $jenis->created_at?->format('d F Y, H:i') }}
                    </span>
                </div>

            </div>


            {{-- Terakhir Diubah --}}
            <div class="detail-box">

                <div class="icon-box bg-info-subtle text-info">
                    <i class="bi bi-clock-history"></i>
                </div>

                <div>
                    <small class="text-muted d-block">
                        Terakhir Diperbarui
                    </small>

                    <span class="fw-semibold text-dark">
                        {{ $jenis->updated_at?->format('d F Y, H:i') }}
                    </span>
                </div>

            </div>

        </div>


        {{-- Footer --}}
        <div class="card-footer bg-white border-top p-4">

            <a href="{{ route('jenis.index') }}"
               class="btn btn-secondary rounded-3 px-4">

                <i class="bi bi-arrow-left me-1"></i>
                Kembali

            </a>

        </div>

    </div>

</div>


<style>

.detail-box {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 16px;
    background: #f8fafc;
    border: 1px solid #e9ecef;
    border-radius: 14px;
    transition: all .2s ease;
}

.detail-box:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,.06);
}

.icon-box {
    width: 45px;
    height: 45px;
    border-radius: 12px;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 18px;
}

.btn {
    transition: all .2s ease;
}

.btn:hover {
    transform: translateY(-1px);
}

</style>

@endsection