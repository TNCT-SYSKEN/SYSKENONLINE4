<?php
/*
 * breadcrumbs.php そのうち作ります
 */
?>

<?php //ホームではパンくずいらない とりあえず今はホームでテストしてるので ?>
<?php //if(!is_home()) : ?>
<div id="breadcrumbs">
	<ul>
		<li><a href="<?php echo home_url('/'); ?>">ホーム</yi>
		<?php if(is_404()) : ?>
			<li>404 Not found</li>
		<?php elseif(is_date()) : ?>
			<!-- <?php if(is_day()) : ?> -->
			<!-- <?php if(is_month()) : ?> -->
			<!-- <?php if(is_year()) : ?> -->
		<?php elseif(is_category()) : ?>
		<?php endif; ?>
	</ul>
</div>
