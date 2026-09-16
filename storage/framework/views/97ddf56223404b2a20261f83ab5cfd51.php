

<?php $__env->startSection('title', 'Edit Produk'); ?>

<?php $__env->startSection('content'); ?>
<h4>Edit Produk</h4>

<form action="<?php echo e(route('produk.update', $produk)); ?>"
      method="POST"
      enctype="multipart/form-data">
      <?php echo method_field('PUT'); ?>
<?php echo $__env->make('Produk._form',['product' => $produk], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_ayuuu1\resources\views/produk/edit.blade.php ENDPATH**/ ?>