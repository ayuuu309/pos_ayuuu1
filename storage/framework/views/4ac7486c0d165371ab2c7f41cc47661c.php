

<?php $__env->startSection('title', 'Penjualan'); ?>

<?php $__env->startSection('content'); ?>

<div class="container py-4">
    <?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php if(session('errors')): ?>
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-check-circle-fill fs-5"></i>
                <div><?php echo e(session('errors')); ?></div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 pb-2 border-bottom gap-3">
        <div>
            <h2 class="fw-bold text-dark m-0">Halaman Penjualan</h2>
            <p class="text-muted mb-0 small">Kelola dan pantau seluruh riwayat transaksi penjualan toko Anda.</p>
        </div>
        <div>
            <a href="<?php echo e(route('penjualan.create')); ?>" class="btn btn-primary px-4 py-2 rounded-3 shadow-sm fw-semibold">
                <i class="bi bi-plus-lg me-1"></i> Tambah Penjualan
            </a>
        </div>
    </div>

    <form action="<?php echo e(route('penjualan.index')); ?>" method="GET" class="mb-4">
        <div class="input-group" style="max-width: 400px;">
            <input 
                type="text" 
                name="search" 
                value="<?php echo e(request('search')); ?>" 
                class="form-control bg-light" 
                placeholder="Search nama kasir"
            >
            <button class="btn btn-outline-secondary px-4 fw-semibold" type="submit">
                <i class="fa-solid fa-magnifying-glass me-1"></i> Cari
            </button>
        </div>
    </form>

    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-secondary small text-uppercase">
                    <tr>
                        <th scope="col" class="py-3 ps-4" style="width: 50px;">#</th>
                        <th scope="col" class="py-3">Tanggal Transaksi</th>
                        <th scope="col" class="py-3">Kasir</th>
                        <th scope="col" class="py-3">Total Pembayaran</th>
                        <th scope="col" class="py-3">Uang Pembayaran</th>
                        <th scope="col" class="py-3">Kembalian</th>
                        <th scope="col" class="py-3 text-center">Metode Pembayaran</th>
                        <th scope="col" class="py-3 text-center">Status</th>
                        <th scope="col" class="py-3 text-center" style="width: 220px;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                   <?php $__empty_1 = true; $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                   <tr>
                        <th scope="row" class="ps-4 text-muted font-monospace fw-normal"><?php echo e(($sales->firstItem() + $loop->index)); ?></th>
                        <td class="fw-medium text-dark">
                            <i class="bi bi-clock-history text-muted me-1"></i>
                            <?php echo e($sale->created_at->translatedFormat('d-m-Y H:i:s')); ?>

                        </td>
                        <td class="fw-medium text-secondary"><?php echo e($sale->user->name); ?></td>
                        <td class="fw-bold text-success">Rp.<?php echo e(number_format($sale->total_pembayaran)); ?></td>
                        
                       <td class="fw-semibold text-primary">
                         Rp <?php echo e(number_format($sale->uang_dibayar ?? 0, 0, ',', '.')); ?>

                       </td>

                       
                     <td class="fw-semibold text-success">
                     Rp <?php echo e(number_format($sale->kembalian ?? 0, 0, ',', '.')); ?>

                    </td>

                        <td class="text-center">
                            <?php
                                $metode = strtoupper($sale->metode_pembayaran);
                            ?>
                            <?php if($metode == 'CASH'): ?>
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 rounded-2"><i class="bi bi-cash me-1"></i> CASH</span>
                            <?php elseif($metode == 'QRIS'): ?>
                                <span class="badge bg-warning-subtle text-dark border border-warning-subtle px-2 py-1 rounded-2"><i class="bi bi-qr-code-scan me-1"></i> QRIS</span>
                            <?php else: ?>
                                <span class="badge bg-info-subtle text-info border border-info-subtle px-2 py-1 rounded-2"><i class="bi bi-bank me-1"></i> <?php echo e($sale->metode_pembayaran); ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <?php
                                $status = strtoupper($sale->status);
                            ?>
                            <?php if($status == 'COMPLETED'): ?>
                                <span class="badge bg-success px-2 py-1 rounded-2" style="min-width: 100px; display: inline-block;"><i class="bi bi-check-circle me-1"></i> COMPLETED</span>
                            <?php elseif($status == 'OPEN'): ?>
                                <span class="badge bg-warning text-dark px-2 py-1 rounded-2" style="min-width: 100px; display: inline-block;"><i class="bi bi-hourglass-split me-1"></i> OPEN</span>
                            <?php else: ?>
                                <span class="badge bg-secondary px-2 py-1 rounded-2" style="min-width: 100px; display: inline-block;"><?php echo e($sale->status); ?></span>
                            <?php endif; ?>
                        </td>
                       <td class="text-center">
    <div class="d-inline-flex align-items-center justify-content-center gap-1">

        <?php if($status == 'OPEN'): ?>

            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $sale)): ?>
                <a href="<?php echo e(route('penjualan.edit', $sale)); ?>"
                    class="btn btn-sm btn-warning text-dark px-2 py-1"
                    title="Lanjutkan">
                    <i class="bi bi-pencil-square"></i>
                </a>
            <?php endif; ?>

            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $sale)): ?>
                <form action="<?php echo e(route('penjualan.destroy', $sale)); ?>"
                    method="POST"
                    class="d-inline m-0 p-0"
                    onsubmit="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button type="submit"
                        class="btn btn-sm btn-danger px-2 py-1"
                        title="Hapus">
                        <i class="bi bi-trash-fill"></i>
                    </button>

                </form>
            <?php endif; ?>

        <?php else: ?>

            
            <a href="<?php echo e(route('penjualan.show', $sale)); ?>"
                class="btn btn-sm btn-primary px-2 py-1"
                title="Detail">
                <i class="bi bi-eye-fill"></i>
            </a>

        <?php endif; ?>

                </div>
                  </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-receipt-cutoff fs-1 d-block mb-2 text-secondary"></i>
                            Data Tidak Ditemukan
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if($sales->hasPages()): ?>
            <div class="card-footer bg-white border-top py-3 px-4 d-flex justify-content-between align-items-center">
                <div class="small text-muted">
                    Showing <?php echo e($sales->firstItem()); ?> to <?php echo e($sales->lastItem()); ?> of <?php echo e($sales->total()); ?> results
                </div>
                <div>
                    <?php echo e($sales->links()); ?>

                </div>
            </div>
        <?php endif; ?>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_ayuuu\resources\views/penjualan/index.blade.php ENDPATH**/ ?>