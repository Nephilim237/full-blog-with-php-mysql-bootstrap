<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>

        <style>
            body {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            section {
                max-width: 540px;
                width: 100%;
                font-size: 18px;
                font-family: inherit;
                text-align: center;
                box-shadow: 2px 4px 8px rgba(255, 164, 0, 0.75);
                padding: 70px;
            }

            h1 {
                font-size: 1.6rem;
                font-weight: 400;
                text-align: center;
                margin-bottom: 2rem;
                color: #34393c;
            }

            p {
                font-size: 1.1em;
                font-weight: 400;
                color: #34393c;
                line-height: 2;
            }

            strong, .copyright {
                font-size: 1rem;
                color: #34393c;
            }
        </style>
    </head>
    <body>

        <section>
            <h1>Administration de <?= WEBSITE_NAME ?></h1>
            <p>
                <strong><?= $name ?> <?= $firstname ?></strong>, <br>
                Pour finaliser votre inscription, veuillez cliquer sur ce <a href="<?= WEBSITE_URL.'/activation.php?n='.$name.'&e='.$email.'&t='
                .$token ?>">lien</a>. <br>
                <br>
                Nous accordons de l'importance à votre personne et à votre œuvre. <br>
                Cordialement
            </p>
            <div class="copyright"> &copy; | <?= WEBSITE_NAME ?> <?= date('Y') ?> tous droits reservés.</div>
        </section>
    </body>
</html>