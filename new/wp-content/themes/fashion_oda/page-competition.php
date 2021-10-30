<?php get_header(); ?>
<div class="box_white_under">
	<?php echo do_shortcode('[kv_image]'); ?>
	<section class="sec_breadcrumb">
		<ul class="list">
			<li><a href="<?php echo esc_url(home_url('/')); ?>" class="fade">TOP</a></li>
			<li><a href="<?php echo esc_url(home_url('/')); ?>life/" class="fade">学生生活</a></li>
			<li><a href="<?php echo esc_url(home_url('/')); ?>life/works/" class="fade">作品紹介</a></li>
			<li>外部コンペティション入賞作品</li>
		</ul>
	</section>
	<!-- /.sec_breadcrumb -->
	<section class="sec_contents">
		<h2 class="headline-2-1">外部コンペティション<br class="sp"> 受賞作品紹介</h2>
		<p class="tac sp_tal">学校で習った知識と技術、そして自分のファッションの感性を試すため、<br class="pc">飛躍へのステップとなるのが、外部ファッションデザインコンペティションへの出品です。 <br class="pc">本校ではファッション学生の挑戦を積極的に支援しています。</p>
	<!-- /.sec_intro -->
<?php
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'competition',
		'orderby' => 'menu_order',
		'order' => 'ASC'
	);
	$posts = get_posts($args);
?>
<?php if($posts): ?>
	<?php foreach($posts as $key => $post): setup_postdata($post); ?>
		<?php if($key == 0): ?>
	<div>
		<?php elseif($key == 4): ?>
	<div>
			<h3 class="headline-3-1"><span>過去の作品</span></h3>
			<p class="acd-headline">詳細を見る</p>
			<div class="acd-contents">
			<div class="block-gray">
		<?php endif; ?>
		<?php if(have_rows("works")): ?>
			<?php while(have_rows("works")): the_row(); ?>
				<div class="mt90 sp-mt15 block-text-area">
						<p class="text-size28 bold tac"><?php the_sub_field("prize"); ?></p>
		<?php if(get_sub_field("work_name")): ?>
							<p class="text-size24 bold tac">作品タイトル<br class="sp"> 「<?php the_sub_field("work_name"); ?>」</p>
		<?php endif; ?>
							<div class="column-1-vertical">
								<div class="image"><?php echo wp_get_attachment_image(get_sub_field("image"), "full"); ?></div>
							</div>
							<p class="text-size24 bold tac"><?php the_sub_field("name"); ?></p>
		<?php if(get_sub_field("school")): ?>
							<p class="text-size18 bold tac mt00"><?php the_sub_field("school"); ?></p>
		<?php endif; ?>
		<?php if(get_sub_field("comment")): ?>
							<p>
								<?php the_sub_field("comment"); ?>
							</p>
		<?php endif; ?>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php if($key == 3 || $key+1 == count($posts)): ?>
	</div>
	<!-- /.sec_competition -->
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>
	</section>
</div>
<?php get_footer(); ?>
