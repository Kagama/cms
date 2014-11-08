<?php
//use backend\assets\AppAsset;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;



/**
 * @var \yii\web\View $this
 * @var string $content
 */
?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<?php $this->beginBody() ?>
<body class="background-dark">
<!--<div class="logo widget" style=" margin: 0 0 10px 0; padding: 0 0 0 0; float: left; left: 0; top: -10px;">-->
<!--    <h4 style="position: relative; left: 40px;"><a href="index.html">Kagama <strong>&nbsp;&nbsp;CMS</strong></a></h4>-->
<!--</div>-->
<?//= $this->render('@app/themes/lightblue/partial/menu', []); ?>
<div class="wrap" style="margin-left: 0;">
<!--    <header class="page-header">-->
<!--        <div class="navbar">-->
<!--            <ul class="nav navbar-nav navbar-right pull-right">-->
<!--                <li class="divider"></li>-->
<!--                <li class="hidden-xs">-->
<!--                    <a href="index.html#" id="settings"-->
<!--                       title="Settings"-->
<!--                       data-toggle="popover"-->
<!--                       data-placement="bottom">-->
<!--                        <i class="fa fa-cog"></i>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li class="hidden-xs dropdown">-->
<!--                    <a href="index.html#" title="Account" id="account"-->
<!--                       class="dropdown-toggle"-->
<!--                       data-toggle="dropdown">-->
<!--                        <i class="fa fa-user"></i>-->
<!--                    </a>-->
<!--                    <ul id="account-menu" class="dropdown-menu account" role="menu">-->
<!--                        <li role="presentation" class="account-picture">-->
<!--                            <img src="/cp/img/lightblue/2.jpg" alt="">-->
<!--                            Philip Daineka-->
<!--                        </li>-->
<!--                        <li role="presentation">-->
<!--                            <a href="form_account.html" class="link">-->
<!--                                <i class="fa fa-user"></i>-->
<!--                                Profile-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li role="presentation">-->
<!--                            <a href="component_calendar.html" class="link">-->
<!--                                <i class="fa fa-calendar"></i>-->
<!--                                Calendar-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li role="presentation">-->
<!--                            <a href="index.html#" class="link">-->
<!--                                <i class="fa fa-inbox"></i>-->
<!--                                Inbox-->
<!--                            </a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--                <li class="visible-xs">-->
<!--                    <a href="index.html#"-->
<!--                       class="btn-navbar"-->
<!--                       data-toggle="collapse"-->
<!--                       data-target=".sidebar"-->
<!--                       title="">-->
<!--                        <i class="fa fa-bars"></i>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li class="hidden-xs"><a href="--><?//= Url::toRoute('/admin/default/logout') ?><!--"><i class="fa fa-sign-out"></i></a>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <div class="notifications pull-right">-->
<!--                <div class="alert pull-right">-->
<!--                    <a href="index.html#" class="close" data-dismiss="alert">&times;</a>-->
<!--                    <i class="fa fa-info-circle"></i> Check out Light Blue <a id="notification-link" href="index.html#">settings</a>-->
<!--                    on the right!-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </header>-->
    <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
    <?= $content ?>
    <div class="loader-wrap hiding hide">
        <i class="fa fa-spinner fa-spin"></i>
    </div>
    <div class="loader-wrap hiding hide">
        <i class="fa fa-spinner fa-spin"></i>
    </div>
</div>

<script type="text/template" id="message-template">
    <div class="sender pull-left">
        <div class="icon">
            <img src="/cp/img/lightblue/lightblue/2.jpg" class="img-circle" alt="">
        </div>
        <div class="time">
            just now
        </div>
    </div>
    <div class="chat-message-body">
        <span class="arrow"></span>
        <div class="sender">Tikhon Laninga</div>
        <div class="text">
                <%- text %>
            </div>
    </div>
</script>

<script type="text/template" id="settings-template">
    <div class="setting clearfix">
        <div>Background</div>
        <div id="background-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% dark = background == 'dark'; light = background == 'light';%>
            <button type="button" data-value="dark" class="btn btn-sm btn-transparent <%= dark? 'active' : '' %>">Dark</button>
            <button type="button" data-value="light" class="btn btn-sm btn-transparent <%= light? 'active' : '' %>">Light</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>Sidebar on the</div>
        <div id="sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% onRight = sidebar == 'right'%>
            <button type="button" data-value="left" class="btn btn-sm btn-transparent <%= onRight? '' : 'active' %>">Left</button>
            <button type="button" data-value="right" class="btn btn-sm btn-transparent <%= onRight? 'active' : '' %>">Right</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>Sidebar</div>
        <div id="display-sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% display = displaySidebar%>
            <button type="button" data-value="true" class="btn btn-sm btn-transparent <%= display? 'active' : '' %>">Show</button>
            <button type="button" data-value="false" class="btn btn-sm btn-transparent <%= display? '' : 'active' %>">Hide</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>White Version</div>
        <div>
            <a href="white/" class="btn btn-sm btn-transparent">&nbsp; Switch &nbsp;   <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
</script>

<script type="text/template" id="sidebar-settings-template">
    <% auto = sidebarState == 'auto'%>
    <% if (auto) {%>
    <button type="button"
            data-value="icons"
            class="btn-icons btn btn-transparent btn-sm">Icons</button>
    <button type="button"
            data-value="auto"
            class="btn-auto btn btn-transparent btn-sm">Auto</button>
    <%} else {%>
    <button type="button"
            data-value="auto"
            class="btn btn-transparent btn-sm">Auto</button>
    <% } %>
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

