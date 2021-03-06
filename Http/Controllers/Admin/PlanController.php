<?php

namespace Modules\Suscriptions\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Suscriptions\Entities\Plan;
use Modules\Suscriptions\Entities\Status;
use Modules\Suscriptions\Http\Requests\CreatePlanRequest;
use Modules\Suscriptions\Http\Requests\UpdatePlanRequest;
use Modules\Suscriptions\Repositories\PlanRepository;
use Modules\Suscriptions\Repositories\FeatureRepository;
use Modules\Suscriptions\Repositories\PlanFeatureRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class PlanController extends AdminBaseController
{
    /**
     * @var PlanRepository
     */
    private $plan;
    private $status;
    private $feature;
    private $plan_feature;

    public function __construct(PlanRepository $plan, Status $status, FeatureRepository $feature, PlanFeatureRepository $planFeature)
    {
        parent::__construct();

        $this->plan = $plan;
        $this->status = $status;
        $this->feature = $feature;
        $this->plan_feature = $planFeature;

    }

    /**
     * Display a listing of the resource.
     *
     * @param $product_id
     * @return Response
     */
    public function index($product_id)
    {
        $plans = $this->plan->whereProduct($product_id, 20);

        return view('suscriptions::admin.plans.index', compact('product_id', 'plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $product_id
     * @return Response
     */
    public function create($product_id)
    {
        $statuses = $this->status->lists();
        $features = $this->feature->whereProduct($product_id, 50);
        $this->assetPipeline->requireJs('icheck.js');
        return view('suscriptions::admin.plans.create', compact('product_id', 'statuses', 'features'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $product_id
     * @param  CreatePlanRequest $request
     * @return Response
     */
    public function store($product_id, CreatePlanRequest $request)
    {

        try {
            if ($product_id == $request->product_id) {
                $this->plan->create($request->all());

                return redirect()->route('admin.suscriptions.plan.index')
                    ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('suscriptions::plans.title.plans')]));
            }
            return Redirect::back()->withErrors(trans('core::core.messages.resource error', ['name' => 'plan id does not match']))->withInput($request->all());
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()
                ->withError(trans('core::core.messages.resource error', ['name' => trans('suscriptions::plans.title.plans')]))->withInput($request->all());

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $product_id
     * @param  Plan $plan
     * @return Response
     */
    public function edit($product_id, Plan $plan)
    {

        if ($product_id == $plan->product_id) {

            $statuses = $this->status->lists();
            $features = $this->feature->whereProduct($product_id, 50);
            $this->assetPipeline->requireJs('ckeditor.js');
            return view('suscriptions::admin.plans.edit', compact('statuses', 'plan', 'features'));
        } else {
            //realizr una redireccion 404
            return abort(404);


        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Plan $plan
     * @param  UpdatePlanRequest $request
     * @return Response
     */
    public function update($product_id, Plan $plan, UpdatePlanRequest $request)
    {
        try {
            $this->plan->update($plan, $request->all());

            return redirect()->route('admin.suscriptions.plan.index')
                ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('suscriptions::plans.title.plans')]));
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->route('admin.suscriptions.plan.index')
                ->withSuccess(trans('core::core.messages.resource error', ['name' => trans('suscriptions::plans.title.plans')]));


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Plan $plan
     * @return Response
     */
    public function destroy(Plan $plan)
    {
        try {
            $this->plan->destroy($plan);

            return redirect()->route('admin.suscriptions.plan.index')
                ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('suscriptions::plans.title.plans')]));
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->route('admin.suscriptions.plan.index')
                ->withSuccess(trans('core::core.messages.resource error', ['name' => trans('suscriptions::plans.title.plans')]));


        }
    }
}
