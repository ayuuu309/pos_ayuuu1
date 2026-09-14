

<?php $__env->startSection('title', 'POS'); ?>

<?php $__env->startSection('content'); ?>

<?php if(session('errors')): ?>
     <div class="alert alert-danger">
        <?php echo e(session('errors')); ?>

     </div>
     <?php endif; ?>

<h4 class="mb-3">
    <?php echo e($mode === 'edit' ? 'Edit Penjualan' : 'Tambah Penjualan'); ?>

</h4>

<div class="row">

    
    <div class="col-md-6">
        <div class="card">
            <div class="card-body" style="max-height:70vh; overflow:auto">
                <div class="mb-3">
                    <form method="GET" action="<?php echo e(route('penjualan.create')); ?>">
                        <input type="text"
                               name="search"
                               value="<?php echo e(request('search')); ?>"
                               class="form-control"
                               placeholder="Cari produk..."
                               onkeyup="this.form.submit()">
                    </form>
                </div>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <form method="POST" action="<?php echo e(route('itempenjualan.store')); ?>" class="row mb-2">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">

                    <div class="col-7">
                        <button class="btn btn-outline-primary w-100 text-start p-2 <?php echo e($sale->status ===
                              'COMPLETED'? 'disabled' : ''); ?>">
                            <div class="d-flex align-items-center gap-2">

                                
                                <img src="<?php echo e(asset('storage/'.$product->foto)); ?>"
                                     alt="Gambar"
                                     class="rounded-circle"
                                     style="width:45px; height:45px; object-fit:cover;">

                                
                                <div>
                                    <div class="fw-semibold"><?php echo e($product->nama); ?></div>
                                    <small class="text-muted"><?php echo e(number_format($product->harga_jual)); ?></small>
                                </div>

                            </div>

                        </button>
                    </div>
                    <div class="col-3">
                       <input type="number" name="quantity" value="1" min="1"
                             class="form-control <?php echo e($sale->status === 'COMPLETED' ? 'readonly' : ''); ?>">
                    </div>

                    <div class="col-2">
                       <button class="btn btn-outline-primary w-100 text-start p-2 <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>">
                        +
                       </button>
                    </div>
                </form>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>


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
                <?php $__empty_1 = true; $__currentLoopData = $sale->itemPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($item->produk->nama); ?></td>
                    <td>Rp.<?php echo e(number_format($item->produk->harga_jual)); ?></td>
                    <td>
                        <form method="POST" action="<?php echo e(route('itempenjualan.update', $item->id)); ?>">
                            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                            <input type="number" name="quantity"
                                   value="<?php echo e($item->kuantitas); ?>"
                                   class="form-control form-control-sm"
                                   onchange="this.form.submit()">
                        </form>
                    </td>
                   <td>Rp <?php echo e(number_format($item->subtotal)); ?></td>
                    <td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $item)): ?>
                        <form method="POST" action="<?php echo e(route('item_penjualan.destroy', $item->id)); ?>">
                            <?php echo csrf_field(); ?> 
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger">
                                Hapus
                            </button>
                        </form>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Keranjang kosong
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    
        <div class="card-footer">

    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <span class="fw-bold fs-5">Total</span>
        <strong class="text-success fs-5">
            Rp <?php echo e(number_format($sale->itemPenjualan->sum('subtotal'), 0, ',', '.')); ?>

        </strong>
    </div>

    <form method="POST"
          action="<?php echo e(route('penjualan.update', $sale->id)); ?>"
          onsubmit="return confirm('Yakin ingin checkout?')"
          class="mt-2">

        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        
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
                class="btn btn-success w-100 <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>">

            <i class="bi bi-cart-check me-1"></i>
            Checkout

        </button>

    </form>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $sale)): ?> 
        <form action="<?php echo e(route('penjualan.destroy', $sale->id)); ?>"
            method="POST"
            onsubmit="return confirm('Yakin ingin membatalkan transaksi?')">
         <?php echo csrf_field(); ?>
         <?php echo method_field('DELETE'); ?>

        <button class="btn btn-danger w-100 mt-2 <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>">
            Batalkan Transaksi
        </button>
      </form>
      <?php endif; ?>
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

    const total = Number(<?php echo e($sale->itemPenjualan->sum('subtotal')); ?>);

    function formatRupiah(angka) {
        return 'Rp ' + new Intl.NumberFormat('id-ID').format(angka);
    }

    function tampilkanQRIS() {

        qrisArea.style.display = 'block';

        // Bersihkan QR sebelumnya
        qrisQRCode.innerHTML = '';

        // Data demo QRIS
        const dataQRIS =
            'AYUMART|TRANSAKSI:<?php echo e($sale->id); ?>|TOTAL:' + total;

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_ayuuu\resources\views/penjualan/pos.blade.php ENDPATH**/ ?>