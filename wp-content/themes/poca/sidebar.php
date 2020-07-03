<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package poca
 */


?>
<div class="col-12 col-lg-4">	
	  <div class="sidebar-area mt-5">
        
      <div class="single-widget-area search-widget-area mb-80">
        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
          <?php dynamic_sidebar( 'sidebar-1' ); ?>
          <?php
            else :
              echo 'No widgets to display!';
              ?>
          <!-- Time to add some widgets! -->
        <?php endif; ?>
      </div>
     
		</div>
</div>


           