@extends('layouts.app')

@section('title', 'POS')

@section('content')

@if(session('errors'))
     <div class="alert alert-danger">
        {{ session('errors') }}
     </div>
     @endif

<h4 class="mb-3">
    {{ $mode === 'edit' ? 'Edit Penjualan' : 'Tambah Penjualan'}}
</h4>

<div class="row">

    {{-- ==================== PRODUK ==================== --}}
    <div class="col-md-6">
        <div class="card">
            <div class="card-body" style="max-height:70vh; overflow:auto">
                <div class="mb-3">
                    <form method="GET" action="{{route('penjualan.create') }}">
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control"
                               placeholder="Cari produk..."
                               onkeyup="this.form.submit()">
                    </form>
                </div>
                @foreach($products as $product)
                <form method="POST" action="{{ route('itempenjualan.store') }}" class="row mb-2">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="col-7">
                        <button class="btn btn-outline-primary w-100 text-start p-2 {{ $sale->status ===
                              'COMPLETED'? 'disabled' : '' }}">
                            <div class="d-flex align-items-center gap-2">

                                {{-- Gambar produk --}}
                                <img src="{{ asset('storage/'.$product->foto) }}"
                                     alt="Gambar"
                                     class="rounded-circle"
                                     style="width:45px; height:45px; object-fit:cover;">

                                {{-- Nama & harga --}}
                                <div>
                                    <div class="fw-semibold">{{ $product->nama }}</div>
                                    <small class="text-muted">{{ number_format($product->harga_jual) }}</small>
                                </div>

                            </div>

                        </button>
                    </div>
                    <div class="col-3">
                       <input type="number" name="quantity" value="1" min="1"
                             class="form-control {{ $sale->status === 'COMPLETED' ? 'readonly' : ''}}">
                    </div>

                    <div class="col-2">
                       <button class="btn btn-outline-primary w-100 text-start p-2 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">
                        +
                       </button>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>

