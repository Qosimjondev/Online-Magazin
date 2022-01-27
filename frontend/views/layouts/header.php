  <?php

  use yii\bootstrap4\Html;
  use yii\helpers\Url;
  ?>
  
  <!--================ Start Header Menu Area =================--> 
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="<?=Url::home()?>"><img src="<?=Url::base()?>/img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item"><a class="nav-link" href="<?=Url::home()?>"><?=Yii::t('app', 'home')?></a></li>
                <li class="nav-item"><a class="nav-link" href="<?=Url::to(['/category/index'])?>"><?=Yii::t('app', 'category')?></a></li>

                <li class="nav-item"><a class="nav-link" href="<?=Url::to(['/news/index'])?>"><?=Yii::t('app', 'news')?></a></li>

              <li class="nav-item"><a class="nav-link" href="<?=Url::to(['/site/contact'])?>"><?=Yii::t('app', 'contact')?></a></li>

                <li class="nav-item submenu dropdown">
                    <?php if (Yii::$app->language == 'en'):?>
                    <a href="<?=Url::current(['lang'=>'en'])?>" id="current" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">English</a>
                    <ul class="dropdown-menu" id="lang">
                        <li class="nav-item"><a class="nav-link" href="<?=Url::current(['lang'=>'uz'])?>" id="lang">O'zbekcha</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=Url::current(['lang'=>'ru'])?>" id="lang">Русский</a></li>
                    </ul>
                    <?php elseif(Yii::$app->language == 'uz'): ?>
                        <a href="<?=Url::current(['lang'=>'uz'])?>" id="current" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">O'zbek</a>
                        <ul class="dropdown-menu" id="lang">
                            <li class="nav-item"><a class="nav-link" href="<?=Url::current(['lang'=>'en'])?>" id="lang">English</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?=Url::current(['lang'=>'ru'])?>" id="lang">Русский</a></li>
                        </ul>
                    <?php else: ?>
                        <a href="<?=Url::current(['lang'=>'ru'])?>" id="current" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Русский</a>
                        <ul class="dropdown-menu" id="lang">
                            <li class="nav-item"><a class="nav-link" href="<?=Url::current(['lang'=>'uz'])?>" id="lang">O'zbekcha</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?=Url::current(['lang'=>'en'])?>" id="lang">English</a></li>
                        </ul>

                    <?php endif;?>
                </li>

            </ul>

            <ul class="nav-shop">
              <li class="nav-item"><button><i class="ti-search"></i></button></li>
              <li class="nav-item"><a href="<?=Url::to(['/site/cart'])?>"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle">3</span></button> </a></li>
                <?php if(Yii::$app->user->isGuest): ?>
              <li class="nav-item"><a class="button button-header" href="<?=Url::to(['/site/login'])?>"><i class="fa fa-sign-in-alt"></i> <?=Yii::t('app', 'login')?></a></li>
                <?php else: ?>
                    <li class="nav-item">
                        <?=Html::a(Yii::t('app', 'logout').' <i class="fa fa-sign-out-alt"></i>', ['/site/logout'], ['data-method' => 'post', 'class' => 'button button-header'])?>
                    </li>
                <?php endif;?>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
	<!--================ End Header Menu Area =================-->
