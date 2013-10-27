<?php
function Pagination($ile, $page=0, $link='') {
    $offset = 0;
    $pagination = array();
    
    if($ile>ONPAGE) {
        
        $pages = ceil($ile/ONPAGE);
        
        if($page>$pages){
            // Wyjście poza zakres...
            // Zwrócić błąd 404
        }
        
        $offset = ($page-1)*ONPAGE;
        
        $list = array(
            array('nr' => $page)
        );
        
        $left = $page-ONSHOW-1;
        $right = $pages-$page-ONSHOW;
        
        $licz = ONSHOW + ($right<0?-$right:0);
        for($i=$page-1;$i>0;$i--){
            if(!$licz-- && $i>1){
                array_unshift(
                    $list,
                    array('nr' => '...')
                );
                $i = 1;
            }
            array_unshift(
                $list,
                array('nr' => $i, 'link' => $link . ($i>1?'strona/'.$i.'/':'') ) 
            );
        }
        
        $licz = ONSHOW + ($left<0?-$left:0);
        for($i=$page+1;$i<=$pages;$i++){
            if(!$licz-- && $i<$pages){
                array_push(
                    $list,
                    array('nr'=>'...')
                );
                $i = $pages;
            }
            array_push(
                $list,
                array('nr' => $i, 'link' => $link . ($i>1?'strona/'.$i.'/':'') ) 
            );
        }
        
        $pagination = array(
            'prev' => $page>1 ? $link . ($page>2?'strona/'.($page-1).'/':'') : '',
            'next' => $page<$pages ? $link . 'strona/'.($page+1).'/' : '',
            'list' => $list
        );
    }
    return array(
        'pagination' => $pagination, // Zwraca tablicę z linkami
        'offset' => $offset // Zwraca offset rekordów do pobrania
    );
}
?>