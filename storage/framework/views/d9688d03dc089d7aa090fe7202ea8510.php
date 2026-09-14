

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<div class="container py-4">
    <?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 pb-3 border-bottom">
        <div>
            <h3 class="fw-bold text-dark mb-1 tracking-tight">
                Ringkasan Hari Ini
            </h3>
            <p class="text-muted mb-0 small">
                <i class="bi bi-calendar-event me-1 text-primary"></i> (<?php echo e($tanggalHariIni->translatedFormat('l, d F Y')); ?>)
            </p>
        </div>
    </div>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\User::class)): ?>
    <div class="mb-4">
        <h6 class="fw-bold text-uppercase text-muted fs-7 tracking-wider mb-3">Penjualan Hari Ini</h6>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4 h-100 bg-primary bg-opacity-10">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-secondary small fw-medium">Total Nilai Penjualan Hari ini</span>
                                <h3 class="fw-bold text-primary mb-0 mt-2">Rp <?php echo e(number_format($ringkasan['total_penjualan'])); ?></h3>
                            </div>
                            <div class="p-3 bg-primary bg-opacity-25 rounded-4 text-primary d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                                <i class="bi bi-currency-dollar fs-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4 h-100 bg-success bg-opacity-10">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-secondary small fw-medium">Jumlah Transaksi Hari Ini</span>
                                <h3 class="fw-bold text-dark mb-0 mt-2">
                                    <?php echo e($ringkasan['total_transaksi']); ?> <span class="fs-6 text-muted fw-normal">Transaksi</span>
                                </h3>
                            </div>
                            <div class="p-3 bg-success bg-opacity-25 rounded-4 text-success d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                                <i class="bi bi-cart-check fs-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <h6 class="fw-bold text-uppercase text-muted fs-7 tracking-wider mb-3">Status Pembayaran</h6>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4 h-100 bg-success bg-opacity-10">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-secondary small fw-medium">Total pembayaran tunai</span>
                                <h4 class="fw-bold text-success mb-0 mt-2">Rp <?php echo e(number_format($ringkasan['total_cash'])); ?></h4>
                            </div>
                            <div class="p-3 bg-success bg-opacity-25 rounded-4 text-success d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                                <i class="bi bi-cash-stack fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4 h-100 bg-info bg-opacity-10">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-secondary small fw-medium">Total pembayaran non-tunai</span>
                                <h4 class="fw-bold text-info mb-0 mt-2">Rp <?php echo e(number_format($ringkasan['total_non_tunai'])); ?></h4>
                            </div>
                            <div class="p-3 bg-info bg-opacity-25 rounded-4 text-info d-flex align-items-center justify-content-center" style="width: 54px; height: 54px;">
                                <i class="bi bi-credit-card fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="mb-4">
        <h6 class="fw-bold text-uppercase text-muted fs-7 tracking-wider mb-3">Status Stok Kritis</h6>
        <div class="row g-4">
            
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden bg-white">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-2">
                        <h6 class="fw-bold text-warning mb-0 d-flex align-items-center">
                            <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>Daftar produk stok rendah
                        </h6>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light border-0">
                                    <tr>
                                        <th scope="col" class="ps-4 text-muted small uppercase" style="width: 10%;">#</th>
                                        <th scope="col" class="text-muted small uppercase">Nama Produk</th>
                                        <th scope="col" class="text-end pe-4 text-muted small uppercase" style="width: 20%;">Stok</th>
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php $__empty_1 = true; $__currentLoopData = $produkStokRendah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="ps-4 text-muted fw-light"><?php echo e($produkStokRendah->firstItem() + $index); ?></td>
                                            <td class="fw-semibold text-dark"><?php echo e($produk->nama); ?></td>
                                            <td class="text-end pe-4">
                                                <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2.5 py-1.5 rounded-pill font-monospace">
                                                    <?php echo e($produk->stok); ?> Pcs
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="3" class="text-muted text-center py-4">
                                                Seluruh produk berada dalam kondisi stok aman.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php if($produkStokRendah->hasPages()): ?>
                    <div class="card-footer bg-white border-0 px-4 py-3">
                        <?php echo e($produkStokRendah->links()); ?>

                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden bg-white">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-2">
                        <h6 class="fw-bold text-danger mb-0 d-flex align-items-center">
                            <i class="bi bi-x-circle-fill me-2 fs-5"></i>Produk habis stok
                        </h6>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light border-0">
                                    <tr>
                                        <th scope="col" class="ps-4 text-muted small uppercase" style="width: 10%;">#</th>
                                        <th scope="col" class="text-muted small uppercase">Nama Produk</th>
                                        <th scope="col" class="text-end pe-4 text-muted small uppercase" style="width: 20%;">Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $produkStokHabis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="ps-4 text-muted fw-light"><?php echo e($produkStokHabis->firstItem() + $index); ?></td>
                                            <td class="fw-semibold text-dark"><?php echo e($produk->nama); ?></td>
                                            <td class="text-end pe-4">
                                                <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2.5 py-1.5 rounded-pill font-monospace">
                                                    <?php echo e($produk->stok); ?> Pcs
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="3" class="text-muted text-center py-4">
                                                Seluruh produk berada dalam kondisi stok aman.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php if($produkStokHabis->hasPages()): ?>
                    <div class="card-footer bg-white border-0 px-4 py-3">
                        <?php echo e($produkStokHabis->links()); ?>

                    </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>

    <div class="mb-4">
        <h6 class="fw-bold text-uppercase text-muted fs-7 tracking-wider mb-3">Produk Terlaris</h6>
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light border-0">
                            <tr>
                                <th scope="col" class="ps-4 text-muted small uppercase">Nama Produk</th>
                                <th scope="col" class="text-muted small uppercase">Sisa Stok</th>
                                <th scope="col" class="pe-4 text-end text-muted small uppercase">Unit Terjual</th>
                            </tr>
                        </thead>
                        <tbody>   
                            <?php $__empty_1 = true; $__currentLoopData = $produkTerlaris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="ps-4 fw-semibold text-dark"><?php echo e($produk->nama); ?></td>
                                    <td>
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary px-2.5 py-1.5 rounded-3">
                                            <?php echo e($produk->stok); ?> Pcs
                                        </span>
                                    </td>
                                    <td class="pe-4 text-end fw-bold text-primary fs-6"><?php echo e(number_format($produk->total_terjual)); ?> Unit</td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="3" class="text-muted text-center py-4">
                                        Seluruh produk berada dalam kondisi stok aman.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_ayuuu\resources\views/dashboard.blade.php ENDPATH**/ ?>