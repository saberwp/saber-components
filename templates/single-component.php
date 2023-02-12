<?php get_header(); ?>
<div class="max-w-3xl mx-auto my-16 flex flex-col">
	<h1 class="font-bold text-2xl mb-1 text-slate-700"><?php the_title(); ?></h1>
	<h2 class="mb-8 text-slate-500"><?php the_content(); ?></h2>

	<section class="bg-gray-200 p-8 rounded-lg">
		<?php echo get_field('html'); ?>
	</section>

	<div>
		<h2 class="font-semibold text-xl mt-8 mb-2 text-slate-400">HTML/TW CODE</h2>
		<section class="bg-gray-900 text-gray-100 p-4 rounded-lg">
			<pre class="text-sm overflow-x-scroll pb-4"><code><?php echo htmlentities(get_field('html')); ?></code></pre>
		</section>
	</div>

	<div>
		<h2 class="font-semibold text-xl mt-8 mb-2 text-slate-400">DATA SCHEMA</h2>
		<section class="bg-gray-900 text-gray-100 p-4 rounded-lg">
			<pre class="text-sm overflow-x-scroll pb-4"><code><?php echo get_field('data_schema'); ?></code></pre>
		</section>
	</div>

	<div>
		<h2 class="font-semibold text-xl mt-8 mb-2 text-slate-400">STYLE SCHEMA</h2>
		<section class="bg-gray-900 text-gray-100 p-4 rounded-lg">
			<pre class="text-sm overflow-x-scroll pb-4"><code><?php echo get_field('style_schema'); ?></code></pre>
		</section>
	</div>

	<a class="self-center flex gap-4 items-center justify-center max-w-md rounded bg-emerald-800 text-white py-4 px-8 font-semibold text-xl mt-16 text-center hover:bg-emerald-900" href="<?php echo site_url('components'); ?>">
		<span>View All Components</span>
		<svg class="w-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M328 0H304V48h24H430.1L207 271l-17 17L224 321.9l17-17 223-223V184v24h48V184 24 0H488 328zM24 32H0V56 488v24H24 456h24V488 312 288H432v24V464H48V80H200h24V32H200 24z"/></svg>
	</a>

</div>
<?php get_footer(); ?>
