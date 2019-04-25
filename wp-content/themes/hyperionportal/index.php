<?php get_header(); ?>
    <main id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <?php get_sidebar('main'); ?>
                    <!--<div id="sidebar">
                        <nav id="nav">
                            <h4>Поучаствовать</h4>
                            <ul class="list-group">
                                <li class="list-group-item disabled"><a href="#">Группы</a></li>
                                <li class="list-group-item disabled"><a href="partition/talks/index.html">Семинары/Тренинги <b>+</b></a></li>
                                <li class="list-group-item disabled"><a href="#">Блог</a></li>
                            </ul>
                            <h4>Сервисы</h4>
                            <ul class="list-group">
                                <li class="list-group-item disabled"><a href="partition/photo/index.html">Фото/Видео <b>+</b></a></li>
                                <li class="list-group-item disabled"><a href="#">Заявки</a></li>
                                <li class="list-group-item disabled"><a href="#">Петиции/Предложения</a></li>
                                <li class="list-group-item disabled"><a href="#">Вакансии</a></li>
                                <li class="list-group-item disabled"><a href="#">Контакты </a></li>
                                <li class="list-group-item disabled"><a href="#">Документы</a></li>
                                <li class="list-group-item disabled"><a href="#">Обьявление</a></li>
                            </ul>
                            <h4>Новости</h4>
                            <ul class="list-group">
                                <li class="list-group-item disabled"><a href="#">Новости компании</a></li>
                                <li class="list-group-item disabled"><a href="#">События</a></li>
                            </ul>
                        </nav>
                    </div>-->
                </div>
                <div class="col-9">
                    <div id="content">
                        <section class="gallery mb-4">
                            <div class="slick-slider">
                                <div><a href="#"><img src="<?php bloginfo('template_url')?>/assets/images/1.png" alt="1.png"></a></div>
                                <div><a href="#"><img src="<?php bloginfo('template_url')?>/assets/images/hyperion-team-small.png" alt="hyperion-team-small.png"></a></div>
                            </div>
                        </section>
                        <section class="news">
                            <ul class="nav nav-tabs d-flex text-center" id="myTab" role="tablist">
                                <li class="nav-item flex-fill">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Лента</a>
                                </li>
                                <li class="nav-item flex-fill">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Коментарии</a>
                                </li>
                                <li class="nav-item flex-fill">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Новости</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane pt-2 fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <ul class="list-tape">
                                        <li class="row pt-2 pb-2">
                                            <div class="col-2 text-center">
                                                        <span class="avatar">
                                                            <img src="<?php bloginfo('template_url')?>/assets/images/user.png" alt="avatar">
                                                        </span>
                                            </div>
                                            <div class="col-10">
                                                <p>Lorem ipsum <strong>dolor sit</strong> amet, <a href="#">consectetur adipisicing elit</a>. Itaque, labore minima nemo quidem sint vero. Nam, natus, sapiente! Aliquam animi architecto aut consectetur consequuntur dolores fugit incidunt, ipsam sint sunt.</p>
                                            </div>
                                        </li>
                                        <li class="row pt-2 pb-2">
                                            <div class="col-2 text-center">
                                                        <span class="avatar">
                                                            <img src="<?php bloginfo('template_url')?>/assets/images/user.png" alt="avatar">
                                                        </span>
                                            </div>
                                            <div class="col-10">
                                                <p>Lorem ipsum <strong>dolor sit</strong> amet, <a href="#">consectetur adipisicing elit</a>. Itaque, labore minima nemo quidem sint vero. Nam, natus, sapiente! Aliquam animi architecto aut consectetur consequuntur dolores fugit incidunt, ipsam sint sunt.</p>
                                            </div>
                                        </li>
                                        <li class="row pt-2 pb-2">
                                            <div class="col-2 text-center">
                                                        <span class="avatar">
                                                            <img src="<?php bloginfo('template_url')?>/assets/images/user.png" alt="avatar">
                                                        </span>
                                            </div>
                                            <div class="col-10">
                                                <p>Lorem ipsum <strong>dolor sit</strong> amet, <a href="#">consectetur adipisicing elit</a>. Itaque, labore minima nemo quidem sint vero. Nam, natus, sapiente! Aliquam animi architecto aut consectetur consequuntur dolores fugit incidunt, ipsam sint sunt.</p>
                                            </div>
                                        </li>
                                        <li class="row pt-2 pb-2">
                                            <div class="col-2 text-center">
                                                        <span class="avatar">
                                                            <img src="<?php bloginfo('template_url')?>/assets/images/user.png" alt="avatar">
                                                        </span>
                                            </div>
                                            <div class="col-10">
                                                <p>Lorem ipsum <strong>dolor sit</strong> amet, <a href="#">consectetur adipisicing elit</a>. Itaque, labore minima nemo quidem sint vero. Nam, natus, sapiente! Aliquam animi architecto aut consectetur consequuntur dolores fugit incidunt, ipsam sint sunt.</p>
                                            </div>
                                        </li>
                                        <li class="row pt-2 pb-2">
                                            <div class="col-2 text-center">
                                                        <span class="avatar">
                                                            <img src="<?php bloginfo('template_url')?>/assets/images/user.png" alt="avatar">
                                                        </span>
                                            </div>
                                            <div class="col-10">
                                                <p>Lorem ipsum <strong>dolor sit</strong> amet, <a href="#">consectetur adipisicing elit</a>. Itaque, labore minima nemo quidem sint vero. Nam, natus, sapiente! Aliquam animi architecto aut consectetur consequuntur dolores fugit incidunt, ipsam sint sunt.</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane pt-2 fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <h6><a href="#">Семинары: Ленивое развитие</a></h6>
                                    <ul class="list-tape">
                                        <li class="row pt-2">
                                            <div class="col-2 text-center">
                                                        <span class="avatar">
                                                            <img src="<?php bloginfo('template_url')?>/assets/images/user.png" alt="avatar">
                                                        </span>
                                            </div>
                                            <div class="col-10">
                                                <p>Lorem ipsum <strong>dolor sit</strong> amet, <a href="#">consectetur adipisicing elit</a>. Itaque, labore minima nemo quidem sint vero. Nam, natus, sapiente! Aliquam animi architecto aut consectetur consequuntur dolores fugit incidunt, ipsam sint sunt.</p>
                                                <em class="date">2018.01.31</em>
                                            </div>
                                            <ul class="list-tape">
                                                <li class="row pt-2">
                                                    <div class="col-2 text-center">
                                                        <span class="avatar small">
                                                            <img src="<?php bloginfo('template_url')?>/assets/images/user.png" alt="avatar">
                                                        </span>
                                                    </div>
                                                    <div class="col-10">
                                                        <p>Lorem ipsum <strong>dolor sit</strong> amet, <a href="#">consectetur adipisicing elit</a>. Itaque, labore minima nemo quidem sint vero. Nam, natus, sapiente! Aliquam animi architecto aut consectetur consequuntur dolores fugit incidunt, ipsam sint sunt.</p>
                                                        <em class="date">2018.01.31</em>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <h6><a href="#">Семинары: Не очень ленивое развитие</a></h6>
                                    <ul class="list-tape">
                                        <li class="row pt-2">
                                            <div class="col-2 text-center">
                                                        <span class="avatar">
                                                            <img src="<?php bloginfo('template_url')?>/assets/images/user.png" alt="avatar">
                                                        </span>
                                            </div>
                                            <div class="col-10">
                                                <p>Lorem ipsum <strong>dolor sit</strong> amet, <a href="#">consectetur adipisicing elit</a>. Itaque, labore minima nemo quidem sint vero. Nam, natus, sapiente! Aliquam animi architecto aut consectetur consequuntur dolores fugit incidunt, ipsam sint sunt.</p>
                                                <em class="date">2018.01.31</em>
                                            </div>
                                            <ul class="list-tape">
                                                <li class="row pt-2">
                                                    <div class="col-2 text-center">
                                                        <span class="avatar small">
                                                            <img src="<?php bloginfo('template_url')?>/assets/images/user.png" alt="avatar">
                                                        </span>
                                                    </div>
                                                    <div class="col-10">
                                                        <p>Lorem ipsum <strong>dolor sit</strong> amet, <a href="#">consectetur adipisicing elit</a>. Itaque, labore minima nemo quidem sint vero. Nam, natus, sapiente! Aliquam animi architecto aut consectetur consequuntur dolores fugit incidunt, ipsam sint sunt.</p>
                                                        <em class="date">2018.01.31</em>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane pt-2 fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <ul class="list-tape list-news">
                                        <li class="row pt-2 pb-2">
                                            <div class="col-4">
                                                <div class="image-holder">
                                                    <img src="<?php bloginfo('template_url')?>/assets/images/promo_image.jpg" alt="Promo News">
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <p>Lorem ipsum <strong>dolor sit</strong> amet, <a href="#">consectetur adipisicing elit</a>. Itaque, labore minima nemo quidem sint vero. Nam, natus, sapiente! Aliquam animi architecto aut consectetur consequuntur dolores fugit incidunt, ipsam sint sunt.</p>
                                                <div class="button-holder pt-2">
                                                    <a href="#" class="btn btn-danger">Lorem Ipsum</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="row pt-2 pb-2">
                                            <div class="col-4">
                                                <div class="image-holder">
                                                    <img src="<?php bloginfo('template_url')?>/assets/images/promo_image.jpg" alt="Promo News">
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <p>Lorem ipsum <strong>dolor sit</strong> amet, <a href="#">consectetur adipisicing elit</a>. Itaque, labore minima nemo quidem sint vero. Nam, natus, sapiente! Aliquam animi architecto aut consectetur consequuntur dolores fugit incidunt, ipsam sint sunt.</p>
                                                <div class="button-holder pt-2">
                                                    <a href="#" class="btn btn-danger">Lorem Ipsum</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="row pt-2 pb-2">
                                            <div class="col-4">
                                                <div class="image-holder">
                                                    <img src="<?php bloginfo('template_url')?>/assets/images/promo_image.jpg" alt="Promo News">
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <p>Lorem ipsum <strong>dolor sit</strong> amet, <a href="#">consectetur adipisicing elit</a>. Itaque, labore minima nemo quidem sint vero. Nam, natus, sapiente! Aliquam animi architecto aut consectetur consequuntur dolores fugit incidunt, ipsam sint sunt.</p>
                                                <div class="button-holder pt-2">
                                                    <a href="#" class="btn btn-danger">Lorem Ipsum</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="row pt-2 pb-2">
                                            <div class="col-4">
                                                <div class="image-holder">
                                                    <img src="<?php bloginfo('template_url')?>/assets/images/promo_image.jpg" alt="Promo News">
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <p>Lorem ipsum <strong>dolor sit</strong> amet, <a href="#">consectetur adipisicing elit</a>. Itaque, labore minima nemo quidem sint vero. Nam, natus, sapiente! Aliquam animi architecto aut consectetur consequuntur dolores fugit incidunt, ipsam sint sunt.</p>
                                                <div class="button-holder pt-2">
                                                    <a href="#" class="btn btn-danger">Lorem Ipsum</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="row pt-2 pb-2">
                                            <div class="col-4">
                                                <div class="image-holder">
                                                    <img src="<?php bloginfo('template_url')?>/assets/images/promo_image.jpg" alt="Promo News">
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <p>Lorem ipsum <strong>dolor sit</strong> amet, <a href="#">consectetur adipisicing elit</a>. Itaque, labore minima nemo quidem sint vero. Nam, natus, sapiente! Aliquam animi architecto aut consectetur consequuntur dolores fugit incidunt, ipsam sint sunt.</p>
                                                <div class="button-holder pt-2">
                                                    <a href="#" class="btn btn-danger">Lorem Ipsum</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?php wp_footer(); ?>
</body>
</html>

