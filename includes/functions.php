<?php
/**
 * Fait le traitement nécessaire pour afficher la pagination. Prend en compte le nombre total de page, le paramètre de pagination et éventuellement le paramètr de recherche.
 *
 * @param string $totalPages Est le nombre total de page sur lequel nos éléments devront être afficher
 *
 * @return string|null Retourne l'ensemble de la pagination destiné à être affiché sur une page listant des articles
 */
function display_pagination(string $totalPages = '1'): ?string
{
    $page = (int)($_GET['p'] ?? 1);
    $pagination = <<<HTML
        
    HTML;

    if ($totalPages <= 1) return null;

    if ($page > 1) {
        $inPage = build_http_query(['p' => $page - 1]);
        $disabledState = ($page > 1) ? '' : 'disabled';
        $pagination .= <<<HTML
            <li class="cc-page-item">
                <a href="?$inPage" class="page-path $disabledState">
                    <span><i class="fas fa-angle-double-left"></i></span>
                </a>
            </li>
        HTML;
    }

    if ($page <= $totalPages) {
        $inPage = build_http_query(['p' => 1]);
        $activeState = (!empty($_GET['p']) && $_GET['p'] == 1) ? 'active' : '';
        $i = max(2, $page - 2);
        $pagination .= <<<HTML
            <li class="cc-page-item"><a href="?$inPage" class="page-path $activeState">1</a></li>
        HTML;

        if ($i > 2) {
            $pagination .= <<<HTML
                '<li class="p-1">...</li>'
            HTML;

        }
        for (; $i < min($page + 2, $totalPages); $i++) {
            $inPage = build_http_query(['p' => $i]);
            $activeState = (!empty($_GET['p']) && $_GET['p'] == $i) ? ' active' : '';
            $pagination .= <<<HTML
                <li class="cc-page-item"><a href="?$inPage" class="page-path $activeState">$i</a></li>
            HTML;
        }
        if ($i != $totalPages) {
            $pagination .= <<<HTML
                 <li class="p-1">...</li>
            HTML;
        }

        $inPage = build_http_query(['p' => $totalPages]);
        $activeState = (!empty($_GET['p']) && $_GET['p'] == $totalPages) ? ' active' : '';
        $pagination .= <<<HTML
            <li class="cc-page-item"><a href="?$inPage" class="page-path $activeState">$totalPages</a></li>
        HTML;
    }

    if ($page < $totalPages) {
        $inPage = build_http_query(['p' => $page + 1]);
        $disabledState = ($totalPages > 1) ? '' : 'disabled';
        $pagination .= <<<HTML
            <li class="cc-page-item">
                <a href="?$inPage" class="page-path  $disabledState">
                    <span><i class="fas fa-angle-double-right"></i></span>
                </a>
            </li>
        HTML;
    }

    return $pagination;
}

function build_http_query(array $param): string
{
    return http_build_query(array_merge($_GET, $param));
}

function get_post_data(array $tableData, string $field, ?string $databaseValue = null): string
{
    if (!isset($tableData[$field]) && !isset($databaseValue)) return '';
    if (isset($databaseValue) && !isset($tableData[$field])) return htmlentities($databaseValue);

    return htmlentities($tableData[$field]);
}

function get_get_data(array $tableData, string $field): string
{
    if (!isset($tableData[$field])) return '';

    return htmlentities($tableData[$field]);
}

function get_selected_tag(string $field, string $value): ?string
{
    if (!isset($_POST[$field])) return null;
    if (is_array($_POST[$field])) {
        if (in_array($value, $_POST[$field], true)) {
            return 'selected';
        }
    } else if (is_string($_POST[$field]) && $_POST[$field] === $value) {
        return 'selected';
    }

    return null;
}


function not_empty($data): bool
{
    if (is_string($data) && (trim($data) === "" || empty($data))) return false;
    if (is_array($data)) {
        foreach ($data as $datum) {
            if (is_array($datum)) {
                not_empty($datum);
            } else if (empty($datum) || trim($datum) === '') {
                return false;
            }
        }
    }

    return true;
}

function length_validation(string $data, int $min, int $max): bool
{
    if (mb_strlen($data) < $min) return false;
    if (mb_strlen($data) > $max) return false;

    return true;
}

function sanitize($data)
{
    if (is_array($data)) {
        foreach ($data as $index => $datum) {
            if (is_array($datum)) {
                sanitize($datum);
            } else {
                $data[$index] = htmlentities($datum);
            }
        }
        return $data;
    }
    return htmlentities($data);
}

function display_errors(array $errorsArray, string $field): string
{
    if (!isset($errorsArray[$field])) return '';
    $error = $errorsArray[$field];
    return <<<HTML
        <div class="w-100"><small class="text-danger">$error</small></div>
    HTML;

}

function var_dumping(...$args)
{
    echo '<div class="py-70">';
    foreach ($args as $arg):
        echo '<div class="bg-dark text-warning px-3 small"><pre>';
        var_dump($arg);
        echo '</pre></div>';
    endforeach;
    echo '</div>';
}

/**
 * @throws Exception
 */
function time_format($stringTime): string
{
    $date = new DateTime($stringTime);
    return $date->format('d-M-Y à H:i');
}

function concatenate($param1, $param2): string
{
    return $param1 . ' ' . $param2;
}

function redirect_to(string $path)
{
    header('Location:' . $path);
    exit();
}