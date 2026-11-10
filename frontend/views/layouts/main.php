<?php

/**
 * Team:
 * Coding by 石欣哲 2412896, 20261110
 * This is the main layout of frontend web.
 */

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\web\YiiAsset;
use yii\bootstrap\BootstrapAsset;
use common\widgets\Alert;

YiiAsset::register($this);
BootstrapAsset::register($this);
$this->registerCssFile('@web/css/site.css');

$controllerId = Yii::$app->controller ? Yii::$app->controller->id : '';
$navItems = [
    ['label' => '首页', 'url' => ['/home/index'], 'ids' => ['home', 'site']],
    ['label' => '球队', 'url' => ['/team/index'], 'ids' => ['team', 'player']],
    ['label' => '赛程', 'url' => ['/match/index'], 'ids' => ['match', 'stats']],
    ['label' => '资讯', 'url' => ['/news/index'], 'ids' => ['news']],
    ['label' => '关于我们', 'url' => ['/about/index'], 'ids' => ['about']],
];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title ? $this->title . ' · ' : '') ?>GOAL 2026 世界杯专题站</title>
    <?php $this->head() ?>
</head>
<body class="wc-body">
<?php $this->beginBody() ?>

<header class="wc-header">
    <div class="wc-container wc-header-inner">
        <a class="wc-brand" href="<?= Url::to(['/home/index']) ?>">
            <span class="wc-brand-mark">GOAL</span>
            <span class="wc-brand-text">2026 世界杯专题</span>
        </a>

        <nav class="wc-nav" aria-label="主导航">
            <?php foreach ($navItems as $item): ?>
                <?= Html::a(
                    $item['label'],
                    $item['url'],
                    ['class' => 'wc-nav-link' . (in_array($controllerId, $item['ids'], true) ? ' is-active' : '')]
                ) ?>
            <?php endforeach; ?>
        </nav>

        <div class="wc-header-actions">
            <?php if (Yii::$app->user->isGuest): ?>
                <?= Html::a('登录', ['/site/login'], ['class' => 'wc-btn wc-btn-secondary wc-btn-sm']) ?>
                <?= Html::a('注册', ['/site/signup'], ['class' => 'wc-btn wc-btn-sm']) ?>
            <?php else: ?>
                <span class="wc-user"><?= Html::encode(Yii::$app->user->identity->username) ?></span>
                <?= Html::beginForm(['/site/logout'], 'post', ['class' => 'wc-inline-form']) ?>
                <?= Html::submitButton('退出', ['class' => 'wc-btn wc-btn-secondary wc-btn-sm']) ?>
                <?= Html::endForm() ?>
            <?php endif; ?>
        </div>
    </div>
</header>

<main class="wc-main">
    <div class="wc-container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="wc-footer">
    <div class="wc-container wc-footer-inner">
        <p>2026 世界杯专题站 · 课程设计演示</p>
        <p class="wc-muted">互联网数据库开发 · 石欣哲 2412896</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
