<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UsersCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->currentPage() <= 2){
            $x = 0;
            for($i = 1; $i <= 5; $i++){
                $pages[$x] = $i;
                $x++;
            }
        } else {
            $x = 0;
            $start = $this->currentPage() - 2;
            $end = $this->currentPage() + 2;
            for($i = $start; $i <= $end; $i++){
                $pages[$x] = $i;
                $x++;
            }
        }
        return [
            'data' => $this->collection,
            'url' => route('users'),
            'pages' => $pages
        ];
    }
}
