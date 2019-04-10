<?php
/**
 * User: TOLK  Date: 07.04.19
 */

$currPage = $_GET['page'] ?? 1;

function createUrl($pageNo) {

    if (isset($_GET['page'])) {
        $query = $_GET;
        $query['page'] = $pageNo;
        $newQuery = http_build_query($query);

        $parts = parse_url($_SERVER['REQUEST_URI']);

        return $parts['path'].'?'.$newQuery;
    } else {
        $currentUrl = $_SERVER['REQUEST_URI'];
        $parts = parse_url($_SERVER['REQUEST_URI']);
        if (isset($parts['query'])) {
            $concatSimbol = '&';
        } else {
            $concatSimbol = '?';
        }

        return $currentUrl.$concatSimbol.'page='.$pageNo;
    }
}

?>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php if($currPage != 1): ?>
                <li class="page-item"><a class="page-link" href="<?= createUrl($currPage-1) ?>"><<</a></li>
            <?php else: ?>
                <li class="page-item"><a class="disabled page-link" href="#"><<</a></li>
            <?php endif; ?>

            <?php
                $startLinkNo = 1;  //if beginning pages
                if ($currPage > 2) {
                    $startLinkNo = $currPage - 1;
                }
                //todo implement max page link

                for($i=$startLinkNo; $i < $startLinkNo+3; $i++): ?>
                <li class="page-item">
                    <a class="page-link"
                       href="<?= createUrl($i) ?>"> <?= $i ?> </a></li>
            <?php endfor; ?>


            <?php if(true): //TODO check if maxpage ?>
                <li class="page-item"><a class="page-link" href="<?= createUrl($currPage+1) ?>">>></a></li>
            <?php endif ?>
        </ul>
    </nav>