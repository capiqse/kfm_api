<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;

// Register external CSS file
$this->registerCssFile('@web/css/guest.css', ['depends' => [\yii\bootstrap5\BootstrapAsset::class]]);

?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center text-dark mt-5"><?= Html::encode($this->title) ?></h2>
            <!--<div class="text-center mb-5 text-dark">Made with Bootstrap</div> -->
            <div class="card my-5">

                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'options' => ['class' => 'card-body cardbody-color p-lg-5'],
                ]); ?>

                <div class="text-center">
                    <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" 
                         class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                         width="200px" alt="profile">
                </div>

                <div class="mb-3">
                    <?= $form->field($model, 'username', [
                        'template' => "{input}\n{error}",
                        'inputOptions' => [
                            'class' => 'form-control',
                            'placeholder' => 'User Name',
                            'id' => 'Username',
                        ],
                    ])->textInput() ?>
                </div>

                <div class="mb-3">
                    <?= $form->field($model, 'password', [
                        'template' => "{input}\n{error}",
                        'inputOptions' => [
                            'class' => 'form-control',
                            'placeholder' => 'Password',
                            'id' => 'password',
                        ],
                    ])->passwordInput() ?>
                </div>

                <div class="text-center">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-color px-5 mb-5 w-100', 'name' => 'login-button']) ?>
                </div>

                

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>
