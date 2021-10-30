<?php get_header(); ?>
<?php global $youbi_ja; ?>
<?php if(have_posts()): ?>
	<?php while(have_posts()): the_post(); ?>
<div class="box_white_under">
	<section class="page-kv">
		<div class="overlay"></div>
		<div class="bg" style="background-image: url(<?php the_post_thumbnail_url("full"); ?>)"></div>
		<div class="wrap w960">
			<?php the_post_thumbnail("full", array("class" => "cut_img cover img")); ?>
		<?php if(get_field("sub_title")): ?>
			<p class="caption"><?php the_field("sub_title"); ?></p>
		<?php endif; ?>
			<h1 class="ttl"><?php the_title(); ?></h1>
		</div>
	</section>
	<!-- /.page-kv -->
	<section class="sec_breadcrumb">
		<ul class="list">
			<li><a href="<?php echo esc_url(home_url('/')); ?>" class="fade">TOP</a></li>
			<li><a href="<?php echo esc_url(get_post_type_archive_link("talk")); ?>" class="fade">ファッション学生にインタビュー！</a></li>
			<li><?php the_title(); ?></li>
		</ul>
	</section>
	<!-- /.sec_breadcrumb -->
	<section class="sec_contents post-talk">
		<?php if(get_field("title")): ?>
			<h2 class="headline-4-1"><?php the_field("title"); ?></h2>
		<?php endif; ?>
		<?php if(get_field("supplement_text")): ?>
			<p><?php the_field("supplement_text"); ?></p>
		<?php endif; ?>
		<?php if(get_field("image")): ?>
			<div class="image"><?php echo wp_get_attachment_image(get_field("image"), "full", array("alt" => get_field("title"))); ?></div>
		<?php endif; ?>
		<?php if(have_rows("people")): ?>
			<?php while(have_rows("people")): the_row(); ?>
			<div class="block-gray">
				<?php if(get_sub_field("name") || get_sub_field("course")): ?>
				<p class="text-size22 bold tac sp_tal"><?php the_sub_field("name"); ?>/<?php the_sub_field("course"); ?></p>
				<?php endif; ?>
				<?php if(get_sub_field("text")): ?>
				<p class="tac sp_tal"><?php the_sub_field("text"); ?></p>
				<?php endif; ?>
			</div>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php if(get_field("date")): ?>
			<p class="text-red-notes">※<?php echo date_i18n("Y年n月j日", strtotime(get_field("date"))); ?>（<?php echo esc_html($youbi_ja[date_i18n("w", strtotime(get_field("date")))]); ?>）に行われたインタビューです。</p>
		<?php endif; ?>
		<hr class="hr-dot-line">
		<div class="post-talk-contents post-contents cf">
			<?php the_content(); ?>
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
			<div class="btn-white mt80 sp-mt8"><a href="<?php echo esc_url(get_post_type_archive_link("talk")); ?>" class="btn_type2 fade">ファッション学生に<br class="sp">インタビュー！一覧へ</a></div>
		</div>
</div>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
