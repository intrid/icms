<section class="news">
	<h2 class="visually-hidden">Новости</h2>
	<?php if (!empty($articles)) : ?>

		<a href="/news/<?= $articles[0]->articleCategory->slug ?>/<?= $articles[0]->slug ?>" class="news__main">
			<picture class="news__img">
				<source srcset="<?= $articles[0]->getImage()->getPath('738x411') ?>" media="(min-width: 1440px)">
				<img src="<?= $articles[0]->getImage()->getPath('355x242') ?>" alt="<?= $articles[0]->name?>">
			</picture>
			<time class="news__date" datetime="<?= date('Y-m-d', $articles[0]->date) ?>"><?= date('d/m/y', $articles[0]->date) ?></time>
			<p><strong><?= $articles[0]->name ?></strong></p>
			<p><?= $articles[0]->short_text ?></p>
			<p class="news__link">Подробнее</p>
		</a>

		<div class="news__all">
			<?php if (count($articles) > 1) : ?>
				<?php unset($articles[0]); ?>
				<?php foreach ($articles as $article) : ?>
					<a href="/news/<?= $article->articleCategory->slug ?>/<?= $article->slug ?>" class="news__item">
						<time class="news__date" datetime="<?= date('Y-m-d', $article->date) ?>"><?= date('d/m/y', $article->date) ?></time>
						<p><strong><?= $article->name ?></strong></p>
						<p><?= $article->short_text ?></p>
						<p class="news__link">Подробнее</p>
					</a>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>

	<?php endif; ?>
</section>