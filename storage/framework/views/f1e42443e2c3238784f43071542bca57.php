

<?php $__env->startSection('title', 'Tentang'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .about-card {
        transition: transform .2s ease, box-shadow .2s ease;
        position: relative;
        overflow: hidden;
    }
    .about-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(13, 110, 253, .10) !important;
    }
    .card-watermark {
        position: absolute;
        right: -20px; top: -20px;
        font-size: 160px;
        color: #0d6efd;
        opacity: .04;
        pointer-events: none;
        line-height: 1;
    }
    .gradient-text {
        background: linear-gradient(90deg, #0d6efd, #0a58ca);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    .avatar-ring {
        position: relative;
        width: 130px; height: 130px;
        margin: 0 auto;
    }
    .avatar-ring::before {
        content: "";
        position: absolute;
        inset: -5px;
        border-radius: 50%;
        border: 2px solid #0d6efd55;
        animation: pulseRing 2.5s ease-in-out infinite;
    }
    @keyframes pulseRing {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.06); opacity: .4; }
    }
    .social-btn { transition: all .2s ease; }
    .social-btn.gh:hover { background: #181717 !important; color: #fff !important; border-color: #181717 !important; }
    .social-btn.li:hover { background: #0A66C2 !important; color: #fff !important; border-color: #0A66C2 !important; }
    .social-btn.ig:hover {
        background: radial-gradient(circle at 30% 107%, #fdf497, #fd5949 45%, #d6249f 60%, #285AEB 90%) !important;
        color: #fff !important; border-color: transparent !important;
    }
    .feature-box, .bio-row { transition: background .15s ease; border-radius: 8px; }
    .feature-box:hover, .bio-row:hover { background: #f8fafc; }

    .profile-img-container {
    width: 130px;
    height: 130px;
    margin: 0 auto 15px;
    border-radius: 50%;
    overflow: hidden;
    border: 3px solid #0d6efd;
    background: #f8fafc;
    display: flex;
    align-items: center;
    justify-content: center;
     transform: translateY(-20px);
}

.profile-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
</style>

<div class="container py-4">
    <?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <div class="rounded-4 mb-4 p-4 text-center" style="background: linear-gradient(135deg, #eef4ff 0%, #f8fafc 100%); border: 1px solid #e2e8f0;">
        <h5 class="fw-bold text-dark mb-1">Tentang Kami</h5>
        <p class="text-muted small m-0">Kenali lebih dekat sistem dan orang di baliknya</p>
    </div>

    
    <div class="row mb-4">
        <div class="col-12">
            <div class="card about-card border-0 shadow-sm rounded-4 p-4">
                <i class="bi bi-shop card-watermark"></i>

                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-1 mb-3" style="width: fit-content;">
                    Point of Sale System
                </span>

                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="bg-primary text-white d-flex align-items-center justify-content-center rounded-4 shadow-sm" style="width: 56px; height: 56px;">
                        <i class="bi bi-shop fs-3"></i>
                    </div>
                    <div>
                        <h3 class="fw-bold gradient-text m-0">Tentang AyuMart</h3>
                        <p class="text-muted m-0">Sistem Point of Sale &amp; Kasir Online</p>
                    </div>
                </div>

                <div class="mb-3">
                    <p class="text-secondary mb-0" style="line-height: 1.8;">
                        <strong>AyuMart</strong> adalah aplikasi kasir berbasis web yang dirancang untuk membantu proses pengelolaan toko menjadi lebih mudah, praktis, dan terorganisir. Melalui AyuMart, pengguna dapat mengelola data produk, memantau ketersediaan stok, serta melakukan transaksi penjualan dalam satu sistem. Aplikasi ini juga dilengkapi dengan fitur manajemen pengguna, riwayat transaksi, notifikasi stok, dan laporan penjualan yang dapat membantu proses pencatatan menjadi lebih rapi serta mengurangi kesalahan pencatatan secara manual.
                    </p>
                </div>

                <hr class="my-4">

                <h6 class="fw-bold text-dark mb-3" style="position: relative;">
                    <i class="bi bi-stars text-primary me-2"></i>Fitur Unggulan
                </h6>

                
                <div class="row g-3 align-items-stretch" style="position: relative;">
                    <div class="col-6 col-md-3">
                        <div class="feature-box d-flex align-items-center gap-2 p-3 border h-100">
                            <div class="bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 36px; height: 36px;">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <span class="small fw-medium">Manajemen User</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="feature-box d-flex align-items-center gap-2 p-3 border h-100">
                            <div class="bg-success-subtle text-success rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 36px; height: 36px;">
                                <i class="bi bi-box-seam-fill"></i>
                            </div>
                            <span class="small fw-medium">Stok Produk Auto</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="feature-box d-flex align-items-center gap-2 p-3 border h-100">
                            <div class="bg-warning-subtle text-warning rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 36px; height: 36px;">
                                <i class="bi bi-credit-card-fill"></i>
                            </div>
                            <span class="small fw-medium">Kasir Multi-Payment</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="feature-box d-flex align-items-center gap-2 p-3 border h-100">
                            <div class="bg-info-subtle text-info rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 36px; height: 36px;">
                                <i class="bi bi-graph-up"></i>
                            </div>
                            <span class="small fw-medium">Dashboard Realtime</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="feature-box d-flex align-items-center gap-2 p-3 border h-100">
                            <div class="bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 36px; height: 36px;">
                                <i class="bi bi-file-earmark-bar-graph-fill"></i>
                            </div>
                            <span class="small fw-medium">Laporan Penjualan</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="feature-box d-flex align-items-center gap-2 p-3 border h-100">
                            <div class="bg-danger-subtle text-danger rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 36px; height: 36px;">
                                <i class="bi bi-bell-fill"></i>
                            </div>
                            <span class="small fw-medium">Notifikasi Stok</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="feature-box d-flex align-items-center gap-2 p-3 border h-100">
                            <div class="bg-secondary-subtle text-secondary rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 36px; height: 36px;">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <span class="small fw-medium">Riwayat Transaksi</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    
    <div class="row mb-4">
        <div class="col-12">
            <div class="card about-card border-0 shadow-sm rounded-4 p-4">
                <i class="bi bi-person-vcard-fill card-watermark"></i>

                <h6 class="fw-bold text-dark mb-4" style="position: relative;">
                    <i class="bi bi-person-lines-fill text-primary me-2"></i>Biodata Pengembang
                </h6>

                <div class="row align-items-center g-4" style="position: relative;">
                    
                    <div class="col-lg-4 text-center border-end-lg pe-lg-4">
                        <div class="profile-img-container">
                          <img src="<?php echo e(asset('images/profil.jpeg.jpeg')); ?>"
                               alt="Foto Ayu Nurul Huda"
                              class="profile-img">
                         </div>
                        <h5 class="fw-bold text-dark mb-1">Ayu Nurul Huda</h5>
                        <p class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-1 rounded-pill mb-3">
                            Developer &amp; Creator
                        </p>

                        <div class="d-flex justify-content-center gap-3">
                            <a href="https://github.com/ayuuu309" target="_blank" rel="noopener noreferrer"
                               class="social-btn gh btn btn-sm btn-outline-dark rounded-circle d-inline-flex align-items-center justify-content-center"
                               style="width: 38px; height: 38px;" title="GitHub">
                                <i class="bi bi-github"></i>
                            </a>
                            <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer"
                               class="social-btn wa btn btn-sm btn-outline-success rounded-circle d-inline-flex align-items-center justify-content-center"
                               style="width: 38px; height: 38px;" title="WhatsApp">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                            <a href="https://instagram.com/park_cill" target="_blank" rel="noopener noreferrer"
                               class="social-btn ig btn btn-sm btn-outline-danger rounded-circle d-inline-flex align-items-center justify-content-center"
                               style="width: 38px; height: 38px;" title="Instagram">
                                <i class="bi bi-instagram"></i>
                            </a>
                        </div>
                    </div>

                    
                    <div class="col-lg-8">
                        <div class="row g-3 align-items-stretch">
                            <div class="col-md-6">
                                <div class="bio-row d-flex align-items-center gap-3 p-3 border h-100">
                                    <div class="bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                                        <i class="bi bi-person-badge-fill fs-5"></i>
                                    </div>
                                    <div>
                                        <span class="text-muted d-block small">Nama Lengkap</span>
                                        <span class="fw-semibold text-dark">Ayu Nurul Huda</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="bio-row d-flex align-items-center gap-3 p-3 border h-100">
                                    <div class="bg-secondary-subtle text-secondary rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                                        <i class="bi bi-gender-ambiguous fs-5"></i>
                                    </div>
                                    <div>
                                        <span class="text-muted d-block small">Jenis Kelamin</span>
                                        <span class="fw-semibold text-dark">Perempuan</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="bio-row d-flex align-items-center gap-3 p-3 border h-100">
                                    <div class="bg-danger-subtle text-danger rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                                        <i class="bi bi-cake2-fill fs-5"></i>
                                    </div>
                                    <div>
                                        <span class="text-muted d-block small">Tempat, Tanggal Lahir</span>
                                        <span class="fw-semibold text-dark">Tasikmalaya, 31 Agustus 2008</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="bio-row d-flex align-items-center gap-3 p-3 border h-100">
                                    <div class="bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                                        <i class="bi bi-envelope-fill fs-5"></i>
                                    </div>
                                    <div>
                                        <span class="text-muted d-block small">Email</span>
                                        <span class="fw-semibold text-dark">ayu@ayumart.com</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="bio-row d-flex align-items-center gap-3 p-3 border h-100">
                                    <div class="bg-success-subtle text-success rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                                        <i class="bi bi-telephone-fill fs-5"></i>
                                    </div>
                                    <div>
                                        <span class="text-muted d-block small">No. HP</span>
                                        <span class="fw-semibold text-dark">0812-3456-7890</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="bio-row d-flex align-items-center gap-3 p-3 border h-100">
                                    <div class="bg-success-subtle text-success rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                                        <i class="bi bi-geo-alt-fill fs-5"></i>
                                    </div>
                                    <div>
                                        <span class="text-muted d-block small">Alamat</span>
                                        <span class="fw-semibold text-dark">Tasikmalaya, Jawa Barat</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="bio-row d-flex align-items-center gap-3 p-3 border h-100">
                                    <div class="bg-warning-subtle text-warning rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                                        <i class="bi bi-mortarboard-fill fs-5"></i>
                                    </div>
                                    <div>
                                        <span class="text-muted d-block small">Sekolah / Jurusan</span>
                                        <span class="fw-semibold text-dark">SMKN 4 - RPL</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="bio-row d-flex align-items-center gap-3 p-3 border h-100">
                                    <div class="bg-info-subtle text-info rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px;">
                                        <i class="bi bi-calendar-check-fill fs-5"></i>
                                    </div>
                                    <div>
                                        <span class="text-muted d-block small">Bergabung Sejak</span>
                                        <span class="fw-semibold text-dark">2024</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_ayuuu\resources\views/tentang.blade.php ENDPATH**/ ?>