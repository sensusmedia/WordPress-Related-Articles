<?php wp_reset_postdata(); ?>

<div class="row">
	<?php
	$tags = wp_get_post_tags($post->ID);
	$tag_ids = array();
	foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
	$currentID = get_the_ID();
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 2,
		'post__not_in' => array($currentID),
		'tag__in' => $tag_ids,
	);
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post(); ?>

		<!-- Do Something -->

	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>			
</div>
