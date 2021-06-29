<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;
use App\Http\Request\StorePromo;
use App\Http\Response\ApiResponse;
use App\Repositories\PromoRepository;
use App\Helpers\Functions\PaginationHelper;

class PromoController extends Controller
{
    private $promoRepository;

    public function __construct(PromoRepository $promoRepository) 
    {
        $this->promoRepository = $promoRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promoCodes = $this->promoRepository->getPromoCodes();
        return ApiResponse::sendResponse(PaginationHelper::paginate($promoCodes), trans('successful'));
    }


    /**
     * @return \Illuminate\Http\Response
     */
    public function store(StorePromo $request)
    {
        $promoCode =  $this->promoRepository->save($request->all());
        return ApiResponse::sendResponse($promoCode, trans("successful"), true,201);
    }


    /**
     * @return \Illuminate\Http\Response
     */
    public function deActivate(Promo $promo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promo $promo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promo $promo)
    {
        //
    }
}
