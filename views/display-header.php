<?php

function display_header(string $title = 'Formation PHP', string $iconType = 'at') {

    return <<<HTML
        <section class="admin-header pt-70">
            <div class="border-top border-5 border-orange"></div>
            <div class="bg-dark text-light">
                <div class="container">
                    <div class="row">
                        <h1><i class="fas fa-$iconType"></i>$title</h1>
                    </div>
                </div>
            </div>
            <div class="border-bottom border-5 border-orange"></div>
        </section>
    HTML;

}