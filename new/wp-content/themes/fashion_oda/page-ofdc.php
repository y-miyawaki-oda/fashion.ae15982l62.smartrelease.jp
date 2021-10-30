<?php get_header(); ?>
<div class="box_white_under">
	<?php echo do_shortcode('[kv_image]'); ?>
	<section class="sec_breadcrumb">
		<ul class="list">
			<li><a href="<?php echo esc_url(home_url('/')); ?>" class="fade">TOP</a></li>
			<li><a href="<?php echo esc_url(home_url('/')); ?>life/" class="fade">学生生活</a></li>
			<li><a href="<?php echo esc_url(home_url('/')); ?>life/works/" class="fade">作品紹介</a></li>
			<li>OFDC作品紹介</li>
		</ul>
	</section>
	<!-- /.sec_breadcrumb -->
	<section class="sec_contents">
			<h2 class="headline-2-1">OFDC 作品紹介<span class="sub-headline-2-1">（ODA Fashion Design Competition）</span></h2>
			<p class="tac sp_tal">「どんなに素晴らしい才能も、眠っていては価値がない。秘められた才能にスポットを」というコンセプトをもとに<br class="pc br_tab_no">40年以上に渡って開催。<br>その思いは、今も変わることなく受け継がれています。ここは、学んできたことを発揮する場であると同時に、<br class="pc br_tab_no">クリエイターとしての自分を広く発信するフィールド。あなたの個性と感性で、舞台をより華やかに演出してください。</p>
<?php
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'ofdc',
		'orderby' => 'menu_order',
		'order' => 'ASC'
	);
	$posts = get_posts($args);
?>
<?php if($posts): ?>
	<?php foreach($posts as $key => $post): setup_postdata($post); ?>
			<h3 class="headline-3-1"><span><?php the_title(); ?></span></h3>
		<?php if(get_field("date")): ?>
			<p class="text-red-notes"><?php the_field("date"); ?></p>
		<?php endif; ?>
		<?php if(have_rows("works")): ?>
			<?php $cnt = 0; ?>
			<?php while(have_rows("works")): the_row(); ?>
				<?php if($key ==0 || $cnt == 0): ?>
			<div class="mt90 block-text-area">
				<?php elseif($cnt == 1): ?>
			<p class="acd-headline">他の受賞作品を見る</p>
			<div class="acd-contents">
				<div class="block-gray">
				<?php endif; ?>
					<h4 class="text-size28 bold tac"><?php echo wp_kses_post(str_replace('/', '<br class="sp">/', get_sub_field("prize"))); ?></h4>
				<?php if(get_sub_field("work_name")): ?>
						<p class="text-size28 bold tac">「<?php the_sub_field("work_name"); ?>」</p>
				<?php endif; ?>
						<div class="column-1-vertical">
							<div class="image"><?php echo wp_get_attachment_image(get_sub_field("image"), "full"); ?></div>
						</div>
						<p class="text-size24 bold tac"><?php the_sub_field("name"); ?></p>
						<p class="text-size18 bold tac mt00"><?php the_sub_field("school"); ?></p>
						<p><?php the_sub_field("comment"); ?></p>
				<?php $cnt++; ?>
			<?php endwhile; ?>
				</div>
			</div>
			</div>
		<?php endif; ?>
	<!-- /.sec_ofdc -->
	<?php endforeach; ?>
<?php endif; ?>
	</section>
</div>
<?php get_footer(); ?>
