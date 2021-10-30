<?php get_header(); ?>
<?php if(have_posts()): ?>
	<?php while(have_posts()): the_post(); ?>
<div class="box_white_under">
	<?php if(get_field("kv_coordinatecontest_image", "option")): ?>
		<?php
			$overlay = "";
			if(get_field("kv_coordinatecontest_overlay", "option")) {
				$kv_overlay = hex2rgb(get_field("kv_coordinatecontest_overlay", "option"));
				$kv_opacity = intval(get_field("kv_coordinatecontest_opacity", "option")) / 100;
				$overlay = ' style="background:rgba('.$kv_overlay[0].', '.$kv_overlay[1].', '.$kv_overlay[2].', '.$kv_opacity.');"';
			}
		?>
	<section class="page-kv">
		<div class="overlay"<?php echo $overlay; ?>></div>
		<div class="bg" style="background-image: url(<?php the_field("kv_coordinatecontest_image", "option"); ?>)"></div>
	<?php else: ?>
	<section class="page-kv page-kv-noimage">
	<?php endif; ?>
		<div class="wrap w960">
	<?php if(get_field("kv_coordinatecontest_image", "option")): ?>
			<img src="<?php the_field("kv_coordinatecontest_image", "option"); ?>" alt="" class="cut_img contain img">
	<?php endif; ?>
			<h1 class="ttl">高校生コーディネート<br class="sp">コンテスト</h1>
		</div>
	</section>
	<!-- /.page-kv -->
	<section class="sec_breadcrumb">
		<ul class="list">
			<li><a href="<?php echo esc_url(home_url('/')); ?>" class="fade">TOP</a></li>
			<li><a href="<?php echo esc_url(get_post_type_archive_link("coordinatecontest")); ?>" class="fade">高校生コーディネートコンテスト</a></li>
			<li><?php the_title(); ?></li>
		</ul>
	</section>
	<!-- /.sec_breadcrumb -->
	<section class="sec_contents post-coordinatecontest">
			<div class="post-coordinatecontest-header">
				<p class="text-size24 bold tac sp_tal"><?php the_title(); ?></p>
				<p class="tag"><span><?php echo esc_html(get_the_terms(get_the_ID(), "contestdate")[0]->name); ?></span></p>
			</div>
			<hr class="hr-dot-line">
			<div class="image-vertical-column-2 cf">
				<div class="column-image">
					<?php if(has_post_thumbnail()): ?>
						<?php the_post_thumbnail("full"); ?>
					<?php else: ?>
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/coordinatecontest/detail/nowinner.png" alt="">
					<?php endif; ?>
				</div>
				<div class="column-text post-coordinatecontest-contents post-contents">
					<?php the_content(); ?>
				</div>
			</div>
			<div class="column-1 mt80 sp-mt8">
				<ul class="pagination-single">
					<li>
					<?php $prev_post = get_previous_post(); ?>
					<?php if(!empty($prev_post)): ?>
						<a href="<?php echo get_permalink($prev_post->ID); ?>" class="prev off fade"><span>prev</span></a><span class="txt">prev</span>
					<?php endif; ?>
					</li>
					<li>
					<?php $next_post = get_next_post(); ?>
					<?php if(!empty($next_post)): ?>
						<span class="txt">next</span><a href="<?php echo get_permalink($next_post->ID); ?>" class="next on fade"><span>next</span></a>
					<?php endif; ?>
					</li>
				</ul>
				<div class="btn-white mt80 sp-mt8"><a href="<?php echo esc_url(get_post_type_archive_link("coordinatecontest")); ?>" class="btn_type2 fade">コーディネート一覧へ</a></div>
			</div>

			<div class="block-line mt80">
				<div class="column-1">
					<p class="text-size28 bold tac">エントリー受付中</p>
					<p class="btn-black btn-l"><a href="<?php echo esc_url(home_url('/')); ?>coordinatecontest/entry/" class="btn_type1">エントリーはこちら</a></p>
				</div>
			</div>
	</section>
</div>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
