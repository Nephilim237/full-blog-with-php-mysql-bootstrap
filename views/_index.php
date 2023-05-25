<!-- Banner section -->
<section class="banner" id="banner">
    <div class="container">
        <div class="banner-wrapper">
            <?= display_session_alert(); ?>
            <?= display_session_alert('warning'); ?>
            <h1 class="b-title">Pratiquez et devenez meilleur</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium asperiores exercitationem hic inventore nemo! Aliquid blanditiis
                consequuntur deleniti distinctio dolore dolorem eveniet facere numquam officia pariatur quibusdam recusandae, reprehenderit,
                tempore?</p>
            <a href="blog.php" class="cc-btn cc-btn-big cc-btn-outline">Découvrir le monde</a>
        </div>
    </div>
</section> <!-- End banner section -->

<!-- Card section -->
<section class="card py-70" id="card">
    <div class="container">
        <div class="card-wrapper">
            <article>
                <header>
                    <h4>Lorem ipsum dolor sit amet, consectetur.</h4>
                </header>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem dolores eius id iusto, maiores nostrum obcaecati quam sed sint?
                    Aliquam aspernatur distinctio, eius excepturi expedita fugiat id iure sapiente totam.</p>
                <footer><a href="#" class="cc-btn cc-btn-outline">Voir plus<i class="fas fa-angle-double-right"></i></a></footer>
            </article>
            <article>
                <header>
                    <h4>Lorem ipsum dolor sit amet, consectetur.</h4>
                </header>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem dolores eius id iusto, maiores nostrum obcaecati quam sed sint?
                    Aliquam aspernatur distinctio, eius excepturi expedita fugiat id iure sapiente totam.</p>
                <footer><a href="#" class="cc-btn cc-btn-outline">Voir plus<i class="fas fa-angle-double-right"></i></a></footer>
            </article>
            <article>
                <header>
                    <h4>Lorem ipsum dolor sit amet, consectetur.</h4>
                </header>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem dolores eius id iusto, maiores nostrum obcaecati quam sed sint?
                    Aliquam aspernatur distinctio, eius excepturi expedita fugiat id iure sapiente totam.</p>
                <footer><a href="#" class="cc-btn cc-btn-outline">Voir plus<i class="fas fa-angle-double-right"></i></a></footer>
            </article>
        </div>
    </div>
</section><!-- End card section -->

<!-- Mentors section -->
<section class="mentors py-70 bg-bw" id="mentors">
    <div class="container">
        <div class="mentors-wrapper">
            <header class="section-header"><!-- Mentors header (Title + Desc) -->
                <h1 class="main-title">Personnels à votre disposition</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem earum molestiae pariatur suscipit vero. At ea hic illum impedit
                    iste, minus natus nemo nostrum perspiciatis reiciendis repudiandae similique temporibus ullam.</p>
            </header><!-- End mentors header -->

            <div class="mentors-container row"><!-- Mentors container -->
                <div class="mentor-box px-15">
                    <div class="box">
                        <div class="mentor-img"><img src="../assets/img/mentors/m1.jpg" alt="Mentor" class="img img-rounded"></div>
                        <h4 class="l4-title">Yoda</h4>
                        <p>Développeur frontend</p>
                    </div>
                </div>
                <div class="mentor-box px-15">
                    <div class="box">
                        <div class="mentor-img"><img src="../assets/img/mentors/m4.jpg" alt="Mentor" class="img img-rounded"></div>
                        <h4 class="l4-title">Yoda</h4>
                        <p>Développeur frontend</p>
                    </div>
                </div>
                <div class="mentor-box px-15">
                    <div class="box">
                        <div class="mentor-img"><img src="../assets/img/mentors/m2.jpg" alt="Mentor" class="img img-rounded"></div>
                        <h4 class="l4-title">Yoda</h4>
                        <p>Développeur frontend</p>
                    </div>
                </div>
                <div class="mentor-box px-15">
                    <div class="box">
                        <div class="mentor-img"><img src="../assets/img/mentors/m5.jpg" alt="Mentor" class="img img-rounded"></div>
                        <h4 class="l4-title">Yoda</h4>
                        <p>Développeur frontend</p>
                    </div>
                </div>
            </div><!-- End mentors container -->
        </div>
    </div>
</section><!-- End mentors section -->

<!-- Articles section -->
<section class="articles py-70" id="articles">
    <div class="container">
        <div class="articles-wrapper">
            <header class="section-header"><!-- Article header (h1 + Desc) -->
                <h1 class="main-title">Actualités récentes</h1>
                <p>Restez informés à tout moment grâce à nos professionnels de l'information. Quel que soit le moment ou le lieu, accedez à vos
                    contenus 24 h/24 et 7j/7</p>
            </header><!-- End article header -->

            <div class="articles-container row"><!-- Articles container -->

                <?php if (count($latestPosts) > 0): ?>
                    <?php foreach ($latestPosts as $post): ?>
                        <article class="px-15"><!-- Article 1 -->
                            <div class="article-img mb-3"><img src="../assets/img/articles/post-1.jpg" alt="Post image" class="img"></div>
                            <header>
                                <h4><?= $post->title?></h4>
                            </header>
                            <p><?= excerpt($post->content, 0, 100) ?></p>
                            <footer><a href="single.php?id=<?= $post->id ?>" class="cc-btn cc-btn-big">Lire l'article</a></footer>
                        </article><!-- End article 1 -->
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="no-elements d-flex justify-content-center align-items-center flex-column h-50 h1 gap-5">
                        Aucun posts pour le moment
                        <i class="far fa-frown-open fa-lg"></i>
                    </div>
                <?php endif; ?>
            </div><!-- End articles container -->
        </div>
    </div>
</section><!-- End article section -->