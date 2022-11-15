<?php


function display_banner_image($image): string
{
    return "background: linear-gradient(to bottom, rgba(0, 0, 0, 0.75) 75%, rgba(255, 255, 255, 0.4)), url($image) center no-repeat;";
}

?>

<!-- Banner section -->
<section class="banner single-banner" id="banner" style="<?= display_banner_image($post->post_image) ?>">
    <div class="container">
        <div class="banner-wrapper">
            <h1 class="b-title"><?= $post->title ?></h1>
            <div class="page-path">
                <a href="index.php">Accueil<i class="fas fa-caret-right"></i></a>
                <a href="blog.php">Blog<i class="fas fa-caret-right"></i></a>
                <a href="single.php?id=<?= $_GET['id'] ?>">Article du blog</a>
            </div>
        </div>
    </div>
</section><!-- End banner section -->

<!-- Blog area -->
<div class="blog-area single-post-area py-70" id="blog-area">
    <div class="container">
        <div class="area-wrapper row">
            <div class="post-elt px-15 fw-300">
                <div class="single-post row px-15"><!-- single post details -->
                    <div class="blog-info px-15">
                        <div class="post-tag">
                            <?php foreach ($categories as $category): ?>
                                <a href="#" class="mb-1"><?= $category->title ?></a>
                            <?php endforeach; ?>
                        </div>
                        <ul class="blog-meta">
                            <li class="author"><a href="#"><?= concatenate($post->name, $post->firstname) ?><i class="fas fa-user"></i></a></li>
                            <li class="date"><a href="#"><?= time_format($post->created_at) ?><i class="fas fa-calendar-alt"></i></a></li>
                            <li class="consulted"><a href="#">Consulté 2M de fois<i class="fas fa-eye"></i></a></li>
                            <li class="comments"><a href="#">5069 Commentaires<i class="fas fa-comment"></i></a></li>
                        </ul>
                    </div>

                    <div class="post-img px-15 mb-1">
                        <img src="<?= $post->post_image ?>" alt="<?= $post->title ?>" class="img">
                    </div>

                    <div class="blog-details px-15 mb-1">
                        <h2 class="post-title"><?= $post->title ?></h2>
                        <p><?= nl2br($post->content) ?></p>
                    </div>

                    <div class="notice px-15 my-1">
                        <div class="quote">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias consectetur dignissimos ducimus, eaque eos,
                            illo inventore maiores necessitatibus nesciunt odit quis unde ut vero voluptatem voluptates. Assumenda deserunt eius
                            inventore?
                        </div>
                        <div class="notice-details row">
                            <div class="notice-img px-15"><img src="assets/imgs/articles/post-1.jpg" alt="" class="img"></div>
                            <div class="notice-img px-15"><img src="assets/imgs/articles/post-4.jpg" alt="" class="img"></div>
                            <div class="notice-text px-15">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet architecto asperiores at autem, commodi consequatur
                                    fugit hic labore nam necessitatibus pariatur porro rem unde! Ad explicabo nemo porro suscipit tenetur.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet architecto asperiores at autem, commodi consequatur
                                    fugit hic labore nam necessitatibus pariatur porro rem unde! Ad explicabo nemo porro suscipit tenetur.</p>
                            </div>
                        </div>
                    </div>
                </div><!-- End single post details -->

                <div class="navigation-area px-15 row"><!-- Navigation begin -->
                    <div class="nav-left px-15"><!-- Article précedent -->
                        <div class="thumb mr-1">
                            <a href="#"><img src="assets/imgs/mentors/m1.jpg" alt="" class="img"></a>
                        </div>
                        <div class="arrow"><a href="#"><i class="fas fa-arrow-left"></i></a></div>
                        <div class="details">
                            <p><small>Lorem ipsum.</small></p>
                            <a href="#">
                                <h4>Lorem ipsum dolor.</h4>
                            </a>
                        </div>
                    </div><!-- Fin Article précedent -->
                    <div class="nav-right px-15"><!-- Article suivant -->
                        <div class="thumb ml-1">
                            <a href="#"><img src="assets/imgs/mentors/m2.jpg" alt="" class="img"></a>
                        </div>
                        <div class="arrow"><a href="#"><i class="fas fa-arrow-right"></i></a></div>
                        <div class="details">
                            <p><small>Lorem ipsum.</small></p>
                            <a href="#">
                                <h4>Lorem ipsum dolor.</h4>
                            </a>
                        </div>
                    </div><!-- Fin Article suivant -->
                </div><!-- End Navigation -->

                <div class="comment-area px-15">
                    <h4>03 Commentaires</h4>
                    <div class="comment-row mb-1">
                        <div class="single-comment row">
                            <div class="thumb px-15">
                                <img src="assets/imgs/mentors/m2.jpg" alt="" class="img">
                            </div>
                            <div class="desc px-15">
                                <h5><a href="#">Coding City</a></h5>
                                <div class="comment-options">
                                    <p class="row">
                                        <small class="date px-15">19 Dec 1978</small>
                                        <small class="reply px-15">Répondre</small>
                                    </p>
                                    <p class="comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi atque consequuntur enim
                                        mollitia sit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-row mb-1">
                        <div class="single-comment row">
                            <div class="thumb px-15">
                                <img src="assets/imgs/mentors/m4.jpg" alt="" class="img">
                            </div>
                            <div class="desc px-15">
                                <h5><a href="#">Coding City</a></h5>
                                <div class="comment-options">
                                    <p class="row">
                                        <small class="date px-15">19 Dec 1978</small>
                                        <small class="reply px-15">Répondre</small>
                                    </p>
                                    <p class="comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi atque consequuntur enim
                                        mollitia sit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-row mb-1">
                        <div class="single-comment row">
                            <div class="thumb px-15">
                                <img src="assets/imgs/mentors/m5.jpg" alt="" class="img">
                            </div>
                            <div class="desc px-15">
                                <h5><a href="#">Coding City</a></h5>
                                <div class="comment-options">
                                    <p class="row">
                                        <small class="date px-15">19 Dec 1978</small>
                                        <small class="reply px-15">Répondre</small>
                                    </p>
                                    <p class="comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi atque consequuntur enim
                                        mollitia sit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="comment-form px-15">
                    <h4>Laissez un commentaire</h4>
                    <form>
                        <div class="cc-form-group cc-form-inline">
                            <div class="cc-form-group">
                                <input type="text" class="cc-form-control" placeholder="Votre nom">
                            </div>
                            <div class="cc-form-group">
                                <input type="text" class="cc-form-control" placeholder="Votre prénom">
                            </div>
                        </div>

                        <div class="cc-form-group">
                            <input type="email" class="cc-form-control" placeholder="Votre email">
                        </div>

                        <div class="cc-form-group">
                            <textarea cols="30" rows="10" class="cc-form-control" placeholder="Votre message"></textarea>
                        </div>

                        <button class="cc-btn cc-btn-outline">Commenter</button>
                    </form>
                </div>

            </div>

            <div class="blog-right-side px-15">
                <aside class="single-sidebar-widget search-widget">
                    <div class="cc-input-group">
                        <input type="text" class="cc-form-control" placeholder="Rechercher articles">
                        <span class="input-group-btn">
                                    <button class="cc-btn btn-widget" type="button"><i class="fas fa-search"></i></button>
                                </span>
                    </div>
                    <div class="br"></div>
                </aside>

                <aside class="single-sidebar-widget author-widget t-center fw-300">
                    <img src="<?= $post->user_image ?>" alt="" class="author-img img-rounded">
                    <h4><?= concatenate($post->firstname, $post->name) ?></h4>
                    <p><?= $post->role ?></p>
                    <div class="social-icon">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                    </div>
                    <p><?= nl2br($post->bio) ?></p>
                    <div class="br"></div>
                </aside>

                <aside class="single-sidebar-widget newsletter-widget t-center fw-300">
                    <h4 class="widget-title">Newsletter</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores commodi consequuntur corporis dolores hic labore maxime
                        sed. Beatae blanditiis delectus dolor eius, error esse facilis, odit optio, perferendis quam vel!</p>
                    <div class="cc-form-group">
                        <div class="cc-input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <input type="text" class="cc-form-control" placeholder="Entrez email">
                        </div>
                        <a href="#" class="bbtns">S'inscrire</a>
                    </div>
                    <p class="text-bottom"><small>Vous pouvez désister à tout moment</small></p>
                    <div class="br"></div>
                </aside>

                <aside class="single-sidebar-widget tag-cloud-widget t-center fw-300">
                    <h4 class="widget-title">Liste des étiquettes</h4>
                    <ul class="list">
                        <li><a href="#">Technologie</a></li>
                        <li><a href="#">Java</a></li>
                        <li><a href="#">PHP</a></li>
                        <li><a href="#">JavaScript</a></li>
                        <li><a href="#">Python</a></li>
                        <li><a href="#">CSS</a></li>
                        <li><a href="#">Laravel</a></li>
                        <li><a href="#">Symfony</a></li>
                        <li><a href="#">POO</a></li>
                        <li><a href="#">Twig</a></li>
                        <li><a href="#">Web</a></li>
                        <li><a href="#">Mobile</a></li>
                    </ul>
                </aside>
            </div>
        </div>
    </div>
</div>