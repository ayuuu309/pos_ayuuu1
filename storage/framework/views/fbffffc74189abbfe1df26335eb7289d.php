

<?php $__env->startSection('title', 'Produk'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container py-4">
        <?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4" role="alert">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-check-circle-fill fs-5"></i>
                    <div class="fw-medium"><?php echo e(session('success')); ?></div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 pb-3 border-bottom gap-3">
            <div>
                <h1 class="fw-bold text-dark m-0 d-flex align-items-center gap-2">
                    <i class="bi bi-box-seam-fill text-primary"></i> Halaman Produk
                </h1>
                <p class="text-muted mb-0 small">Kelola katalog produk, harga, serta ketersediaan stok toko Anda secara
                    mudah.</p>
            </div>
            <div>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\Produk::class)): ?>
                    <a href="<?php echo e(route('produk.create')); ?>"
                        class="btn btn-primary px-4 py-2 rounded-3 shadow-sm fw-semibold d-inline-flex align-items-center gap-2">
                        <i class="bi bi-plus-lg"></i>Tambah Produk
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <form action="<?php echo e(route('produk.index')); ?>" method="GET" class="mb-4">
        <div class="input-group" style="max-width: 400px;">
            <input 
                type="text" 
                name="search" 
                value="<?php echo e(request('search')); ?>" 
                class="form-control bg-light" 
                placeholder="Search nama produk"
            >
            <button class="btn btn-outline-secondary px-4 fw-semibold" type="submit">
                <i class="fa-solid fa-magnifying-glass me-1"></i> Cari
            </button>
        </div>
    </form>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-secondary small text-uppercase">
                        <tr>
                            <th scope="col" class="py-3 ps-4" style="width: 50px;">#</th>
                            <th scope="col" class="py-3">User</th>
                            <th scope="col" class="py-3 text-center" style="width: 90px;">Foto</th>
                            <th scope="col" class="py-3">Nama</th>
                            <th scope="col" class="py-3">Jenis Produk</th>
                            <th scope="col" class="py-3">Harga Pokok</th>
                            <th scope="col" class="py-3">Harga Jual</th>
                            <th scope="col" class="py-3 text-center" style="width: 120px;">Stok</th>
                            <th scope="col" class="py-3 text-center" style="width: 180px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <th scope="row" class="ps-4 text-muted font-monospace fw-normal small">
                                    <?php echo e($products->firstItem() + $loop->index); ?>

                                </th>
                                <td class="fw-medium text-secondary small">
                                    <i class="bi bi-person-circle me-1 text-muted"></i>
                                    <?php echo e($product->user->name); ?>

                                </td>
                                <td class="text-center">
                                    <?php if($product->foto && Storage::disk('public')->exists($product->foto)): ?>
                                        <img src="<?php echo e(asset('storage/' . $product->foto)); ?>" width="50" height="50"
                                            class="rounded-3 border object-fit-cover shadow-sm">
                                    <?php else: ?>
                                        <div class="bg-light text-muted border rounded-3 d-flex align-items-center justify-content-center mx-auto shadow-sm"
                                            style="width: 50px; height: 50px;">
                                            <i class="bi bi-image text-secondary fs-5"></i>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="fw-semibold text-dark"><?php echo e($product->nama); ?></td>
                                <td>
                                    <span
                                        class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-2 py-1 small">
                                        <?php echo e($product->jenis->nama_jenis ?? '-'); ?> </span>
                                </td>
                                <td class="text-nowrap text-secondary font-monospace small">
                                    Rp <?php echo e(number_format($product->harga_beli, 0, ',', '.')); ?>

                                </td>
                                <td class="text-nowrap fw-bold text-success font-monospace">
                                    Rp <?php echo e(number_format($product->harga_jual, 0, ',', '.')); ?>

                                </td>
                                <td class="text-center">
                                    <?php if($product->stok <= 0): ?>
                                        <span
                                            class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3 py-1"><i
                                                class="bi bi-x-circle me-1"></i> Habis</span>
                                    <?php elseif($product->stok <= 5): ?>
                                        <span
                                            class="badge bg-warning-subtle text-dark border border-warning-subtle rounded-pill px-3 py-1"><i
                                                class="bi bi-exclamation-triangle me-1"></i> <?php echo e($product->stok); ?></span>
                                    <?php else: ?>
                                        <span
                                            class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1"><i
                                                class="bi bi-check-circle me-1"></i> <?php echo e($product->stok); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                  <div class="d-inline-flex align-items-center justify-content-center gap-1">

                               
                                    <a href="<?php echo e(route('produk.show', $product)); ?>"
                                      class="btn btn-sm btn-primary px-2 py-1"
                                      title="Detail">
                                   <i class="bi bi-eye-fill"></i>
                                   </a>

                               
                                  <?php if(strtolower(auth()->user()->role?->name ?? '') === 'admin'): ?>

                                   <a href="<?php echo e(route('produk.edit', $product)); ?>"
                                     class="btn btn-sm btn-warning text-dark px-2 py-1"
                                    title="Edit">
                                   <i class="bi bi-pencil-square"></i>
                                  </a>

                                    <form action="<?php echo e(route('produk.destroy', $product)); ?>"
                                          method="POST"
                                          class="d-inline m-0 p-0"
                                         onsubmit="return confirm('Apakah anda yakin akan menghapus produk ini?')">

                                         <?php echo csrf_field(); ?>
                                         <?php echo method_field('DELETE'); ?>

                                 <button type="submit"
                                         class="btn btn-sm btn-danger px-2 py-1"
                                        title="Hapus">
                                      <i class="bi bi-trash-fill"></i>
                                 </button>

                                   </form>

                                  <?php endif; ?>

                         </div>
                             </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="9" class="text-center py-5 text-muted">
                                    <i class="bi bi-box-seam display-6 d-block mb-2 text-secondary opacity-50"></i>
                                    Data tidak tersedia.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php if($products->hasPages()): ?>
                <div class="card-footer bg-white border-top py-3 px-4 d-flex justify-content-between align-items-center">
                    <div class="small text-muted">
                        Showing <?php echo e($products->firstItem()); ?> to <?php echo e($products->lastItem()); ?> of <?php echo e($products->total()); ?>

                        results
                    </div>
                    <div>
                        <?php echo e($products->links()); ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_ayuuu\resources\views/produk/index.blade.php ENDPATH**/ ?>