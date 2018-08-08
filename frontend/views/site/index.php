<?php \yii\widgets\Pjax::begin();?>
    <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
        <?php echo $this->render("//layouts/partials/sidebar"); ?>
        <?php echo $this->render("//layouts/partials/navbar", ['categories' => $categories, 'active_technology' => $active_technology]); ?>
        <?php echo $this->render("//layouts/partials/header", ['technologies' => $technologies]); ?>
        <main id="main-container">
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container-fluid text-center">
                            <div class="row content">
                                <div class="col-sm-10 text-left">
                                    <?php echo $article_body; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php echo $this->render("//layouts/partials/footer"); ?>
    </div>
<?php \yii\widgets\Pjax::end();?>