<?php

namespace Modules\Suscriptions\Http\Controllers\Api;

// Requests & Response
use Modules\Suscriptions\Http\Requests\CreateSuscriptionRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

// Transformers
use Modules\Suscriptions\Transformers\SuscriptionTransformer;

// Repositories
use Modules\Suscriptions\Repositories\SuscriptionRepository;
use Modules\Suscriptions\Repositories\PlanRepository;

class SuscriptionApiController extends BaseApiController
{
  private $suscription;
  private $plan;

  public function __construct(SuscriptionRepository $suscription,PlanRepository $plan)
  {
    $this->suscription = $suscription;
    $this->plan = $plan;
  }

  /**
   * Get List Suscriptions
   * @return Response
   */
  public function index(Request $request)
  {
    try {
      //Get Parameters from URL.
      $params = $this->getParamsRequest($request);

      //Request to Repository
      $suscriptions = $this->suscription->getItemsBy($params);

      //Response
      $response = ['data' => SuscriptionTransformer::collection($suscriptions)];

      //If request pagination add meta-page
      $params->page ? $response["meta"] = ["page" => $this->pageTransformer($suscriptions)] : false;
    } catch (\Exception $e) {
      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }

    //Return response
    return response()->json($response ?? ["data" => "Request successful"], $status ?? 200);
  }

  /**
   * GET A ITEM
   *
   * @param $criteria
   * @return mixed
   */
  public function show($criteria, Request $request)
  {
    try {
      //Get Parameters from URL.
      $params = $this->getParamsRequest($request);

      //Request to Repository
      $suscription = $this->suscription->getItem($criteria, $params);

      //Break if no found item
      if (!$suscription) throw new \Exception('Item not found', 204);

      //Response
      $response = ["data" => new SuscriptionTransformer($suscription)];

    } catch (\Exception $e) {
      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }

    //Return response
    return response()->json($response ?? ["data" => "Request successful"], $status ?? 200);
  }

  /**
   * CREATE A ITEM
   *
   * @param Request $request
   * @return mixed
   */
  public function create(Request $request)
  {
    \DB::beginTransaction();
    try {
      $data = $request->input('attributes') ?? [];//Get data

      //Validate Request
      $this->validateRequestApi(new CreateSuscriptionRequest($data));

      $init_date=\Carbon\Carbon::now();
      $end_date=\Carbon\Carbon::now();
      $plan=$this->plan->find($data['plan_id']);
      $user=\Auth::guard('api')->user() ?? \Auth::user();
      $data['user_id']=$user->id;
      if($plan->bill_cycle=="week"){
        $end_date->addWeeks($plan->frequency);
      }else if($plan->bill_cycle=="month"){
        $end_date->addDays($plan->frequency);
      }else if($plan->bill_cycle=="year"){
        $end_date->addYears($plan->frequency);
      }
      $data['total']=$plan->price;
      $data['init_date']=$init_date->format("Y-m-d");
      $data['end_date']=$end_date->format("Y-m-d");
      $data['status']=1;//Active
      //Create item
      $suscription = $this->suscription->create($data);

      //Response
      $response = ["data" => new SuscriptionTransformer($suscription)];
      \DB::commit(); //Commit to Data Base
    } catch (\Exception $e) {
      \DB::rollback();//Rollback to Data Base
      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }
    //Return response
    return response()->json($response ?? ["data" => "Request successful"], $status ?? 200);
  }

  /**
   * UPDATE ITEM
   *
   * @param $criteria
   * @param Request $request
   * @return mixed
   */
  public function update($criteria, Request $request)
  {
    \DB::beginTransaction(); //DB Transaction
    try {
      //Get data
      $data = $request->input('attributes') ?? [];//Get data

      //Get Parameters from URL.
      $params = $this->getParamsRequest($request);

      //Get suscription
      $suscription = $this->suscription->getItem($criteria, $params);
      if(!$suscription)
      throw new \Exception("Item not found", 404);

      //Request to Repository
      $this->suscription->update($suscription, $data);

      //Response
      $response = ["data" => 'Item Updated'];
      \DB::commit();//Commit to DataBase
    } catch (\Exception $e) {
      \DB::rollback();//Rollback to Data Base
      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }

    //Return response
    return response()->json($response ?? ["data" => "Request successful"], $status ?? 200);
  }

  /**
   * DELETE A ITEM
   *
   * @param $criteria
   * @return mixed
   */
  public function delete($criteria, Request $request)
  {
    \DB::beginTransaction();
    try {
      //Get params
      $params = $this->getParamsRequest($request);

      //Get suscription
      $suscription = $this->suscription->getItem($criteria, $params);
      if(!$suscription)
      throw new \Exception("Item not found", 404);

      //call Method delete
      $this->suscription->destroy($suscription);

      //Response
      $response = ["data" => "Item deleted"];
      \DB::commit();//Commit to Data Base
    } catch (\Exception $e) {
      \DB::rollback();//Rollback to Data Base
      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }

    //Return response
    return response()->json($response ?? ["data" => "Request successful"], $status ?? 200);
  }

}
