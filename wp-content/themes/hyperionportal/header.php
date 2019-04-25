<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Title</title>
    <?php wp_head(); ?>

</head>
<body>
<div id="wrapper">
    <header id="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <a href="#" id="logo"><img src="<?php bloginfo('template_url')?>/assets/images/logo.png" alt="hyperion.portal"></a>
                </div>
                <div class="col-8">
                    <nav class="sub-nav float-right">
                        <ul class="list-unstyled d-flex align-items-center">
                            <li>
                                <div class="user">
                                            <span class="avatar">
                                                <img src="<?php bloginfo('template_url')?>/assets/images/user.png" alt="avatar">
                                            </span>
                                    <a href="profile.html">Гоша Маргоша <b>+</b></a>
                                </div>
                            </li>
                            <li><a href="#">Выход</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>