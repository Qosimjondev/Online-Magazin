<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this \yii\web\View */
/* @var $content string */


if (Yii::$app->controller->action->id === 'login') { 
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php $this->endBody();
        $url = Url::to(['/site/image-update']);
        $this->registerJs("
        $('#button').click(function(){
            $('#image').trigger('click');
        })
        
        $('#image').change(function () {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $('#imgPreview').attr('src', event.target.result);
                        $('.img-circle').attr('src', event.target.result);  
                        $('.user-image').attr('src', event.target.result);  
          
                            send(file);
                    };
                    reader.readAsDataURL(file);
                }
            });
            
        function send(image){
        $.ajax({
                type:'POST',
                url:'{$url}',
                dataType: 'json',
                data:{image:image},
                
               });
        }
    ");

    ?>
    <script>
        $(".button-add").click(function (e){
            e.preventDefault();
            let url = $(this).attr('href');
            let text = $(this).text();
            text = "<h4>"+text+"</h4>";
            $(".modal-header").html(text);
            $("#my-Modal").modal('show');
            send(url);

        });

        $(".button-update").click(function (e){
            e.preventDefault();
            let url = $(this).attr('href');
            text = "<h4>Yangilash</h4>";
            $(".modal-header").html(text);
            $("#my-Modal").modal('show');
            send(url);

        });


    </script>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php

} ?>
