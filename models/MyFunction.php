<?php

namespace app\models;

class MyFunction {

    public static function generatePagination($page, $last_page, $url = '#', $onclick = '', $min = 5) {
        $pagination = '';
        $pagetile = '';

        $class_prev = '';
        $url_prev = str_replace(':p', $page - 1, $url);
        $onclick_prev = str_replace(':p', $page - 1, $onclick);

        $class_next = '';
        $url_next = str_replace(':p', $page + 1, $url);
        $onclick_next = str_replace(':p', $page + 1, $onclick);

        if ($page <= 1) {
            $class_prev = 'disabled';
            $url_prev = '';
            $onclick_prev = '';
        }

        if ($page >= $last_page) {
            $class_next = 'disabled';
            $url_next = '';
            $onclick_next = '';
        }

        $prev_tile = ''
                . '<div class="row">'
                . '<div class="col-sm-12" style="text-align: right">'
                . '<div class="dataTables_paginate paging_simple_numbers">'
                . '<ul class="pagination">'
                . '<li class="paginate_button previous ' . $class_prev . '">'
                . '<a href="' . $url_prev . '" onclick="' . $onclick_prev . '">Previous</a>'
                . '</li>';
        $next_tile = ''
                . '<li class="paginate_button next ' . $class_next . '">'
                . '<a href="' . $url_next . '" onclick="' . $onclick_next . '">Next</a>'
                . '</li>'
                . '</ul>'
                . '</div>'
                . '</div>'
                . '</div>';

        $class_first_tile = $page == 1 ? 'active' : '';
        $url_first_tile = str_replace(':p', 1, $url);
        $onclick_first_tile = str_replace(':p', 1, $onclick);
        $first_tile = ''
                . '<li class="paginate_button ' . $class_first_tile . '">'
                . '<a href="' . $url_first_tile . '" onclick="' . $onclick_first_tile . '">1</a>'
                . '</li>';

        $class_last_tile = $page == $last_page ? 'active' : '';
        $url_last_tile = str_replace(':p', $last_page, $url);
        $onclick_last_tile = str_replace(':p', $last_page, $onclick);
        $last_tile = ''
                . '<li class="paginate_button ' . $class_last_tile . '">'
                . '<a href="' . $url_last_tile . '" onclick="' . $onclick_last_tile . '">' . $last_page . '</a>'
                . '</li>';

        $dot_tile = ''
                . '<li class="paginate_button disabled">'
                . '<a href="#">…</a>'
                . '</li>';

        if ($last_page >= $min + 1) {
            if ($page < $last_page - 3) {
                $start = $page < $min ? 2 : $page - 2;
                $end = $page < $min ? $min + 1 : $page + $min - 3;
                $tile = MyFunction::pagetile($start, $end, $page, $url, $onclick);
                if ($page >= $min) {
                    //ada dot didepan
                    //ada dot dibelakang
                    $pagetile = $first_tile . $dot_tile . $tile . $dot_tile . $last_tile;
                } else {
                    //ga ada dot didepan
                    //ada dot dibelakang
                    $pagetile = $first_tile . $pagetile . $tile . $dot_tile . $last_tile;
                }
            } else {
                //ada dot didepan
                //ga ada dot dibelakang
                $start = $last_page - $min - 1;
                $end = $last_page - 1;
                $tile = MyFunction::pagetile($start, $end, $page, $url, $onclick);
                $pagetile = $first_tile . $dot_tile . $tile . $last_tile;
            }
        } else {
            $start = 1;
            $end = $last_page;
            $pagetile = MyFunction::pagetile($start, $end, $page, $url, $onclick);
        }

        $pagination = $prev_tile . $pagetile . $next_tile;

        return $pagination;
    }

    public static function pagetile($start, $end, $page, $url, $onclick) {
        $pagetile = '';
        for ($i = $start; $i <= $end; $i++) {
            $class_tile = $page == $i ? 'active' : '';
            $url_tile = str_replace(':p', $i, $url);
            $onclick_tile = str_replace(':p', $i, $onclick);

            $pagetile .= ''
                    . '<li class="paginate_button ' . $class_tile . '">'
                    . '<a href="' . $url_tile . '" onclick="' . $onclick_tile . '">' . $i . '</a>'
                    . '</li>';
        }

        return $pagetile;
    }

}
