<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($title); ?></title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <style>
      .mynav{
        background: rgb(2,0,36);
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(146,32,240,1) 100%);
      }
      .mynav a {
        margin-right: 10px;
        color: white !important;
        border-bottom: 2px solid transparent;
      }

      .mynav a:hover {
          border-bottom: 2px solid white;
      }

      .active a {
          border-bottom: 2px solid white;
      }
      ul .mymenu
      {
        background: rgb(2,0,36);
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(146,32,240,1) 100%);
      }
      .mymenu a:hover
      {
        background: rgb(2,0,36);
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(146,32,240,1) 100%);
      }

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg shadow mynav">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item <?php echo e(Request()->is('home') ? 'active' : ''); ?>">
            <a class="nav-link " href="<?php echo e(url('home')); ?>">Home</a>
          </li>
          <li class="nav-item <?php echo e(Request()->is('product') ? 'active' : ''); ?>">
            <a class="nav-link " href="<?php echo e(url('product')); ?>">Show Product</a>
          </li>
        </ul>
            <ul class="navbar-nav ms-auto">

                <?php if(auth()->guard()->guest()): ?>
                <ul class="navbar-nav ms-auto mydrop">
                    <?php if(Route::has('login')): ?>
                        <li class="nav-item <?php echo e(Request()->is('login') ? 'active' : ''); ?>">
                            <a class="nav-link bi bi-box-arrow-in-right" href="<?php echo e(route('login')); ?>">  Login</a>
                        </li>
                    <?php endif; ?>

                    <?php if(Route::has('register')): ?>
                        <li class="nav-item <?php echo e(Request()->is('register') ? 'active' : ''); ?> ">
                            <a class="nav-link bi-person-plus" href="<?php echo e(route('register')); ?>">   Register</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <?php endif; ?>
                <?php if(auth()->guard()->check()): ?>
                <?php if(Auth::user()->level == 'admin'): ?>
                <ul class="navbar-nav ms-auto mydrop">
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle  bi bi-box-seam" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Manage Item
                    </a>
                    <ul class="dropdown-menu mymenu" aria-labelledby="navbarDropdown">
                      <li><a class="nav-link bi bi-bookmark" href="/item">  View Item</a></li>
                      <li><a class="nav-link bi bi-bookmark-plus" href="/additem">  Add Item</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle  bi bi-person" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Profile
                    </a>
                    <ul class="dropdown-menu mymenu" aria-labelledby="navbarDropdown">
                      <li><a class="nav-link" href="#"><?php echo e(Auth::User()->name); ?></a></li>
                      <li><a class="nav-link bi bi-person-gear" href="<?php echo e(url('profile')); ?>">  Edit Profile</a></li>
                      <li><a class="nav-link bi bi-person-lock" href="<?php echo e(route('password')); ?>">  Password</a></li>
                      <li><hr class="dropdown-divider bg-white"></li>
                      <li><a class="nav-link bi bi-box-arrow-right" href="<?php echo e(route('logout')); ?>">  Log out</a></li>
                    </ul>
                  </li>
                </ul>
                <?php endif; ?>
                <?php if(Auth::user()->level == 'member'): ?>
                <ul class="navbar-nav ms-auto mydrop">
                    <li class="nav-item <?php echo e(Request()->is('checkout') ? 'active' : ''); ?>">
                        <a class="nav-link bi bi-cart2" href="/checkout"> Cart</a>
                      </li>
                      <li class="nav-item <?php echo e(Request()->is('history') ? 'active' : ''); ?>">
                        <a class="nav-link bi bi-clock-history" href="/history"> History</a>
                      </li>
                  <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle  bi bi-person" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Profile
                    </a>
                    <ul class="dropdown-menu mymenu" aria-labelledby="navbarDropdown">
                      <li><a class="nav-link" href="#"><?php echo e(Auth::User()->name); ?></a></li>
                      <li><a class="nav-link bi bi-person-gear" href="<?php echo e(url('profile')); ?>">  Edit Profile</a></li>
                      <li><a class="nav-link bi bi-person-lock" href="<?php echo e(route('password')); ?>">  Password</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="nav-link bi bi-box-arrow-right" href="<?php echo e(route('logout')); ?>">  Log out</a></li>
                    </ul>
                  </li>
                </ul>
                <?php endif; ?>
                <?php endif; ?>
            </ul>
      </div>
    </div>
</nav>
<div class="container">
    <?php echo $__env->yieldContent('content'); ?>
</div>
<footer>
    <ul class="justify-content-center border-bottom pb-3 mb-3 " disabled>
    </ul>
    <p class="text-center text-muted">© 2022 Copyright Lab</p>
  </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

<?php /**PATH D:\Computer Science\BINUS\Sem 5\Web Programming\BH01\FinalProject2\resources\views/layouts/app.blade.php ENDPATH**/ ?>