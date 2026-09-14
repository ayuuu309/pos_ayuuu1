@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')

@include('layouts.navbar')

<div class="container py-5">

    {{-- Header --}}
    <div class="mb-4">
        <a href="{{ route('produk.index') }}"
           class="text-decoration-none text-secondary">
            ← Kembali ke Produk
        </a>

        <h2 class="fw-bold mt-3 mb-1">
            Detail Produk
        </h2>

        <p class="text-muted mb-0">
            Informasi lengkap mengenai produk yang dipilih.
        </p>
    </div>

    {{-- Card Detail --}}
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

        {{-- Header Card --}}
        <div class="p-4 text-white"
             style="background: linear-gradient(135deg, #0d6efd, #4f46e5);">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <span class="badge bg-white text-primary rounded-pill px-3 py-2 mb-2">
                        Detail Produk
                    </span>

                    <h2 class="fw-bold mb-1">
                        {{ $produk->nama }}
                    </h2>

                    <p class="mb-0 opacity-75">
                        Informasi produk AyuMart
                    </p>
                </div>

                <div class="product-icon">
                    <i class="bi bi-box-seam"></i>
                </div>

            </div>
        </div>

        {{-- Isi --}}
        <div class="card-body p-4">

            <div class="row g-4">

                {{-- Harga Pokok --}}
                <div class="col-md-4">
                    <div class="info-box">
                        <div class="icon-box bg-primary-subtle text-primary">
                            <i class="bi bi-cart-plus"></i>
                        </div>

                        <div>
                            <small class="text-muted">
                                Harga Pokok
                            </small>

                            <h5 class="fw-bold mb-0">
                                Rp {{ number_format($produk->harga_beli, 0, ',', '.') }}
                            </h5>
                        </div>
                    </div>
                </div>

                {{-- Harga Jual --}}
                <div class="col-md-4">
                    <div class="info-box">
                        <div class="icon-box bg-success-subtle text-success">
                            <i class="bi bi-cash-stack"></i>
                        </div>

                        <div>
                            <small class="text-muted">
                                Harga Jual
                            </small>

                            <h5 class="fw-bold mb-0">
                                Rp {{ number_format($produk->harga_jual, 0, ',', '.') }}
                            </h5>
                        </div>
                    </div>
                </div>

                {{-- Stok --}}
                <div class="col-md-4">
                    <div class="info-box">
                        <div class="icon-box bg-warning-subtle text-warning">
                            <i class="bi bi-boxes"></i>
                        </div>

                        <div>
                            <small class="text-muted">
                                Stok Produk
                            </small>

                            <h5 class="fw-bold mb-0">
                                {{ $produk->stok }}
                                <span class="fs-6 fw-normal text-muted">
                                    unit
                                </span>
                            </h5>
                        </div>
                    </div>
                </div>

            </div>

            <hr class="my-4">

            {{-- Informasi Tambahan --}}
            <div class="row">

                <div class="col-md-6">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-info-circle text-primary me-2"></i>
                        Informasi Produk
                    </h5>

                    <div class="detail-row">
                        <span>Nama Produk</span>
                        <strong>{{ $produk->nama }}</strong>
                    </div>

                    <div class="detail-row">
                        <span>Harga Pokok</span>
                        <strong>
                            Rp {{ number_format($produk->harga_beli, 0, ',', '.') }}
                        </strong>
                    </div>

                    <div class="detail-row">
                        <span>Harga Jual</span>
                        <strong>
                            Rp {{ number_format($produk->harga_jual, 0, ',', '.') }}
                        </strong>
                    </div>

                    <div class="detail-row">
                        <span>Stok</span>
                        <strong>{{ $produk->stok }} unit</strong>
                    </div>
                </div>

                {{-- Keuntungan --}}
                <div class="col-md-6 mt-4 mt-md-0">

                    <div class="profit-card">

                        <div class="d-flex align-items-center mb-3">
                            <div class="profit-icon">
                                <i class="bi bi-graph-up-arrow"></i>
                            </div>

                            <div>
                                <h5 class="fw-bold mb-0">
                                    Estimasi Keuntungan
                                </h5>

                                <small class="text-muted">
                                    Keuntungan per produk
                                </small>
                            </div>
                        </div>

                        @php
                            $keuntungan = $produk->harga_jual - $produk->harga_beli;
                        @endphp

                        <h2 class="fw-bold text-success">
                            Rp {{ number_format($keuntungan, 0, ',', '.') }}
                        </h2>

                        <p class="text-muted mb-0">
                            Selisih antara harga jual dan harga Pokok.
                        </p>

                    </div>

                </div>

            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-end gap-2 mt-4">

                <a href="{{ route('produk.index') }}"
                   class="btn btn-light border rounded-3 px-4">
                    <i class="bi bi-arrow-left me-1"></i>
                    Kembali
                </a>


            </div>

        </div>
    </div>

</div>

{{-- CSS --}}
<style>

    .product-icon {
        width: 70px;
        height: 70px;
        border-radius: 20px;
        background: rgba(255,255,255,.18);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        backdrop-filter: blur(5px);
    }

    .info-box {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 20px;
        border: 1px solid #eef0f4;
        border-radius: 16px;
        background: #fff;
        transition: .2s ease;
    }

    .info-box:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,.08);
    }

    .icon-box {
        width: 50px;
        height: 50px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        padding: 13px 0;
        border-bottom: 1px solid #eee;
    }

    .detail-row span {
        color: #6c757d;
    }

    .profit-card {
        height: 100%;
        padding: 25px;
        border-radius: 18px;
        background: linear-gradient(135deg, #f0fff4, #ffffff);
        border: 1px solid #d8f3df;
    }

    .profit-icon {
        width: 50px;
        height: 50px;
        border-radius: 14px;
        background: #dff7e6;
        color: #198754;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        margin-right: 12px;
    }

</style>

@endsection