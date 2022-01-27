<?php
/** @var $model \common\models\UserImg */

use yii\helpers\Url;
use yii\widgets\ActiveForm;

$user = Yii::$app->user->identity;

$this->title = 'Mening Ma\'lumotlarim';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                <?= $this->title ?>
            </h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">


        <div class="row">
    <div class="col-md-5">
        <div class="card card-primary card-outline" style="margin-left:10px;">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" id="imgPreview" src="<?= Url::base()?>/img/c2.jpg" alt="User profile picture">

                    <input type="file" id="image" style="opacity: 0;display: none">
                    <span id='button' class="fa fa-edit text-info fa-2x" style="position: absolute" title="Rasmni O'zgartirish"></span>

                </div>
                <h3 class="profile-username text-center"><?=$user->username?></h3>


                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Login:</b> <a class="float-right"><?=$user->username?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Email:</b> <a class="float-right"><?=$user->email?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Yaratildi</b> <a class="float-right"><?=Yii::$app->formatter->asRelativeTime($user->created_at)?></a>
                    </li>
                </ul>


            </div>
            <!-- /.card-body -->

            <a href="#" onclick="myLogin()" class="btn btn-primary" style="margin-left: 10px; margin-right: 22px; margin-bottom: 1rem;"><b><i class="fa fa-edit"></i> Login O'zgartirish</b></a>
            <a href="#" onclick="myPassword()" style="margin-bottom: 1rem;margin-left: 22px;" class="btn btn-warning"><b><i class="fa fa-key"></i> Parol O'zgartirish</b></a>
        </div>

    </div>
            <div class="col-md-1">

            </div>
            <div class="col-md-5" id="login" style="display: none">
                <form method="post" action="<?=Url::to(['/site/change-login'])?>" style="margin-top: 20px;">
                    <div class="form-group">
                        <label>Yangi Login</label>
                    </div>
                    <div class="form-group">
                    <input type="text" name="login" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-success" value="Yangilash">
                </form>
           </div>

            <div class="col-md-5" id="password" style="display: none">
                <form method="post" action="<?=Url::to(['/site/change-password'])?>" style="margin-top: 20px;">
                    <div class="form-group">
                        <label>Yangi Parol</label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Parolni Tasdilqash</label>
                    </div>
                    <div class="form-group">
                    <input type="text" name="password1" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-success" value="Yangilash">
                </form>
            </div>

        </div>
    </div>

    </div>
</section>
    <script>
        function myLogin(){
            document.getElementById('password').style = "display:none;";
            document.getElementById('login').style = "display:block;";
        }
        function myPassword(){
            document.getElementById('login').style = "display:none;";
            document.getElementById('password').style = "display:block;";

        }

    </script>