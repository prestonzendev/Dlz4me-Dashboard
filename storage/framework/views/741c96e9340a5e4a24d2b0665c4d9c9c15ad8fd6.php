<div class="top-headerbar header-menu-bar">
  <div class="container">
    <div class="d-flex justify-content-between">
      <div class="top-left">
        <?php 
      //dd($reqPath);
      $home = $dashboard = $profile = $offer_regt = '';
      switch ($reqPath) {
        case '/': $home = 'active';
          break;
        case 'vendor/dashboard': $dashboard = 'active';
          break;
        case 'dashboard': $dashboard = 'active';
          break;
        case 'vendor/profile': $profile = 'active';
          break;
        case 'profile': $profile = 'active';
        break;
        case 'vendor/offerform': $offer_regt = 'active';
          break;
      }
      ?>
        <ul>

            <li><a href="<?php echo e(route('frontend.index')); ?>"><?php echo e(trans('navs.general.home')); ?></a></li>
            <?php if(\Auth::guard('user')->check()): ?>
              <?php if(Auth::guard('user')->user()->roles()->first()->id==2): ?>
              <li class="<?php echo e($dashboard); ?>"><a href="<?php echo e(route('frontend.vendor.dashboard')); ?>">Dashboard</a></li>
              <li class="<?php echo e($profile); ?>"><a href="<?php echo e(route('frontend.vendor.profile')); ?>">Profile</a></li>
              <li class="<?php echo e($offer_regt); ?>"><a href="<?php echo e(route('frontend.vendor.show-offer')); ?>">Offer Registration</a></li>
              <?php else: ?>
              <li class="<?php echo e($dashboard); ?>"><a href="<?php echo e(route('frontend.user.dashboard')); ?>">Dashboard</a></li>
              <li class="<?php echo e($profile); ?>"><a href="<?php echo e(route('frontend.user.profile')); ?>">Profile</a></li>
              <?php endif; ?>
            <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
</div>