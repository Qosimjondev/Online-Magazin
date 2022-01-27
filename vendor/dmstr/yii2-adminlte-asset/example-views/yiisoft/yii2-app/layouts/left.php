<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->username?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Bosh Sahifa', 'icon' => 'home', 'url' => ['/']],
                    [
                        'label' => 'Mahsulotlar',
                        'icon' => 'shopping-bag',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Barcha Mahsulotlar', 'icon' => 'shopping-basket', 'url' => ['/product/index'],],
                            ['label' => 'Kategoriya & Brand', 'icon' => 'folder', 'url' => ['/category/index'],],
                            ['label' => 'Komentariyalar', 'icon' => 'comment', 'url' => ['/']],
                            ['label' => 'Baholar', 'icon' => 'star', 'url' => ['/']],
                        ],
                    ],
                    ['label' => 'Buyurtmalar', 'icon' => 'truck', 'url' => ['/order/index']],
                    ['label' => 'Foydalanuvchilar', 'icon' => 'users', 'url' => ['/user/index']],
                    ['label' => 'Yangiliklar', 'icon' => 'newspaper-o', 'url' => ['/news/index']],
                    ['label' => 'Chegirmalar', 'icon' => 'percent', 'url' => ['/discount/index']],
                    ['label' => 'Gelleriya', 'icon' => 'image', 'url' => ['/gallery/index']],
                    ['label' => 'Xabarlar', 'icon' => 'envelope', 'url' => ['/message/index']],
                    ['label' => 'Aloqa Ma\'lumotlari', 'icon' => 'phone', 'url' => ['/phone/index']],
                    ['label' => 'Tarjimalar', 'icon' => 'globe', 'url' => ['/translate-manager']],
                    ['label' => 'Ma\'lumotlarim', 'icon' => 'gears', 'url' => ['/site/profile']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                ],
            ]
        ) ?>

    </section>

</aside>
