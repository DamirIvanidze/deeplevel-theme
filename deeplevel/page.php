<?
	get_header();
	the_post();
?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1><? the_title(); ?></h1>
			</div>

			<div class="col-lg-12">
				<? the_content(); ?>
			</div>
		</div>
	</div>

<? get_footer(); ?>