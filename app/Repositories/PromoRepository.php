<?php

namespace App\Repositories;

use App\Models\Promo;
use Illuminate\Http\Request;
use App\Helpers\Functions\Coordinate;

class PromoRepository extends BaseRepository 
{
	const Paginate = 10;
    public function __construct(Promo $model, Request $request)
    {
        parent::__construct($model, $request);
		$this->model->creating(function($model){
            $model->expire_at = date("Y-m-d H:i:s", strtotime("+7 day"));
            $model->code = time();
        });
    }

    public function save(array $data): Promo 
    {
        return $this->create($data);
    }

    public function getPromoCodes() 
    {
    	$perPage = ($this->request->query('paginate')) ? $this->request->query('paginate'): self::Paginate;
        $status = $this->request->query('status');
        return $this->model
            ->when($this->request->query('status'),function ($query) use($status) {
                return $query->where('status',$status);
            })
			->with('event')
            ->latest()->paginate($perPage);
    }
}