<?php

namespace App\Repositories\ArticleCategory;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\ArticleCategory;

class ArticleCategoryRepositoryImplement extends Eloquent implements ArticleCategoryRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(ArticleCategory $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
}
