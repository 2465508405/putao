<?php
namespace App\Utils;

class PageUtil{

    public static function getPage($currentPage,$totalNum,$pageSize,$id){
        $html = '';
        $totalPage = ceil($totalNum/$pageSize);//总页数
        if($totalPage <=1){
            return $html = "<span class='pagination-curr'>首页</span>";
        }
        $html .= "<a href='list/{$id}?page=1'>首页</a>";
        if($totalPage > 8){
            $length = 8;
        }else{
            $length = $totalPage;
        }
        if($totalPage < 8){
            for($i = 1;$i<$totalPage;$i++){
                if($i == $currentPage){
                    $html .= "<span class='pagination-curr'>{$i}</span>";        
                }else{
                    $html .= "<a href='/list/{$id}?page=1'>{$i}</a>";
                }
            }
        }elseif($totalPage > 8){
            if($currentPage <= 4){
                for($i=1;$i < $currentPage;$i++){
                    $html .= "<a href='/list/{$id}?page=1'>{$i}</a>";
                }
                $html .= "<span class='pagination-curr'>{$currentPage}</span><span>…</span>";
                for($i = $totalPage-$currentPage;$i<=$totalPage;$i++){
                    $html .= "<a href='/list/{$id}?page=1'>{$i}</a>";
                }
            }else{
                if(($totalPage - $currentPage) >=4){
                    for($i=$currentPage-3;$i < $currentPage;$i++){
                         $html .= "<a href='/list/{$id}?page=1'>{$i}</a>";
                    }
                    $html .= "<span class='pagination-curr'>{$currentPage}</span><span>…</span>";
                    for($i = $totalPage-3;$i<=$totalPage;$i++){
                        $html .= "<a href='/list/{$id}?page=1'>{$i}</a>";
                    }
                }else{
                    for($i=$currentPage-(8-($totalPage-$currentPage-1));$i < $currentPage;$i++){
                         $html .= "<a href='/list/{$id}?page=1'>{$i}</a>";
                    }
                    $html .= "<span class='pagination-curr'>{$currentPage}</span><span>…</span>";
                    for($i = $totalPage-$currentPage-1;$i<=$totalPage;$i++){
                        $html .= "<a href='/list/{$id}?page=1'>{$i}</a>";
                    }
                }
            }
        }
        $html .= "<a href='/list/{$id}?page={$totalPage}' class='pagination-last' title='尾页'>尾页</a>";
        $nextPage = $currentPage+1;
        if($currentPage+1 < $totalPage){
            $html .= "<a href='/list/{$id}?page={$nextPage}' class='pagination-next'>下一页</a>";
        }
        return $html;
        // <span class="pagination-curr">1</span>
        //         <a href="">2</a>
        //         <a href="">3</a>
        //         <a href="">4</a>
        //         <a href="">5</a>
        //         <span>…</span>
        //         <a href="" class="pagination-last" title="尾页">249</a>
    }
}