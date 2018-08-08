<header id="header-navbar" class="content-mini content-mini-full">
    <ul class="nav-header pull-left">
        <li class="visible-xs">
            <!-- Toggle class helper (for .js-header-search below), functionality initialized in App() -> uiToggleClass() -->
            <button class="btn btn-default" data-toggle="class-toggle" data-target=".js-header-search" data-class="header-search-xs-visible" type="button">
                <i class="fa fa-search"></i>
            </button>
        </li>
        <li class="js-header-search header-search">
            <form class="form-horizontal" action="base_pages_search.html" method="post">
                <div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
                    <input class="form-control" type="text" id="base-material-text" name="base-material-text" placeholder="Search..">
                    <span class="input-group-addon"><i class="si si-magnifier"></i></span>
                </div>
            </form>
        </li>
    </ul>
    <ul class="nav-header pull-right">
        <?php foreach ($technologies as $technology): ?>
        <li><?php echo \yii\helpers\Html::a( $technology['title'], ['/'.$technology['slug'].'/']);?></li>
        <?php endforeach;?>
    </ul>
</header>
