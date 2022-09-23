<?php

namespace App\Services\ArticleCategory;

use LaravelEasyRepository\Service;
use App\Repositories\ArticleCategory\ArticleCategoryRepository;

class ArticleCategoryServiceImplement extends Service implements ArticleCategoryService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(ArticleCategoryRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    
}
