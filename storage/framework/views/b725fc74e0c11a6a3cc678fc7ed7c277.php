

<?php $__env->startSection('title', 'Kelola Jenis Produk'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
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

        <?php if(strtolower(auth()->user()->role->name ?? auth()->user()->role->nama_role ?? '') === 'admin'): ?>
    <a href="<?php echo e(route('jenis.create')); ?>"
       class="btn btn-primary fw-semibold px-4 py-2 rounded-3 shadow-sm d-inline-flex align-items-center gap-2">
        <i class="bi bi-plus-lg fs-6"></i>
        <span>Tambah Jenis Baru</span>
    </a>
<?php endif; ?>

        </div>
    </div>


    
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 d-flex align-items-center gap-2 mb-4"
             role="alert"
             style="background-color: #d1e7dd; color: #0f5132;">

            <i class="bi bi-check-circle-fill fs-5"></i>

            <div>
                <?php echo e(session('success')); ?>

            </div>

            <button type="button"
                    class="btn-close ms-auto"
                    data-bs-dismiss="alert"
                    aria-label="Close">
            </button>

        </div>
    <?php endif; ?>


    
    <form action="<?php echo e(route('jenis.index')); ?>"
          method="GET"
          class="mb-4">

        <div class="input-group" style="max-width: 400px;">

            <input
                type="text"
                name="search"
                value="<?php echo e(request('search')); ?>"
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


    
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    
                    <thead style="background-color: #f1f5f9;"
                           class="border-bottom">

                        <tr class="text-secondary small text-uppercase fw-bold"
                            style="letter-spacing: 0.5px;">

                            
                            <th class="px-4 py-3.5"
                                style="width: 90px;">
                                No
                            </th>

                            
                            <th class="py-3.5">
                                Nama Jenis
                            </th>

                            
                            <th class="py-3.5">
                                Ditambahkan Oleh
                            </th>

                            
                            <th class="px-4 py-3.5 text-end"
                                style="width: 220px;">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    
                    <tbody class="divide-y">

                        <?php $__empty_1 = true; $__currentLoopData = $jenis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                            <tr>

                                
                                <td class="px-4 py-3 fw-medium text-secondary">

                                    <span class="badge bg-light text-dark border px-2.5 py-1.5 rounded-2">

                                        #<?php echo e(method_exists($jenis, 'firstItem')
                                            ? $jenis->firstItem() + $index
                                            : $index + 1); ?>


                                    </span>

                                </td>


                                
                                <td class="py-3">

                                    <div class="d-flex align-items-center gap-2">

                                        <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center"
                                             style="width: 35px; height: 35px;">

                                            <i class="bi bi-grid-fill"></i>

                                        </div>

                                        <span class="fw-bold text-dark fs-6">
                                            <?php echo e($item->nama_jenis
                                                ?? $item->nama
                                                ?? $item->jenis
                                                ?? 'Tanpa Nama'); ?>

                                        </span>
                                    </div>
                                </td>


                                
                                <td class="py-3">

                                    <?php if($item->user): ?>

                                        <div class="d-flex align-items-center gap-2">

                                            
                                            <div class="rounded-circle bg-success-subtle text-success d-flex align-items-center justify-content-center"
                                                 style="width: 35px; height: 35px;">

                                                <i class="bi bi-person-fill"></i>

                                            </div>


                                            
                                            <div>

                                                <span class="fw-semibold text-dark d-block">

                                                    <?php echo e($item->user->name); ?>


                                                </span>

                                                <small class="text-muted">

                                                    Admin

                                                </small>

                                            </div>

                                        </div>

                                    <?php else: ?>

                                        
                                        <div class="d-flex align-items-center gap-2">

                                            <div class="rounded-circle bg-secondary-subtle text-secondary d-flex align-items-center justify-content-center"
                                                 style="width: 35px; height: 35px;">

                                                <i class="bi bi-person-x-fill"></i>

                                            </div>

                                            <span class="text-muted small">

                                                Tidak diketahui

                                            </span>

                                        </div>

                                    <?php endif; ?>

                                </td>


                          <td class="px-4 py-3 text-end">

               <?php if(strtolower(auth()->user()->role->name ?? '') === 'admin'): ?>

                    <div class="d-flex justify-content-end align-items-center gap-2">

                  
            <a href="<?php echo e(route('jenis.show', $item->id)); ?>"
               class="btn btn-primary action-icon"
               title="Detail">
                <i class="bi bi-eye-fill"></i>
            </a>

            
            <a href="<?php echo e(route('jenis.edit', $item->id)); ?>"
               class="btn btn-warning action-icon"
               title="Edit">
                <i class="bi bi-pencil-square"></i>
            </a>

            
            <form action="<?php echo e(route('jenis.destroy', $item->id)); ?>"
                  method="POST"
                  class="d-inline"
                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus jenis produk ini?')">

                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>

                <button type="submit"
                        class="btn btn-danger btn-sm delete-btn"
                        title="Hapus">
                    <i class="bi bi-trash-fill"></i>
                </button>

            </form>

        </div>

    <?php elseif(strtolower(auth()->user()->role->name ?? '') === 'kasir'): ?>

        
        <a href="<?php echo e(route('jenis.show', $item->id)); ?>"
           class="btn btn-primary btn-sm action-btn"
           title="Detail">
            <i class="bi bi-eye-fill"></i>
            <span>Detail</span>
        </a>
            <?php endif; ?>
              </td>
                </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            
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

                                        <a href="<?php echo e(route('jenis.create')); ?>"
                                           class="btn btn-sm btn-outline-primary rounded-3 px-3">
                                            + Tambah Sekarang
                                        </a>
                                    </div>

                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>


        
        <?php if(method_exists($jenis, 'hasPages') && $jenis->hasPages()): ?>

            <div class="card-footer bg-white border-top py-3 px-4">

                <div class="d-flex justify-content-between align-items-center">

                    <span class="small text-muted">

                        Menampilkan data
                        <?php echo e($jenis->firstItem()); ?>

                        -
                        <?php echo e($jenis->lastItem()); ?>

                        dari
                        <?php echo e($jenis->total()); ?>

                        jenis

                    </span>

                    <div>

                        <?php echo e($jenis->appends(request()->query())->links()); ?>


                    </div>

                </div>

            </div>

        <?php endif; ?>

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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_ayuuu\resources\views/jenis/index.blade.php ENDPATH**/ ?>