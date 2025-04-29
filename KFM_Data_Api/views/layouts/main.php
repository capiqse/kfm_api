<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);

// Redirect guests to login
if (Yii::$app->user->isGuest && Yii::$app->controller->id !== 'site' && Yii::$app->controller->action->id !== 'login') {
    Yii::$app->response->redirect(Url::to(['/site/login']))->send();
    Yii::$app->end();
}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
        body {
            overflow-x: hidden;
        }
        .sidebar {
            height: 100vh;
            padding-top: 60px;
            position: fixed;
            left: 0;
            top: 0;
            width: 220px;
            background-color: #343a40;
        }
        .sidebar a {
            color: #ddd;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
            color: #fff;
        }
        .content {
            margin-left: 220px;
            padding: 20px;
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<?php if (!Yii::$app->user->isGuest): ?>
<div class="sidebar">
    <div class="text-center mb-4 text-white">
        <h4><?= Html::encode(Yii::$app->name) ?></h4>
    </div>

    <?= Nav::widget([
        'options' => ['class' => 'flex-column'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index'], 'linkOptions' => ['class' => 'nav-link']],
            ['label' => 'About', 'url' => ['/site/about'], 'linkOptions' => ['class' => 'nav-link']],
            ['label' => 'Contact', 'url' => ['/site/contact'], 'linkOptions' => ['class' => 'nav-link']],
            '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'd-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link nav-link logout', 'style' => 'color: #ddd; text-align: left; padding-left: 20px;']
                )
                . Html::endForm()
            . '</li>',
        ],
    ]) ?>
</div>
<?php endif; ?>

<main class="<?= Yii::$app->user->isGuest ? '' : 'content' ?> flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
