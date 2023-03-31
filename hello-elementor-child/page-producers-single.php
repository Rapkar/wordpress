<?php
/* Template Name: empa producers single 
Template Post Type:empa-producers
  */ ?>
<?php
get_header();

?>
<div class="container-fluid mb-5 empa_producers_single mt-4 mb-2 px-0">
	<div class="pb-4" style="border-bottom: 3px solid #e8edf5;background: linear-gradient(180deg, rgba(255,255,255,1) 25%, rgba(255,255,255,1) 36%, rgba(226,233,243,1) 86%);">
		<div class="container">
			<div class="row ">
				<?php
				$id = get_post_meta(get_queried_object_id(), 'empat_producers_single_cat_id', true);
				$url = get_term_meta($id, 'empat_producers_url', true);
				?>
				<div class="col-lg-6"><img class="single_page_logo" src="<?= $url ?>"></div>
				<div class="col-lg-6 text-right"><a href="<?= get_term_meta($id, 'empat_producers_url_Brand', true) ?>"><?= get_term_meta($id, 'empat_producers_url_Brand', true) ?></a></div>
			</div>
		</div>
	</div>
	<div class=" empa-producer-page  ">
		<div class=" container m-auto tab position-relative ">
			<button class="tablinks active" onclick="openCity(event, 'sec1')"> <?= get_the_title(get_queried_object_id()) ?></button>
			<button class="tablinks" onclick="openCity(event, 'sec2')">YENİLİKLER & DUYURULAR</button>
			<button class="tablinks"><a style="text-decoration: none;" href="#"><img src="/wp-content/uploads/2023/03/Group-aaaaa10227-1.svg"> &nbsp; ALIŞVERİŞ</a></button>
			<a class="float-right to-brands-link" href="">TÜM MARKALAR &nbsp; > </a>
		</div>

	</div>


</div>
<div class=" empa-producer-page-blog-loop ">
	<!-- Tab content -->
	<div id="sec1" class="tabcontent px-0 " style="display: block;">
		<div class="tabcontentinside d-block container m-auto pt-0">
			<p><?= wpautop(get_term_meta($id, 'empat_producers_content', true)) ?></p>
		</div>
		<div class="container contact-form-emp mb-5 pb-5">
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
		<?php
		while (have_posts()) :
			the_post();
			the_content();
		endwhile; // End the loop.
		?>
	</div>

	<div id="sec2" class="tabcontent empa-producer-page-brands-show calendar px-0 container">
		<ul class="event-loop">
			<?php
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
			);
			$my_query = new WP_query($args);
			$page_ct_id=  get_post_meta(get_the_ID(),'empat_producers_single_cat_id',true);
			if ($my_query->have_posts()) :
				while ($my_query->have_posts()) : $my_query->the_post();
					$post_cat_id= get_post_meta(get_the_ID(),'by_brand',true);
			$term_id=get_post_meta(get_the_ID(),'wp_post_brand_cat_id',true);
					#if(($page_ct_id ==$post_cat_id)||($term_id==$page_ct_id)):
					if($term_id==$page_ct_id):
			?>

					<li class="row">

						<div class="col-lg-4 pl-2">
							<img src="<?= get_the_post_thumbnail_url() ?>">
						</div>
						<div class="col-lg-8 d-flex flex-column content">

							<h2><?= get_the_title() ?></h2>
							<p class="mt-4"> <?= get_the_excerpt() ?></p>
							<a href="<?= get_the_permalink() ?>"> DETAYLI BİLGİ</a>
						</div>

					</li>
			<?php
					endif;
				endwhile;
			endif;
			?>
		</ul>

	</div>


</div>

<?php

get_footer();
