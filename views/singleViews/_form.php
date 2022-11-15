<div class="comment-form px-15">
    <h4>Laissez un commentaire</h4>
    <form action="" method="post">
        <?= display_session_alert('warning'); ?>
        <div class="cc-form-group cc-form-inline">
            <div class="cc-form-group">
                <input type="text" class="cc-form-control" placeholder="Votre nom" name="name" value="<?= get_post_data($_POST, 'name') ?>">
                <?= display_errors($errors, 'name') ?>
            </div>
            <div class="cc-form-group">
                <input type="text" class="cc-form-control" placeholder="Votre prénom" name="firstname" value="<?= get_post_data($_POST, 'firstname') ?>">
                <?= display_errors($errors, 'firstname') ?>
            </div>
        </div>

        <div class="cc-form-group">
            <input type="email" class="cc-form-control" placeholder="Votre email" name="email" value="<?= get_post_data($_POST, 'email') ?>">
            <?= display_errors($errors, 'email') ?>
        </div>

        <div class="cc-form-group">
            <textarea cols="30" rows="10" class="cc-form-control" placeholder="Votre message*" name="comment"><?= get_post_data($_POST, 'comment') ?></textarea>
            <?= display_errors($errors, 'comment') ?>
        </div>

        <button class="cc-btn cc-btn-outline" type="submit" name="add_comment">Commenter</button>
    </form>
</div>