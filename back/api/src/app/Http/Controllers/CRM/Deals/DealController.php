<?php

namespace App\Http\Controllers\CRM\Deals;

use App\Http\Controllers\Controller;
use App\Http\Requests\CRM\Deal\InsertDealRequest;
use App\Services\CMS\Modules\DealZohoService;
use Mockery\Exception;

class DealController extends Controller
{
   public function __construct(private DealZohoService $service){}

    public function __invoke(InsertDealRequest $request)
    {
        try{
            return $this->service->insertDeal($request->validated());
        }
        catch (Exception $e){
            return response()->json($e->getMessage(), 500);
        }
    }
}
