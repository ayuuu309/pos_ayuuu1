

<?php $__env->startSection('title', 'Detail Penjualan #' . $penjualan->id); ?>

<?php $__env->startSection('content'); ?>

<div class="container py-4">

    <?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 pb-2 border-bottom gap-2 no-print">
        <div>
            <h2 class="fw-bold text-dark m-0">
                Penjualan #<?php echo e($penjualan->id); ?>

            </h2>
            <p class="text-muted mb-0 small">
                Informasi lengkap transaksi penjualan toko.
            </p>
        </div>

        
        <div class="d-flex gap-2">
            <button
                type="button"
                onclick="window.print()"
                class="btn btn-primary px-3 py-2 rounded-3 fw-semibold">
                <i class="bi bi-printer-fill me-1"></i> Cetak
            </button>

            <a
                href="<?php echo e(route('penjualan.index')); ?>"
                class="btn btn-outline-secondary px-3 py-2 rounded-3 fw-semibold">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>


    
    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 no-print">
        <div class="row g-4">
            <div class="col-md-3">
                <span class="text-muted small d-block mb-1">Tanggal Transaksi</span>
                <h6 class="fw-bold text-dark mb-0">
                    <i class="bi bi-clock-history text-primary me-1"></i>
                    <?php echo e($penjualan->created_at->translatedFormat('d F Y, H:i:s')); ?>

                </h6>
            </div>

            <div class="col-md-3">
                <span class="text-muted small d-block mb-1">Kasir</span>
                <h6 class="fw-bold text-dark mb-0">
                    <?php echo e($penjualan->user->name ?? '-'); ?>

                </h6>
            </div>

            <div class="col-md-3">
                <span class="text-muted small d-block mb-1">Metode Pembayaran</span>
                <?php $metode = strtoupper($penjualan->metode_pembayaran); ?>
                <?php if($metode == 'CASH'): ?>
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1 rounded-2">
                        <i class="bi bi-cash me-1"></i> CASH
                    </span>
                <?php elseif($metode == 'QRIS'): ?>
                    <span class="badge bg-warning-subtle text-dark border border-warning-subtle px-3 py-1 rounded-2">
                        <i class="bi bi-qr-code-scan me-1"></i> QRIS
                    </span>
                <?php else: ?>
                    <span class="badge bg-info-subtle text-info border border-info-subtle px-3 py-1 rounded-2">
                        <?php echo e($metode); ?>

                    </span>
                <?php endif; ?>
            </div>

            <div class="col-md-3">
                <span class="text-muted small d-block mb-1">Total Pembayaran</span>
                <h5 class="fw-bold text-success mb-0">
                    Rp <?php echo e(number_format($penjualan->total_pembayaran, 0, ',', '.')); ?>

                </h5>
            </div>
        </div>
    </div>


    
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden no-print">
        <div class="card-header bg-white py-3 px-4 border-bottom">
            <h6 class="fw-bold m-0 text-dark">Rincian Barang</h6>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-secondary small text-uppercase">
                    <tr>
                        <th scope="col" class="py-3 ps-4" style="width: 50px;">#</th>
                        <th scope="col" class="py-3">Nama Produk</th>
                        <th scope="col" class="py-3 text-center">Harga Satuan</th>
                        <th scope="col" class="py-3 text-center">Jumlah (Qty)</th>
                        <th scope="col" class="py-3 text-end pe-4">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $penjualan->itemPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <th scope="row" class="ps-4 text-muted font-monospace fw-normal">
                            <?php echo e($loop->iteration); ?>

                        </th>
                        <td class="fw-semibold text-dark">
                            <?php echo e($item->produk->nama ?? 'Produk Dihapus'); ?>

                        </td>
                        <td class="text-center">
                            
                            Rp <?php echo e(number_format($item->harga_satuan ?? ($item->subtotal / max($item->kuantitas, 1)), 0, ',', '.')); ?>

                        </td>
                        <td class="text-center">
                            <span class="badge bg-light text-dark border px-2 py-1">
                                <?php echo e($item->kuantitas); ?>

                            </span>
                        </td>
                        <td class="text-end pe-4 fw-bold text-dark">
                            Rp <?php echo e(number_format($item->subtotal, 0, ',', '.')); ?>

                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">
                            Tidak ada rincian barang.
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
                <tfoot class="table-light">
                    <tr>
                        <td colspan="4" class="text-end fw-bold py-3">Total Akhir:</td>
                        <td class="text-end pe-4 fw-bold text-success fs-5 py-3">
                            Rp <?php echo e(number_format($penjualan->total_pembayaran, 0, ',', '.')); ?>

                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>


    
    
    
    <div class="receipt">
        
        <div class="receipt-header">
            <h1>AYUMART</h1>
            <p>Point of Sale & Kasir Online</p>
            <div class="receipt-line"></div>
        </div>

        
        <div class="receipt-info">
            <div>
                <span>No. Transaksi</span>
                <strong>#<?php echo e($penjualan->id); ?></strong>
            </div>
            <div>
                <span>Tanggal</span>
                <strong><?php echo e($penjualan->created_at->format('d/m/Y H:i')); ?></strong>
            </div>
            <div>
                <span>Kasir</span>
                <strong><?php echo e($penjualan->user->name ?? '-'); ?></strong>
            </div>
            <div>
                <span>Pembayaran</span>
                <strong><?php echo e(strtoupper($penjualan->metode_pembayaran)); ?></strong>
            </div>
        </div>

        <div class="receipt-line"></div>

        
        <?php $__empty_1 = true; $__currentLoopData = $penjualan->itemPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="receipt-item">
                <div class="receipt-product">
                    <?php echo e($item->produk->nama ?? 'Produk Dihapus'); ?>

                </div>
                <div class="receipt-detail">
                    <span>
                        <?php echo e($item->kuantitas); ?> x 
                        
                        Rp <?php echo e(number_format($item->harga_satuan ?? ($item->subtotal / max($item->kuantitas, 1)), 0, ',', '.')); ?>

                    </span>
                    <strong>
                        Rp <?php echo e(number_format($item->subtotal, 0, ',', '.')); ?>

                    </strong>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-center">Tidak ada barang.</p>
        <?php endif; ?>

        <div class="receipt-line"></div>

        
        <div class="receipt-total">
            <span>TOTAL</span>
            <strong>Rp <?php echo e(number_format($penjualan->total_pembayaran, 0, ',', '.')); ?></strong>
        </div>

        <div class="receipt-line"></div>

        
        <div class="receipt-footer">
            <strong>TERIMA KASIH</strong>
            <p>Sudah berbelanja di AyuMart</p>
            <small>Semoga hari Anda menyenangkan :)</small>
        </div>
    </div>