{{-- ==================== KERANJANG ==================== --}}
<div class="col-md-6">
    <div class="card">
        <table class="table table-bordered mb-0">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sale->itemPenjualan as $item)
                <tr>
                    <td>{{ $item->produk->nama }}</td>
                    <td>Rp.{{ number_format($item->produk->harga_jual) }}</td>
                    <td>
                        <form method="POST" action="{{ route('itempenjualan.update', $item->id) }}">
                            @csrf @method('PUT')
                            <input type="number" name="quantity"
                                   value="{{ $item->kuantitas }}"
                                   class="form-control form-control-sm"
                                   onchange="this.form.submit()">
                        </form>
                    </td>
                   <td>Rp {{ number_format($item->subtotal) }}</td>
                    <td>
                        @can('delete', $item)
                        <form method="POST" action="{{ route('item_penjualan.destroy', $item->id) }}">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                Hapus
                            </button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Keranjang kosong
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    
        <div class="card-footer">

    {{-- TOTAL --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <span class="fw-bold fs-5">Total</span>
        <strong class="text-success fs-5">
            Rp {{ number_format($sale->itemPenjualan->sum('subtotal'), 0, ',', '.') }}
        </strong>
    </div>

    <form method="POST"
          action="{{ route('penjualan.update', $sale->id) }}"
          onsubmit="return confirm('Yakin ingin checkout?')"
          class="mt-2">

        @csrf
        @method('PUT')

        {{-- METODE PEMBAYARAN --}}
        <label class="form-label fw-semibold">
            Metode Pembayaran
        </label>

        <select name="payment_method"
                id="payment_method"
                class="form-select mb-3"
                required>

            <option value="">Pilih Pembayaran</option>
            <option value="CASH">Cash</option>
            <option value="QRIS">QRIS</option>
            <option value="TRANSFER">Transfer</option>

        </select>
        {{-- QRIS --}}
<div id="qris-area" class="text-center mb-3" style="display: none;">

    <div class="card border-0 bg-light rounded-3 p-3">

        <h6 class="fw-bold mb-3">
            <i class="bi bi-qr-code-scan me-1"></i>
            Pembayaran QRIS
        </h6>

        <div class="d-flex justify-content-center">
            <div id="qris-qrcode"></div>
        </div>

        <small class="text-muted d-block mt-2">
            Scan QR Code untuk pembayaran
        </small>

    </div>

</div>

        {{-- UANG DIBAYAR --}}
        <div id="uang-dibayar-area">

            <label class="form-label fw-semibold">
                Uang Dibayar
            </label>

            <input type="number"
                   name="uang_dibayar"
                   id="uang_dibayar"
                   class="form-control mb-3"
                   min="0"
                   placeholder="Masukkan uang pelanggan"
                   required>

        </div>

        {{-- KEMBALIAN --}}
        <div class="alert alert-success d-flex justify-content-between align-items-center">

            <span class="fw-semibold">
                <i class="bi bi-cash-stack me-1"></i>
                Kembalian
            </span>

            <strong id="kembalian">
                Rp 0
            </strong>

        </div>

        <button type="submit"
                id="checkout-button"
                class="btn btn-success w-100 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">

            <i class="bi bi-cart-check me-1"></i>
            Checkout

        </button>

    </form>
        @can('delete', $sale) 
        <form action="{{ route('penjualan.destroy', $sale->id) }}"
            method="POST"
            onsubmit="return confirm('Yakin ingin membatalkan transaksi?')">
         @csrf
         @method('DELETE')

        <button class="btn btn-danger w-100 mt-2 {{ $sale->status === 'COMPLETED' ? 'disabled' : ''}}">
            Batalkan Transaksi
        </button>
      </form>
      @endcan
    </div>
   </div>
</div>
 </div> 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
 <script>
document.addEventListener('DOMContentLoaded', function () {

    const paymentMethod = document.getElementById('payment_method');
    const uangDibayar = document.getElementById('uang_dibayar');
    const kembalian = document.getElementById('kembalian');

    const qrisArea = document.getElementById('qris-area');
    const qrisQRCode = document.getElementById('qris-qrcode');

    const total = Number({{ $sale->itemPenjualan->sum('subtotal') }});

    function formatRupiah(angka) {
        return 'Rp ' + new Intl.NumberFormat('id-ID').format(angka);
    }

    function tampilkanQRIS() {

        qrisArea.style.display = 'block';

        // Bersihkan QR sebelumnya
        qrisQRCode.innerHTML = '';

        // Data demo QRIS
        const dataQRIS =
            'AYUMART|TRANSAKSI:{{ $sale->id }}|TOTAL:' + total;

        new QRCode(qrisQRCode, {
            text: dataQRIS,
            width: 200,
            height: 200
        });
    }

    function sembunyikanQRIS() {

        qrisArea.style.display = 'none';
        qrisQRCode.innerHTML = '';

    }

    function hitungPembayaran() {

        const metode = paymentMethod.value;

        // =====================
        // QRIS
        // =====================
        if (metode === 'QRIS') {

            uangDibayar.value = total;
            uangDibayar.readOnly = true;

            kembalian.textContent = formatRupiah(0);

            tampilkanQRIS();

            return;
        }

        // =====================
        // CASH
        // =====================
        if (metode === 'CASH') {

            uangDibayar.readOnly = false;

            sembunyikanQRIS();

            const dibayar =
                Number(uangDibayar.value) || 0;

            if (dibayar >= total) {

                const hasil = dibayar - total;

                kembalian.textContent =
                    formatRupiah(hasil);

            } else if (dibayar > 0) {

                kembalian.textContent =
                    'Uang kurang';

            } else {

                kembalian.textContent =
                    'Rp 0';
            }

            return;
        }

        // =====================
        // TRANSFER
        // =====================
        if (metode === 'TRANSFER') {

            uangDibayar.value = total;
            uangDibayar.readOnly = true;

            kembalian.textContent =
                formatRupiah(0);

            sembunyikanQRIS();

            return;
        }

        // =====================
        // BELUM PILIH
        // =====================

        uangDibayar.value = '';
        uangDibayar.readOnly = false;

        kembalian.textContent = 'Rp 0';

        sembunyikanQRIS();
    }

    paymentMethod.addEventListener(
        'change',
        hitungPembayaran
    );

    uangDibayar.addEventListener(
        'input',
        hitungPembayaran
    );

    hitungPembayaran();

});
</script>
</div> 
@endsection