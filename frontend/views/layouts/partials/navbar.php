<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<nav id="sidebar">
    <div id="sidebar-scroll">
        <div class="sidebar-content">
            <div class="side-content">
                <ul class="nav-main">
                    <li>
                        <a class="active" href="<?php echo Url::to('/')?>"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                    </li>
                    <?php foreach ($categories as $category): ?>
                        <li class="nav-main-heading"><span class="sidebar-mini-hide"><?php echo $category->title; ?></span></li>
                        <?php foreach ($category->articles as $article): ?>
                            <li>
                                <?php echo Html::a($article->title, [$active_technology->slug.'/'.$category->slug.'/'.$article->slug]);?>
                            </li>
                        <?php endforeach;?>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</nav>
