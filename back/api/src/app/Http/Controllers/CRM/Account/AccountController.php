<?php

namespace App\Http\Controllers\CRM\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\CRM\Account\InsertAccountRequest;
use App\Services\CMS\Modules\AccountZohoService;
use Exception;

class AccountController extends Controller
{
    public function __construct(private AccountZohoService $service) {}

    public function __invoke(InsertAccountRequest $request)
    {
        try{
            return $this->service->insertAccount($request->validated());
        }
        catch (Exception $e){
            return response()->json($e->getMessage(), 500);
        }
    }
}
