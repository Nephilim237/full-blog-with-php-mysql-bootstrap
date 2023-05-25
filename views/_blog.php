<!-- Blog intro -->
<section class="blog-intro pt-120" id="blog-intro">
    <div class="container">
        <div class="intro">
            <h1 class="main-title">Lorem ipsum dolor sit amet, consectetur.</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, dolorum eius ipsam modi
                molestiae pariatur porro suscipit ullam! Animi delectus dolor eum nobis placeat quasi vel! Ea
                harum rerum voluptatum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aspernatur debitis, doloremque est
                facere laboriosam maiores maxime mollitia, necessitatibus neque placeat qui ratione recusandae repudiandae sint temporibus voluptas
                voluptatem voluptatibus?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi blanditiis consectetur culpa ex harum, maiores molestiae optio
                perferendis placeat praesentium quos rem sunt voluptatem. Debitis fugiat mollitia praesentium reprehenderit sed!</p>
        </div>
    </div>
</section><!-- End blog intro -->

<!-- Blog category area -->
<section class="blog-category py-70" id="blog-category">
    <div class="container">
        <div class="category-wrapper row">
            <div class="category-post px-15"><!-- Category post 1 -->
                <img src="../assets/img/blog/cat-post/cat3.jpg" alt="Post" class="img"><!-- Image -->
                <div class="category-details">
                    <div class="category-text">
                        <a href=""><h5>Lorem ipsum.</h5></a>
                        <div class="border-line"></div>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div><!-- End category post 1 -->

            <div class="category-post px-15"><!-- Category post 2 -->
                <img src="../assets/img/blog/cat-post/cat.jpg" alt="Post" class="img">
                <div class="category-details">
                    <div class="category-text">
                        <a href=""><h5>Lorem ipsum.</h5></a>
                        <div class="border-line"></div>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div><!-- End category post 2 -->

            <div class="category-post px-15"><!-- Category post 3 -->
                <img src="../assets/img/blog/cat-post/cat1.jpg" alt="Post" class="img">
                <div class="category-details">
                    <div class="category-text">
                        <a href=""><h5>Lorem ipsum.</h5></a>
                        <div class="border-line"></div>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div><!-- End category post 3 -->
        </div>
    </div>
</section><!-- End blog category -->

<!-- Blog Area -->
<section id="blog-area" class="blog-area py-70">
    <div class="container">
        <div class="area-wrapper row">
            <div class="blog-left-side px-15"><!-- Partie des catégorie et information sur l'auteur -->
                <?php if (count($posts) > 0): ?>
                    <?php foreach ($posts as $post): ?>
                        <article class="blog-item row">
                            <div class="blog-info px-15">
                                <div class="post-tag">
                                    <?php
                                        $categories = get_categories_for_articles($post->id);
                                        $nbComments = count(get_comments_for_article($post->id));
                                        foreach ($categories as $category):
                                    ?>
                                        <a href="#"><span class="badge rounded-pill bg-orange"><?= $category->title ?></span></a>
                                    <?php endforeach; ?>
                                </div>
                                <ul class="blog-meta">
                                    <li class="author"><a href="#"><?= concatenate($post->name, $post->firstname) ?><i class="fas fa-user"></i></a>
                                    </li>
                                    <li class="date"><a href="#"><?= time_format($post->created_at) ?><i class="fas fa-calendar-alt"></i></a></li>
                                    <li class="consulted"><a href="#">Consulté 2M de fois<i class="fas fa-eye"></i></a></li>
                                    <li class="comments"><a href="#"><?= format_plural($nbComments, "Commentaire") ?><i class="fas
                                    fa-comment"></i></a></li>
                                </ul>
                            </div>
                            <div class="blog-post px-15">
                                <img src="<?= $post->image ?>" alt="<?= $post->title ?>" class="img">
                                <div class="blog-details">
                                    <a href="single.php?id=<?= $post->id ?>"><h2><?= $post->title ?></h2></a>
                                    <p><?= excerpt($post->content, 0, 100) ?></p>
                                    <a href="single.php?id=<?= $post->id ?>" class="cc-btn">Lire l'article</a>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="no-elements d-flex justify-content-center align-items-center flex-column h-50 h1 gap-5">
                        Aucun posts pour le moment
                        <i class="far fa-frown-open fa-lg"></i>
                    </div>
                <?php endif; ?>
                <nav class="blog-pagination"><!-- Pagination -->
                    <ul class="cc-pagination">
                        <?= display_pagination($totalPages) ?>
                    </ul>
                </nav><!-- End pagination -->
            </div><!-- Fin Partie des catégorie et information sur l'auteur -->

            <div class="blog-right-side px-15">
                <aside class="single-sidebar-widget search-widget">
                    <form action="">
                        <div class="cc-input-group">
                            <input type="text" class="cc-form-control" name="q" value="<?= get_get_data($_GET, 'q') ?>"
                                   placeholder="Rechercher articles">
                            <span class="input-group-btn">
                            <button class="cc-btn btn-widget"><i class="fas fa-search"></i></button>
                        </span>
                        </div>
                    </form>

                    <div class="br"></div>
                </aside>

                <aside class="single-sidebar-widget author-widget t-center fw-300">
                    <div class="w-50 mx-auto">
                        <img src="<?= $owner->image ?>" alt="" class="author-img img-fluid img-rounded">
                    </div>
                    <h4><?= concatenate($owner->name, $owner->firstname) ?></h4>
                    <p><?= $owner->role ?></p>
                    <div class="social-icon">
                        <?php if (count($owner_social_links) > 0): ?>
                            <?php foreach ($owner_social_links as $social_link): ?>
                                <a href="<?= $social_link->link ?>" target="_blank"><i class="fab fa-<?= $social_link->name ?>"></i></a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <p><?= decode_string($owner->bio)  ?></p>
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
                    <div class="br">

                    </div>
                </aside>

                <aside class="single-sidebar-widget tag-cloud-widget t-center fw-300">
                    <h4 class="widget-title">Liste des étiquettes</h4>
                    <ul class="list">
                        <?php foreach ($allCategories as $allCategory): ?>
                            <li><a href="#"><?= $allCategory->title ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </aside>
            </div>
        </div>
    </div>
</section><!-- End Blog Area -->