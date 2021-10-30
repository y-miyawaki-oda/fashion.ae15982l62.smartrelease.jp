<?php get_header(); ?>
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
			<li>高校生コーディネートコンテスト</li>
		</ul>
	</section>
	<!-- /.sec_breadcrumb -->
	<section class="sec_contents">
			<h2 class="headline-2-1">多数の応募の中から選ばれた<br>高校生のコーデを一挙に紹介！</h2>
			<div class="column-2 sp-column-1">
				<div>
					<div class="image"><img src="/new/wp-content/uploads/2021/04/img_coordinatecontest_01.jpg" alt=""></div>
				</div>
				<div>
					<p>高校生なら誰でも参加OKのファッションコーディネートコンテスト。公式LINEにスナップ写真を送るだけでエントリー。週間・月間ベストコーデ受賞者には豪華景品をプレゼント！</p>
				</div>
			</div>
			<hr class="hr-dot-line">
			<div class="category-select">
				<div class="select_box">
					<p class="btn">
						<span class="txt">
					<?php if(is_post_type_archive()): ?>
							年月を選択
					<?php else: ?>
							<?php single_term_title(); ?>
					<?php endif; ?>
						</span>
					</p>
					<ul class="children">
						<li data-value="<?php echo esc_html(get_post_type_archive_link("coordinatecontest")); ?>">年月を選択</li>
					<?php foreach(get_terms("contestdate") as $contestdate): ?>
						<li data-value="<?php echo esc_url(get_term_link($contestdate)); ?>"><?php echo esc_html($contestdate->name); ?></li>
					<?php endforeach; ?>
					</ul>
				</div>
			</div>
	<?php if(have_posts()): ?>
			<ul class="coordinate-list column-4 sp-column-2">
		<?php while(have_posts()): the_post(); ?>
				<li>
					<div class="img">
						<a href="<?php the_permalink(); ?>">
						<?php if(has_post_thumbnail()): ?>
							<?php the_post_thumbnail("coordinatecontest_list"); ?>
						<?php else: ?>
							<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/coordinatecontest/nowinner.jpg" alt="">
						<?php endif; ?>
							<p class="tag"><?php echo esc_html(get_the_terms(get_the_ID(), "contestdate")[0]->name); ?></p>
						</a>
					</div>
					<div class="ttl_box">
						<p class="ttl"><?php the_title(); ?></p>
					</div>
					<p class="txt"><?php echo wp_kses_post(get_the_custom_excerpt(get_the_content(), 108)); ?></p>
				</li>
		<?php endwhile; ?>
			</ul>
		<?php
			if(function_exists("responsive_pagination")) {
				responsive_pagination();
			}
		?>
	<?php endif; ?>
			<div class="block-line mt80">
				<div class="column-1">
					<p class="text-size28 bold tac">エントリー受付中</p>
					<p class="btn-black btn-l"><a href="<?php echo esc_url(home_url('/')); ?>coordinatecontest/entry/" class="btn_type1">エントリーはこちら</a></p>
				</div>
			</div>
	</section>
</div>
<?php get_footer(); ?>
