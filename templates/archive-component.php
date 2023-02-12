<?php get_header(); ?>

<?php

$args = array(
  'post_type' => 'acfg_component',
  'posts_per_page' => -1
);
$components = get_posts( $args );

?>
<div class="mx-auto max-w-3xl my-16">
	<ul class="flex flex-col gap-16">
		<?php foreach ( $components as $component ) { ?>
			<li class="">
				<section class="bg-gray-100 rounded-lg p-4">
					<a class="mb-4 text-slate-500" href="<?php echo esc_url( get_permalink( $component->ID ) ); ?>">
						<?php echo esc_html( get_the_title( $component->ID ) ); ?>
					</a>
					<div class="scale-50">
						<?php echo get_field('html', $component->ID); ?>
					</div>
					<span class="isolate inline-flex rounded-md shadow-sm">
					  <button type="button" class="relative inline-flex items-center rounded-l-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">Details</button>
					  <button type="button" class="relative -ml-px inline-flex items-center rounded-r-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">Copy Code</button>
					</span>
				</section>
			</li>
		<?php } ?>
	</ul>
</div>
<?php get_footer(); ?>
