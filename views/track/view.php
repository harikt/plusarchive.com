<?php

/*
 * This file is part of the plusarchive.com
 *
 * (c) Tomoki Morita <tmsongbooks215@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * @var yii\web\View $this
 * @var app\models\Track $model
 * @var string $embed
 */

use app\models\TrackGenre;
use yii\helpers\Html;

$this->title = "$model->title - ".app()->name;
?>
<?php if (preg_match('/\A(YouTube|Vimeo)\z/', $model->providerText)): ?>
    <div class="embed-responsive embed-responsive-16by9">
<?php else: ?>
    <div class="embed-responsive embed-responsive-1by1-half">
<?php endif ?>
    <iframe class="embed-responsive-item" src="<?= h($embed) ?>" frameborder="0" allowfullscreen></iframe>
</div>
<div class="text-center">
    <h4><?= h($model->title) ?></h4>
    <?= Html::a(h($model->providerText), ['index', 'provider' => $model->providerText], [
        'class' => 'label label-default',
    ]) ?>
    <?php /** @var TrackGenre $genre */ ?>
    <?php foreach ($model->trackGenres as $genre): ?>
        <?= Html::a(h($genre->name), ['index', 'genre' => $genre->name], [
            'class' => 'label label-default',
        ]) ?>
    <?php endforeach ?>
</div>
<p class="clearfix"></p>
<p class="text-center">
    <a href="<?= url(['index']) ?>"><i class="fa fa-fw fa-angle-left"></i> Back to tracks</a>
</p>
