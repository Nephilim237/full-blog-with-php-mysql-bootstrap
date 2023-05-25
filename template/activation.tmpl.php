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
                font-family: sans-serif;
                text-align: center;
                box-shadow: 2px 4px 8px rgba(255, 164, 0, 0.75);
                padding: 70px;
            }

            h1 {
                font-size: 1.6rem;
                font-weight: 400;
                text-align: center;
                margin-bottom: 2rem;
                font-family: serif;
                color: #505556;
                line-height: 2;
            }

            p  {
                font-size: 16px;
                font-weight: 400;
                color: #505556;
                line-height: 2;
            }

            strong, .copyright {
                font-size: 1rem;
                color: #505556;
            }
        </style>
    </head>
    <body>

        <section>
            <h1>Administration de <?= WEBSITE_NAME ?></h1>
            <p>
                Cher <span><?= $name ?> <?= $firstname ?></span>, <br>
                Nous souhaiterons vous compter parmi le personnel de notre équipe. <br>
                Nous serons ravis que vous nous rejoigniez en suivant ce <a href="<?= WEBSITE_URL.'/activation.php?n='.$name.'&e='.$email.'&t='.$token ?>">lien</a>. <br>
                Votre mot de passe par défaut est <strong><em>1234567890</em></strong> que vous pourrez modifier dans vos paramètres personnels
                <br>
                Nous accordons de l'importance à votre personne et à votre oeuvre. <br>
                Cordialement
            </p>
            <div class="copyright"> &copy; | <?= WEBSITE_NAME ?> <?= date('Y') ?> tous droits reservés.</div>
        </section>
    </body>
</html>