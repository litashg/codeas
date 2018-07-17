<?php \yii\widgets\Pjax::begin();?>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <ul class="nav nav-pills flex-column">
                    <?php foreach ($categories as $category): ?>
                        <li class="nav-item">
                            <div class="nav-link"><h2><?php echo $category->title; ?></h2></div>
                        </li>
                        <?php foreach ($category->articles as $article): ?>
                            <li class="nav-item">
                                <?php echo \yii\helpers\Html::a($article->title, ['site/'.$article->slug]);?>
                            </li>
                        <?php endforeach;?>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="col-sm-10 text-left">
                <?php echo $content; ?>
            </div>
        </div>
    </div>
<?php \yii\widgets\Pjax::end();?>