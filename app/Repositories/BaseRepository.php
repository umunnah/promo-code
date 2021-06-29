<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

abstract  class BaseRepository
{
    /**
     * @var Request
     */
    protected $request;
    /**
     * @var Model
     */
    protected $model;
    /**
     * @var DB
     */
    protected $db;

    public function __construct(Model $model, Request $request)
    {
        $this->model = $model;
        $this->request =$request;
        $this->db = new DB();

    }

    public function all()
    {
        return $this->model->all();
    }


    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        return $this->model->firstOrFail($id)->update($attributes);
    }


}
