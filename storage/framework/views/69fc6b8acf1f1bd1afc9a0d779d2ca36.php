<nav class="navbar navbar-expand-lg rounded-4 mb-4 px-3 py-2 shadow-sm border" 
     style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%) !important;">
  <div class="container-fluid">
    
   <a class="navbar-brand text-dark fw-bold me-4 d-flex align-items-center gap-2 mb-0"
   href="<?php echo e(route('tentang.perusahaan')); ?>">
    <i class="bi bi-shop-window"></i>
    <span>AyuMart</span>
</a>
      
    
    <button class="navbar-toggler border-0 text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-1">
        <li class="nav-item">
          <a class="nav-link px-3 py-1.5 rounded-3 fw-medium <?php echo e(Request::is('dashboard') ? 'bg-primary text-white active' : 'text-dark'); ?>" 
             href="<?php echo e(route('dashboard')); ?>"> <i class="bi bi-house-fill"></i>
             Dashboard
          </a>
        </li>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\User::class)): ?>
        <li class="nav-item">
          <a class="nav-link px-3 py-1.5 rounded-3 fw-medium <?php echo e(Request::is('admin/users*') ? 'bg-primary text-white active' : 'text-dark'); ?>" 
             href="<?php echo e(route('admin.users')); ?>"> <i class="bi bi-people-fill"></i>
             Users
          </a>
        </li>
        <?php endif; ?>

         
        <li class="nav-item">
          <a class="nav-link px-3 py-1.5 rounded-3 fw-medium <?php echo e(Request::is('jenis*') ? 'bg-primary text-white active' : 'text-dark'); ?>" 
             href="<?php echo e(route('jenis.index')); ?>"> <i class="bi bi-tags-fill"></i>
          Jenis
          </a>
        </li>

        
        <li class="nav-item">
          <a class="nav-link px-3 py-1.5 rounded-3 fw-medium <?php echo e(Request::is('produk*') ? 'bg-primary text-white active' : 'text-dark'); ?>" 
             href="<?php echo e(route('produk.index')); ?>"> <i class="bi bi-box-fill"></i>
             Produk
          </a>
        </li>

  

        
        <li class="nav-item">
          <a class="nav-link px-3 py-1.5 rounded-3 fw-medium <?php echo e(Request::is('penjualan*') ? 'bg-primary text-white active' : 'text-dark'); ?>" 
             href="<?php echo e(route('penjualan.index')); ?>"> <i class="bi bi-cart-fill"></i>
             Penjualan
          </a>
        </li>

        
        <li class="nav-item">
            <a class="nav-link px-3 py-1.5 rounded-3 fw-medium <?php echo e(Request::is('tentang') ? 'bg-primary text-white active' : 'text-dark'); ?>" 
                href="<?php echo e(route('tentang')); ?>">  <i class="bi bi-info-circle-fill me-2"></i>Tentang
           </a>
        </li>
      </ul>

      
      <div class="d-flex align-items-center gap-3">
        <?php if(auth()->guard()->check()): ?>
          <?php
            // Logika mengambil inisial nama
            $words = explode(' ', Auth::user()->name);
            $initials = strtoupper(substr($words[0], 0, 1) . (isset($words[1]) ? substr($words[1], 0, 1) : ''));
          ?>

          <div class="d-flex align-items-center gap-2 me-2">
            <div class="rounded-circle bg-primary text-white fw-bold d-flex align-items-center justify-content-center shadow-sm" 
                 style="width: 38px; height: 38px; font-size: 14px;">
              <?php echo e($initials); ?>

            </div>

            <div class="d-flex flex-column text-start" style="line-height: 1.2;">
              <span class="fw-bold text-dark" style="font-size: 14px;">
                <?php echo e(Auth::user()->name); ?>

              </span>
              <span class="text-secondary text-capitalize" style="font-size: 11px;">
                <?php echo e(Auth::user()->role->name ?? (is_string(Auth::user()->role) ? Auth::user()->role : 'Staff')); ?>

              </span>
            </div>
          </div>
        <?php endif; ?>

        
        <form class="d-flex m-0" action="<?php echo e(route('logout')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <button type="submit" class="btn btn-danger fw-semibold px-3 py-1.5 rounded-3 border-0 shadow-sm" style="background-color: #ef4444;">
            Keluar
          </button>
        </form>
      </div>

    </div>
  </div>
</nav><?php /**PATH C:\laragon\www\pos_ayuuu\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>