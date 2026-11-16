<?php
//ページネーション
function my_custom_pagination(){
  $args = array(
    'type' => 'list',
    'prev_text' => '<span>前のページ</span>',
    'next_text' => '<span>次のページ</span>',
    'mid_size' => '1',
  );
  $paginate = paginate_links($args);
  $replace = [
    '<ul class=\'page-numbers\'>' => '<ul class="pagination__list">',
    '<li><a class="prev page-numbers"' => '<li class="pagination__arrow pagination__arrow--prev"><a class="pagination__link"',
    '<li><a class="next page-numbers"' => '<li class="pagination__arrow pagination__arrow--next"><a class="pagination__link"',
    '<li><a class="page-numbers"' => '<li class="pagination__num"><a class="pagination__link"',
    '<li><span aria-current="page" class="page-numbers current"' => '<li class="pagination__num"><span aria-current="page" class="pagination__current"',
    '<li><span class="page-numbers dots">' => '<li class="pagination__num"><span class="pagination__dots">'
  ];
  $paginate = str_replace(array_keys($replace), array_values($replace), $paginate);
  echo '<div class="pagination">'."\n".$paginate.'</div>'."\n" ;
}