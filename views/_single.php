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
                                <a href="#" class="mb-1"><span class="badge rounded-pill bg-orange"><?= $category->title ?></span></a>
                            <?php endforeach; ?>
                        </div>
                        <ul class="blog-meta">
                            <li class="author"><a href="#"><?= concatenate($post->name, $post->firstname) ?><i class="fas fa-user"></i></a></li>
                            <li class="date"><a href="#"><?= time_format($post->created_at) ?><i class="fas fa-calendar-alt"></i></a></li>
                            <li class="consulted"><a href="#">Consulté 2M de fois<i class="fas fa-eye"></i></a></li>
                            <li class="comments"><a href="#"><?= format_plural(count($comments), "Commentaire") ?><i class="fas
                            fa-comment"></i></a></li>
                        </ul>
                    </div>

                    <div class="post-img px-15 mb-3">
                        <img src="<?= $post->post_image ?>" alt="<?= $post->title ?>" class="img">
                    </div>

                    <div class="blog-details px-15 mb-1">
                        <h2 class="post-title"><?= $post->title ?></h2>
                        <p><?= nl2br($post->content) ?></p>
                    </div>
                </div><!-- End single post details -->

                <div class="navigation-area px-15 row">
                    <!-- Navigation begin -->
                    <div class="nav-left px-15">
                        <!-- Article précedent -->
                        <?php if ($key > 0) : ?>
                            <div class="thumb mr-1">
                                <a href="single.php?id=<?= $prevPost->id ?>"><img src="<?= $prevPost->post_image ?>" alt="" class="img"></a>
                            </div>
                            <div class="arrow"><a href="single.php?id=<?= $prevPost->id ?>"><i class="fas fa-arrow-left"></i></a></div>
                            <div class="details">
                                <p><small>Article précédent.</small></p>
                                <a href="single.php?id=<?= $prevPost->id ?>">
                                    <h4><?= $prevPost->title ?></h4>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div><!-- Fin Article précedent -->
                    <div class="nav-right px-15">
                        <!-- Article suivant -->
                        <?php if ($key < count($postsId) - 1) : ?>
                            <div class="thumb ml-1">
                                <a href="single.php?id=<?= $nextPost->id ?>"><img src="<?= $nextPost->post_image ?>" alt="" class="img"></a>
                            </div>
                            <div class="arrow"><a href="single.php?id=<?= $nextPost->id ?>"><i class="fas fa-arrow-right"></i></a></div>
                            <div class="details">
                                <p><small>Article suivant.</small></p>
                                <a href="single.php?id=<?= $nextPost->id ?>">
                                    <h4><?= $nextPost->title ?></h4>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div><!-- Fin Article suivant -->
                </div><!-- End Navigation -->

                <div class="comment-area px-15" id="comment-area">
                    <h4><?= format_plural(count($comments), 'Commentaire')?></h4>
                    <?= display_session_alert(); ?>
                    <?= display_session_alert('warning'); ?>
                    <?php foreach ($comments as $comment) : ?>
                        <div class="comment-row mb-1">
                            <div class="single-comment row">
                                <div class="thumb px-15">
                                    <img src="<?= $comment->image ?>" alt="" width="40" class="img-rounded">
                                </div>
                                <div class="desc px-15">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h5><a href="#"><?= $comment->name ?: '@Utilisateur' ?></a></h5>
                                        <small class="date px-15"><?= time_format($comment->created_at) ?></small>
                                    </div>
                                    <div class="comment-options">
                                        <p class="comment"><?= nl2br($comment->comment) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="comment-form px-15">
                    <h4>Laissez un commentaire</h4>
                    <form action="" method="post">
                        <div class="cc-form-group cc-form-inline">
                            <div class="cc-form-group">
                                <input type="text" name="name" class="cc-form-control" placeholder="Votre nom"
                                       value="<?= get_post_data($_POST, 'name') ?>">
                                <?= display_errors($errors, 'name') ?>
                            </div>
                            <div class="cc-form-group">
                                <input type="text" name="firstname" class="cc-form-control" placeholder="Votre prénom"
                                       value="<?= get_post_data($_POST, 'firstname') ?>">
                                <?= display_errors($errors, 'firstname') ?>
                            </div>
                        </div>

                        <div class="cc-form-group">
                            <input type="email" name="email" class="cc-form-control" placeholder="Votre email"
                                   value="<?= get_post_data($_POST, 'email') ?>">
                            <?= display_errors($errors, 'email') ?>
                        </div>

                        <div class="cc-form-group">
                            <textarea cols="30" rows="4" name="message" class="cc-form-control" placeholder="Votre message"><?= get_post_data
                                ($_POST, 'name')
                                ?></textarea>
                            <?= display_errors($errors, 'message') ?>
                        </div>

                        <button class="cc-btn cc-btn-outline" type="submit" name="add_comment">Commenter</button>
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
                    <div class="w-50 mx-auto">
                        <img src="<?= $post->user_image ?>" alt="" class="author-img img-fluid img-rounded">
                    </div>
                    <h4><?= $post->name ?></h4>
                    <p><?= $post->role ?></p>
                    <div class="social-icon">
                        <?php if (count($userSocialLinks) > 0): ?>
                            <?php foreach ($userSocialLinks as $socialLink): ?>
                                <a href="<?= $socialLink->link ?>" target="_blank"><i class="fab fa-<?= $socialLink->name ?>"></i></a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <p><?= decode_string($post->bio)  ?></p>
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