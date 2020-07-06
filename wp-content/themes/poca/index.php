<?php get_header(); ?>
<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/bg-img/2.jpg)">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <h2 class="title mt-70">Blog</h2>
        </div>
      </div>
    </div>
</div>
  <div class="breadcumb--con">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Breadcrumb Area End ***** -->

  <!-- ***** Blog Area Start ***** -->
  <section class="blog-area">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-8">
        <?php 
        if(have_posts()){
          while(have_posts()){
              the_post();
    
        ?>
          <!-- Single Blog Area -->
          <div class="single-blog-area mt-50 mb-50">
            <a href="#" class="mb-30">
             <?php the_post_thumbnail(); ?>
            <!-- Content -->
            <div class="post-content">
              <a href="#" class="post-date"><?php the_date(); ?></a>
              <a href="<?php the_permalink(); ?>" class="post-title"><?php the_title(); ?></a>
              <div class="post-meta mb-15">
                <a href="#" class="post-author">By <?php the_author(); ?></a> |

                <?php the_category(','); ?>
                
              </div>
              <?php the_excerpt(); ?>
              <a href="<?php the_permalink(); ?>" class="read-more-btn">Continue reading <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </div>
          </div>
          <?php 
          }
        }
          ?>

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Newer</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">Older &rarr;</a>            
          </li>
        </ul>  
        </div>

        <?php get_sidebar(); ?>

      </div>
           
    </div>
    
    
  </section>
  
  <!-- ***** Blog Area End ***** -->
<?php get_footer(); ?>