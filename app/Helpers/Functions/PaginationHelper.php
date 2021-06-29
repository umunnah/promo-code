<?php


namespace App\Helpers\Functions;


class PaginationHelper
{

    public static function paginate($paginationData)
    {
        $data = json_decode(json_encode($paginationData));
        $totalPages = 1;
        if ($data->total <= $data->per_page)
        {
            $next = null;
        } else {
            $totalPages = ceil($data->total / $data->per_page);
            $next = $data->current_page + 1;
        }

        return (object) [
            'total' => $data->total,
            'page' => $data->current_page,
            'data' => $data->data,
            'previous' => ($data->current_page == 1) ? null : $data->current_page -1,
            'next'=> $next,
            'total_pages' => $totalPages
        ];
    }
}
