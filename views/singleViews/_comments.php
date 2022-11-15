<div class="comment-area px-15" id="comment-area">
    <?= display_session_alert(); ?>
    <h4><?= number_display($comments) ?> Commentaires</h4>
    <?php
        foreach ($comments as $comment):

    ?>
        <div class="comment-row mb-1">
            <div class="single-comment row">
                <div class="thumb px-15">
                    <img src="<?= $comment->image ?>" alt="" class="img">
                </div>
                <div class="desc px-15">
                    <h5><a href="#"><?= concatenate($comment->firstname, $comment->name) ?></a></h5>
                    <div class="comment-options">
                        <p class="row">
                            <small class="date px-15"><?= time_format($comment->created_at) ?></small>
                            <small class="reply px-15">Répondre</small>
                        </p>
                        <p class="comment"><?= nl2br($comment->comment) ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>