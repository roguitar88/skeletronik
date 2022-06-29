<!DOCTYPE html>
<html lang="<?= LANG ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $this->getMetaDescription() ?>"/>
    <meta name="keywords" content="<?= $this->getMetaKeywords() ?>"/>
    <link rel="shortcut icon" href="<?= DIRPAGE ?>favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?= DIRPAGE ?>favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/e7ed460553.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?= DIRJS ?>jquery.js"></script>

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="<?= DIRBOOTSTRAP ?>dist/css/bootstrap.min.css" crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css" href="<?= DIRCSS ?>main.css"/>

    <?= $this->getHead() ?>

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="scripts/html5shiv-printshiv"></script>
    <![endif]-->
    <title><?= $this->getPageTitle() ?></title>

</head>

<body>

<div class="mainwrapper clearfix">
    <?= $this->addNav() ?>
    <main>
    <?= $this->addContent() ?>
    </main>
    <div id="Push"></div>
</div>

<?= $this->addFooter() ?>

<!-- Processing spinner -->
<!--
<div class="loading">
    <div class="await">Aguarde...</div>
    <div class="animated-ellipsis">
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </div>
</div>
-->

<div class="loading">
    <!-- <div class="await">Aguarde</div> -->
    <div class="animated-ellipsis">
        <div class="lds-ripple"><div></div><div></div></div>
    </div>
</div>

<?= $this->getAssets() ?>

<?php
/*
<script src="<?= DIRJS ?>optional/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="<?= DIRJS ?>optional/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
*/
?>

<script src="<?= DIRBOOTSTRAP ?>dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

</body>
</html>
