<?php

use common\models\Category;

$categories = Category::find()->all();

?>

<nav class="side-catalog <?= (Yii::$app->request->url == Yii::$app->homeUrl) ? "index" : "no-index" ?> main__catalog">
	<ul class="side-catalog__list">

		<?php foreach ($categories as $category) : ?>
			<li class="side-catalog__item">
				<div class="side-catalog__scroll-container"><span class="side-catalog__category side-catalog__category--main"><?= $category->name ?></span>
					<ul class="side-catalog__sub">
						<?php $parents = $category->parents; ?>

						<?php if (!empty($parents)) : ?>
							<?php foreach ($parents as $parent) : ?>

								<?php $subparents = $parent->parents; ?>
								<?php if (!empty($subparents)) : ?>
									<li class="side-catalog__item"><span class="side-catalog__category"><?= $parent->name ?></span>
										<ul class="side-catalog__sub">
											<?php foreach ($subparents as $subparent) : ?>
												<li class="side-catalog__item">
													<a class="side-catalog__link" href="#"><?= $subparent->name ?></a>
												</li>
											<?php endforeach; ?>
										</ul>
									</li>
								<?php else : ?>
									<li class="side-catalog__item"><a class="side-catalog__link" href="#"><?= $parent->name ?></a></li>
								<?php endif; ?>

							<?php endforeach; ?>

						<?php endif; ?>

					</ul>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>