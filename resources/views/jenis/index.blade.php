@extends('layouts.app')

@section('title', 'Kelola Jenis Produk')

@section('content')
<div class="container py-4">
    @include('layouts.navbar')

    {{-- Card Header & Breadcrumb --}}
    <div class="card border-0 shadow-sm rounded-4 mb-4"
         style="background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%); border-left: 5px solid #0d6efd !important;">

        <div class="card-body p-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">

            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-primary-subtle text-primary fw-bold px-2 py-1 rounded-2">
                        <i class="bi bi-tags-fill me-1"></i> Master Data
                    </span>
                </div>

                <h3 class="fw-bold text-dark m-0">
                    Data Jenis Produk
                </h3>

                <p class="text-muted small mb-0 mt-1">
                    Kelola kategori dan pengelompokan produk toko AyuMart
                </p>
            </div>

        @if(strtolower(auth()->user()->role->name ?? auth()->user()->role->nama_role ?? '') === 'admin')
    <a href="{{ route('jenis.create') }}"
       class="btn btn-primary fw-semibold px-4 py-2 rounded-3 shadow-sm d-inline-flex align-items-center gap-2">
        <i class="bi bi-plus-lg fs-6"></i>
        <span>Tambah Jenis Baru</span>
    </a>
@endif

        </div>
    </div>


    {{-- Alert Notifikasi Sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 d-flex align-items-center gap-2 mb-4"
             role="alert"
             style="background-color: #d1e7dd; color: #0f5132;">

            <i class="bi bi-check-circle-fill fs-5"></i>

            <div>
                {{ session('success') }}
            </div>

            <button type="button"
                    class="btn-close ms-auto"
                    data-bs-dismiss="alert"
                    aria-label="Close">
            </button>

        </div>
    @endif


    {{-- Form Search / Pencarian --}}
    <form action="{{ route('jenis.index') }}"
          method="GET"
          class="mb-4">

        <div class="input-group" style="max-width: 400px;">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                class="form-control bg-light"
                placeholder="Search nama jenis produk"
            >

            <button class="btn btn-outline-secondary px-4 fw-semibold"
                    type="submit">

                <i class="fa-solid fa-magnifying-glass me-1"></i>
                Cari

            </button>

        </div>
    </form>


    {{-- Card Tabel Utama --}}
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    {{-- Header Tabel --}}
                    <thead style="background-color: #f1f5f9;"
                           class="border-bottom">

                        <tr class="text-secondary small text-uppercase fw-bold"
                            style="letter-spacing: 0.5px;">

                            {{-- No --}}
                            <th class="px-4 py-3.5"
                                style="width: 90px;">
                                No
                            </th>

                            {{-- Nama Jenis --}}
                            <th class="py-3.5">
                                Nama Jenis
                            </th>

                            {{-- User --}}
                            <th class="py-3.5">
                                Ditambahkan Oleh
                            </th>

                            {{-- Aksi --}}
                            <th class="px-4 py-3.5 text-end"
                                style="width: 220px;">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    {{-- Isi Tabel --}}
                    <tbody class="divide-y">

                        @forelse($jenis as $index => $item)

                            <tr>

                                {{-- Penomoran --}}
                                <td class="px-4 py-3 fw-medium text-secondary">

                                    <span class="badge bg-light text-dark border px-2.5 py-1.5 rounded-2">

                                        #{{ method_exists($jenis, 'firstItem')
                                            ? $jenis->firstItem() + $index
                                            : $index + 1 }}

                                    </span>

                                </td>


                                {{-- Nama Jenis --}}
                                <td class="py-3">

                                    <div class="d-flex align-items-center gap-2">

                                        <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center"
                                             style="width: 35px; height: 35px;">

                                            <i class="bi bi-grid-fill"></i>

                                        </div>

                                        <span class="fw-bold text-dark fs-6">
                                            {{ $item->nama_jenis
                                                ?? $item->nama
                                                ?? $item->jenis
                                                ?? 'Tanpa Nama' }}
                                        </span>
                                    </div>
                                </td>


                                {{-- Ditambahkan Oleh --}}
                                <td class="py-3">

                                    @if($item->user)

                                        <div class="d-flex align-items-center gap-2">

                                            {{-- Icon User --}}
                                            <div class="rounded-circle bg-success-subtle text-success d-flex align-items-center justify-content-center"
                                                 style="width: 35px; height: 35px;">

                                                <i class="bi bi-person-fill"></i>

                                            </div>


                                            {{-- Nama User --}}
                                            <div>

                                                <span class="fw-semibold text-dark d-block">

                                                    {{ $item->user->name }}

                                                </span>

                                                <small class="text-muted">

                                                    Admin

                                                </small>

                                            </div>

                                        </div>

                                    @else

                                        {{-- Jika user_id NULL --}}
                                        <div class="d-flex align-items-center gap-2">

                                            <div class="rounded-circle bg-secondary-subtle text-secondary d-flex align-items-center justify-content-center"
                                                 style="width: 35px; height: 35px;">

                                                <i class="bi bi-person-x-fill"></i>

                                            </div>

                                            <span class="text-muted small">

                                                Tidak diketahui

                                            </span>

                                        </div>

                                    @endif

                                </td>


                          <td class="px-4 py-3 text-end">

               @if(strtolower(auth()->user()->role->name ?? '') === 'admin')

                    <div class="d-flex justify-content-end align-items-center gap-2">

                  {{-- DETAIL --}}
            <a href="{{ route('jenis.show', $item->id) }}"
               class="btn btn-primary action-icon"
               title="Detail">
                <i class="bi bi-eye-fill"></i>
            </a>

            {{-- EDIT --}}
            <a href="{{ route('jenis.edit', $item->id) }}"
               class="btn btn-warning action-icon"
               title="Edit">
                <i class="bi bi-pencil-square"></i>
            </a>

            {{-- Hapus --}}
            <form action="{{ route('jenis.destroy', $item->id) }}"
                  method="POST"
                  class="d-inline"
                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus jenis produk ini?')">

                @csrf
                @method('DELETE')

                <button type="submit"
                        class="btn btn-danger btn-sm delete-btn"
                        title="Hapus">
                    <i class="bi bi-trash-fill"></i>
                </button>

            </form>

        </div>

    @elseif(strtolower(auth()->user()->role->name ?? '') === 'kasir')

        {{-- Kasir hanya Detail --}}
        <a href="{{ route('jenis.show', $item->id) }}"
           class="btn btn-primary btn-sm action-btn"
           title="Detail">
            <i class="bi bi-eye-fill"></i>
            <span>Detail</span>
        </a>
            @endif
              </td>
                </tr>
                        @empty
                            {{-- Jika Tidak Ada Data --}}
                            <tr>

                                <td colspan="4"
                                    class="text-center py-5 text-muted">
                                    <div class="d-flex flex-column align-items-center py-4">
                                        <div class="rounded-circle bg-light p-3 mb-3 text-secondary">
                                            <i class="bi bi-inbox fs-1"></i>
                                        </div>
                                        <h6 class="fw-bold text-dark mb-1">
                                            Belum Ada Data Jenis
                                        </h6>

                                        <p class="small text-muted mb-3">
                                            Silakan tambahkan jenis/kategori produk baru terlebih dahulu.
                                        </p>

                                        <a href="{{ route('jenis.create') }}"
                                           class="btn btn-sm btn-outline-primary rounded-3 px-3">
                                            + Tambah Sekarang
                                        </a>
                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- Footer & Pagination --}}
        @if(method_exists($jenis, 'hasPages') && $jenis->hasPages())

            <div class="card-footer bg-white border-top py-3 px-4">

                <div class="d-flex justify-content-between align-items-center">

                    <span class="small text-muted">

                        Menampilkan data
                        {{ $jenis->firstItem() }}
                        -
                        {{ $jenis->lastItem() }}
                        dari
                        {{ $jenis->total() }}
                        jenis

                    </span>

                    <div>

                        {{ $jenis->appends(request()->query())->links() }}

                    </div>

                </div>

            </div>

        @endif

    </div>

</div>


<style>

    /* Styling Tambahan untuk Efek Micro-interaction */

    .table-hover tbody tr:hover {
        background-color: #f8fafc !important;
        transition: all 0.2s ease-in-out;
    }

    .btn {
        transition: all 0.2s ease;
    }

    .btn:hover {
        transform: translateY(-1px);
    }
     

    .action-icon {
        width: 32px;
        height: 32px;
        padding: 0 !important;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        border-radius: 6px;
        font-size: 13px;

        transition: all 0.2s ease;
    }

    .action-icon i {
        font-size: 13px;
    }

    .action-icon:hover {
        transform: translateY(-1px);
        box-shadow: 0 3px 7px rgba(0, 0, 0, 0.15);
    }

    .d-flex.gap-2 {
        gap: 8px !important;
    }

</style>

@endsection
