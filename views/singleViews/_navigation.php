<div class="navigation-area px-15 row"><!-- Navigation begin -->
    <div class="nav-left px-15"><!-- Article précedent -->
        <?php if ($key > 0): ?>
            <div class="thumb mr-1">
                <a href="single.php?id=<?= $prev ?>"><img src="<?= $prevPost->image ?>" alt="" class="img"></a>
            </div>
            <div class="arrow"><a href="#"><i class="fas fa-arrow-left"></i></a></div>
            <div class="details">
                <p><small>Article précédent</small></p>
                <a href="single.php?id=<?= $prev ?>">
                    <h4><?= $prevPost->title ?></h4>
                </a>
            </div>
        <?php endif; ?>
    </div><!-- Fin Article précedent -->

    <div class="nav-right px-15"><!-- Article suivant -->
        <?php if ($key < count($postsList) - 1): ?>
            <div class="thumb ml-1">
                <a href="single.php?id=<?= $next ?>"><img src="<?= $nextPost->image ?>" alt="" class="img"></a>
            </div>
            <div class="arrow"><a href="#"><i class="fas fa-arrow-right"></i></a></div>
            <div class="details">
                <p><small>Article suivant</small></p>
                <a href="single.php?id=<?= $next ?>">
                    <h4><?= $nextPost->title ?></h4>
                </a>
            </div>
        <?php endif; ?>
    </div><!-- Fin Article suivant -->
</div><!-- End Navigation -->
