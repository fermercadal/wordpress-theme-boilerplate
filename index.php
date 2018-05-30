<?php get_header(); ?>

<!--  wp loop -->
<?php
    // categoría dinámica // $cat_ID = get_query_var('cat');
    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
    $args = array(
        'paged' => $paged,
        'posts_per_page' => 6,
        'order' => DESC,
        'category_name' => slug
        //'category__in' => $cat_ID,
        //'category__in' => 1,
        //'category__in' => array(1,2),
        //'category__not_in' => 1,
        //'post_type' => 'el-custom-post-type',
        //'tax_query' => array(array('taxonomy' => '-categorias-', 'field'    => 'slug', 'terms'    => '-categoría-'))
    );
    $the_query = new WP_Query($args);
    while ($the_query->have_posts()): 
        $the_query->the_post(); ?>

                <?php the_post_thumbnail( 'img-custom-size', array( 'class' => 'class' ) ); ?>
                <?php the_time('j \d\e F \d\e Y');?>
                <?php the_time('j / m / Y');?>
                <?php the_title(); ?>
                <?php the_excerpt(); ?>
                <?php the_permalink(); ?>
                <?php the_field('advanced-custom-field-slug'); ?>
    <?php
    endwhile; ?>

    <div class="paginador">
        <?php $big = 999999999;
            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $the_query->max_num_pages
            ) ); ?>
    </div>
<?php                   
wp_reset_postdata();
?>

<?php get_footer(); ?>