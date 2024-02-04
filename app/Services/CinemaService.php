<?php
namespace App\Services;

use App\Repository\CinemaRepository;
use Illuminate\Support\Facades\Storage;

class CinemaService{
    public function __construct(public $cinemaRepo = new CinemaRepository ){}

    public function savePost(array $post){
        $upload = Storage::put('image', $post['poster']);
        $post ['poster'] = "storage/$upload";

        return $this->cinemaRepo->upload($post);
    }
}