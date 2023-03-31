<?php /* Template Name: empa subpage */ 

get_header();

?>
<div class="container-fluid subpage-header" style="background: url('<?= get_post_meta(get_queried_object_id(), 'subpage_background_url', true); ?>')">

</div>
<div class="container mb-5">
	<div class="empa-breadcrumb mt-3">

	<?php 

		echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
		echo "&nbsp;,&nbsp;";
		echo '<a href="'.get_permalink(wp_get_post_parent_id(get_queried_object_id())).'" rel="nofollow">'.get_the_title(wp_get_post_parent_id(get_queried_object_id())).'</a>';
		echo "&nbsp;,&nbsp;";
		echo  get_the_title(get_queried_object_id());
	
	?>
	</div>
	<div class="row mt-5">
		<div class=" col-lg-3 sidebar px-0 ">
			<h2><?= get_the_title(wp_get_post_parent_id(get_queried_object_id())); ?></h2>
			<?php
			wp_nav_menu(['theme_location' => 'sidebar'])
			?>
		</div>
		<div class=" col-lg-9 pl-4">
			<?php
			while (have_posts()) :
				the_post();

				the_content();

				// If comments are open or we have at least one comment, load up the comment template.
				if (comments_open() || get_comments_number()) {
					comments_template();
				}

			endwhile; // End the loop.
			?>
		</div>
	</div>
</div>
<?php

get_footer();
