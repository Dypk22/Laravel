<footer class="py-4 bg-footer mt-auto">
   <div class="container-fluid">
      <div class="d-flex align-items-center footer-links justify-content-between small">
         <?php $year=date('Y'); $final_year=substr( $year, -2); ?>
         <div class="text-muted-1">© 2020-<?php echo $final_year; ?> <b>{{config('constants.site_name')}}</b></div>
      </div>
   </div>
</footer>