</div>





<style>
    /* Di layar monitor (normal view) */
    .receipt {
        display: none;
    }

    /* ========================================================= */
    /* MODE CETAK (PRINT VIEW) */
    /* ========================================================= */
    @media print {
        /* Set ukuran kertas printer thermal */
        @page {
            size: 80mm auto;
            margin: 0;
        }

        /* Sembunyikan elemen bawaan aplikasi web (navbar, card, tombol) */
        .no-print,
        nav,
        header,
        footer,
        .navbar,
        .card,
        .border-bottom {
            display: none !important;
        }

        /* Reset layout body */
        body {
            background-color: #fff !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .container {
            width: 100% !important;
            max-width: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        /* Tampilkan & Format Struk Kasir */
        .receipt {
            display: block !important;
            width: 80mm;
            margin: 0 auto;
            padding: 8px 10px;
            box-sizing: border-box;
            background: #fff;
            color: #000;
            font-family: 'Courier New', Courier, monospace;
            font-size: 11px;
            line-height: 1.3;
        }

        .receipt-header {
            text-align: center;
        }

        .receipt-header h1 {
            font-size: 18px;
            font-weight: bold;
            margin: 0;
            letter-spacing: 1px;
        }

        .receipt-header p {
            font-size: 9px;
            margin: 2px 0 6px;
        }

        .receipt-line {
            border-top: 1px dashed #000;
            margin: 6px 0;
        }

        .receipt-info div {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2px;
        }

        .receipt-item {
            margin-bottom: 6px;
        }

        .receipt-product {
            font-weight: bold;
            margin-bottom: 1px;
            word-wrap: break-word;
        }

        .receipt-detail {
            display: flex;
            justify-content: space-between;
        }

        .receipt-detail span {
            font-size: 10px;
        }

        .receipt-total {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            font-weight: bold;
            margin: 6px 0;
        }

        .receipt-footer {
            text-align: center;
            margin-top: 10px;
        }

        .receipt-footer strong {
            font-size: 12px;
        }

        .receipt-footer p {
            margin: 2px 0;
            font-size: 10px;
        }

        .receipt-footer small {
            font-size: 8px;
        }
    }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_ayuuu\resources\views/penjualan/show.blade.php ENDPATH**/ ?>