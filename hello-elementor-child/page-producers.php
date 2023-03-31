<?php /* Template Name: empa producers  */ ?>
<?php
get_header();

?>
<div class="container-fluid subpage-header" style="background: url('<?= get_post_meta(get_queried_object_id(), 'subpage_background_url', true); ?>')">

</div>
<div class="container mb-5">
	<div class="empa-breadcrumb mt-3">

		<?php

		echo '<a href="' . home_url() . '" rel="nofollow">Home</a>';
		echo "&nbsp;,&nbsp;";
		echo '<a href="' . get_permalink(wp_get_post_parent_id(get_queried_object_id())) . '" rel="nofollow">' . get_the_title(wp_get_post_parent_id(get_queried_object_id())) . '</a>';
		echo "&nbsp;,&nbsp;";
		echo  get_the_title(get_queried_object_id());

		?>
	</div>
	<div class="row mt-5">
		<div class=" container m-auto producer-cat-list px-0">
			<ul>
				<?php
				$args = array(
					'type' => 'empa-producers',
					'taxonomy' => 'empa_producers_cats',
					'orderby' => 'ID',
					'parent' => 0
				);

				$cats = get_categories($args);

				foreach ($cats as $cat) {
				?>
					<li >
						<a attr-id="<?= $cat->term_id ?>" href="<?php echo get_category_link($cat->term_id) ?>">
							<?php echo $cat->name; ?>
						</a>
					</li>
				<?php
				}
				?>
			</ul>
		</div>
		<div class="container-fluid producer-list mt-4 row">

			<ul>
				<?php
				$args = array(
					'type' => 'empa-producers',
					'taxonomy' => 'empa_producers_cats',
					'parent' => '49'

				);

				$cats = get_categories($args);
				foreach ($cats as $cat) {
				?>
					<li  class="">
						<a href="<?php echo get_the_permalink(get_term_meta($cat->term_id,'empat_producers_url_page',true)) ?>">
							<img src="<?= get_term_meta($cat->term_id, 'empat_producers_url', true) ?>">
						</a>
					</li>
				<?php
				}
				?>
			</ul>
		</div>
	</div>
</div>
<?php

get_footer();
