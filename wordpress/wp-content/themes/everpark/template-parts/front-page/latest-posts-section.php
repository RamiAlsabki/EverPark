<?php

// Query latest blog posts
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
);

$query = new WP_Query($args);

?>

<div id="latest-container" class="container-fluid bg-light p-7">
	<div id="latest-row" class="row p-7">


<?php
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
?>

        <div id="latest-col" class="col-4">
            <div class="card shadow-sm h-100">
<?php
if (has_post_thumbnail()) : ?>  
                <img src="<?php the_post_thumbnail_url('full'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
<?php 
endif;
?>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title pt-2 pb-2"><?php the_title(); ?></h2>
                    <p class="card-text pt-2 align-self-end"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                </div>
                <div class="card-footer py-4">

                <a href="<?php the_permalink(); ?>"> Lue lisää <i class="bi bi-arrow-right"></i> </a>

</div>
            </div>
        </div>

<?php
endwhile;
endif;
wp_reset_postdata();
?>

        <div id="more-posts-row" class="row bg-light text-center">
            <div id="more-posts-column" class="col-12 text-center pt-7">
		        <button id="more-posts-button" class="btn btn-primary uppercase text-center"> Lisää uutisia </button>
	        </div> <!-- End of #more-posts-column -->
        </div> <!-- End of #more-posts-row -->
    </div> <!-- End of #latest-row -->
</div> <!-- End of #latest-container -->