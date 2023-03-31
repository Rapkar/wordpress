<?php
/* Template Name: empa cat Producers 
 Template Post Type: empa-producer-page
  */
?>
<?php
get_header();

?>
<div class="container-fluid subpage-header" style="background: url('<?= get_post_meta(get_queried_object_id(), 'subpage_background_url', true); ?>');background-size: cover;">
	<div class="container h-100">
		<div class="row h-100">
			<div class="col-3 d-flex justify-content-end align-items-center ">
				<div class=" producer-category-logo-box h-200p m-0 d-flex justify-content-center align-items-center">
					
					<img src="<?= get_post_meta(get_queried_object_id(), 'empat_producers_cat_page_logo', true) ?>">
				</div>
			</div>
			<div class=" producer-category-logo-box col-7  h-200p mt-auto mb-auto  d-flex flex-column justify-content-center  ">
				<h2><?= get_the_title(get_queried_object_id()) ?></h2>
				<p><?= get_the_excerpt(get_queried_object_id()) ?></p>
			</div>
		</div>
	</div>
</div>

<!-- Tab links -->
<div class="container-fluid empa-producer-page ">
	<div class=" container m-auto tab ">
		<button class="tablinks active" onclick="openCity(event, 'sec1')"> <?= get_the_title(get_queried_object_id()) ?></button>
		<button class="tablinks" onclick="openCity(event, 'sec2')">MARKALAR</button>
		<button class="tablinks" onclick="openCity(event, 'sec3')">YENİ ÜRÜNLER</button>
		<button class="tablinks" ><a href="https://www.empastore.com/"><img src="/wp-content/uploads/2023/03/Group-aaaaa10227-1.svg">&nbsp;&nbsp;&nbsp;PERAKENDE ALIŞVERİŞ</a></button>
		<button class="tablinks" >B2B</button>
		
	</div>

</div>
<div class="container mb-4 ">
	<div class="empa-breadcrumb mt-3">

		<?php

		echo '<a href="' . home_url() . '" rel="nofollow">Home</a>';
		echo "&nbsp;,&nbsp;";
		echo '<a href="' . get_permalink(wp_get_post_parent_id(get_queried_object_id())) . '" rel="nofollow">' . get_the_title(wp_get_post_parent_id(get_queried_object_id())) . '</a>';
		echo "&nbsp;,&nbsp;";
		echo  get_the_title(get_queried_object_id());

		?>
	</div>
</div>
<div class="container empa-producer-page-blog-loop  mb-5">
	<!-- Tab content -->
	<div id="sec1" class="tabcontent px-0 " style="display: block;">
		<?php
		while (have_posts()) :
			the_post();
			the_content();
		endwhile; // End the loop.
		?>
	</div>

	<div id="sec2" class="tabcontent empa-producer-page-brands-show calendar px-0">
		<?php
		$args = array(
			'type' => 'empa-producers',
			'taxonomy' => 'empa_producers_cats',
			'orderby' => 'ID',
			'parent' => get_post_meta(get_queried_object_id(), 'empat_producers_cat_id', true)
		);

		$cats = get_categories($args);

		?>

		<div class="container-fluid empa-producer-page-inside pb-4 ">
			<div class=" container m-auto tab d-flex empa-producer-page-inside-items  ">
				<?php foreach ($cats as $cat) {
	if (get_term_meta($cat->term_id, 'empat_producers__page_about', true) == get_queried_object_id()) {
				?>
					<a class="tabinside " onclick="openinsidebox(event, 'inside_sec<?= $cat->term_id ?>')"><img src="<?= get_term_meta($cat->term_id, 'empat_producers_url', true) ?>"></a>
				<?php } } ?>
			</div>

		</div>
		<div class="px-4 pb-5">
			<?php foreach ($cats as $cat) { ?>
				<div id="inside_sec<?= $cat->term_id ?>" class="tabcontentinside">
					<div class="row">
						<div class="col-lg-12 text-right"><a href="<?= get_term_meta($cat->term_id, 'empat_producers_url_Brand', true) ?>"> <?= get_term_meta($cat->term_id, 'empat_producers_url_Brand', true) ?></a></div>
						<div class="col-12">
							<p><?= wpautop(get_term_meta($cat->term_id, 'empat_producers_content', true)) ?></p>
						</div>

					</div>

				</div>

			<?php } ?>
		</div>
		<div class="container contact-form-emp">
			<div class="row m-auto ">
				<div class="col-lg-6">
					<h2>Fermentum accumsan mauris</h2>
					<p>Sedigenecabo. Nam qui re, optatio moluptaturi con prem quis ea dolo maxim et porem lanis vollestectia qui quaepudigent eatem alite</p>
				</div>
				<div class="col-lg-6 d-flex align-items-center justify-content-end">
					<a href="" class="btn-emp">İLETİŞİM KURUN</a>
				</div>
			</div>
		</div>
	</div>

	<div id="sec3" class="tabcontent">
		<ul class="event-loop">
			<?php
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'category' => 186
			);
			$my_query = new WP_query($args);
			if ($my_query->have_posts()) :
				while ($my_query->have_posts()) : $my_query->the_post();

			?>

					<li class="row">

						<div class="col-lg-4 pl-2 pr-1">
							<img class="float-right" src="<?= get_the_post_thumbnail_url() ?>">
						</div>
						<div class="col-lg-8 d-flex flex-column content">

							<h2><?= get_the_title() ?></h2>
							<p class="mt-1"> <?= get_the_excerpt() ?></p>
							<a href="<?= get_the_permalink() ?>"> DETAYLI BİLGİ</a>
						</div>

					</li>
			<?php
				endwhile;
			endif;
			?>
		</ul>
		<div class="container contact-form-emp">
			<div class="row m-auto ">
				<div class="col-lg-6">
					<h2>Fermentum accumsan mauris</h2>
					<p>Sedigenecabo. Nam qui re, optatio moluptaturi con prem quis ea dolo maxim et porem lanis vollestectia qui quaepudigent eatem alite</p>
				</div>
				<div class="col-lg-6 d-flex align-items-center justify-content-end">
					<a href="" class="btn-emp">İLETİŞİM KURUN</a>
				</div>
			</div>
		</div>
	</div>

</div>

<?php

get_footer();
