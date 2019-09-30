<?php

namespace Modules\Suscriptions\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Suscriptions\Entities\Feature;
use Modules\Suscriptions\Http\Requests\CreateFeatureRequest;
use Modules\Suscriptions\Http\Requests\UpdateFeatureRequest;
use Modules\Suscriptions\Repositories\FeatureRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Suscriptions\Entities\Status;

class FeatureController extends AdminBaseController
{
    /**
     * @var FeatureRepository
     */
    private $feature;
    public $status;

    public function __construct(FeatureRepository $feature, Status $status)
    {
        parent::__construct();

        $this->feature = $feature;
        $this->status = $status;

    }

    /**
     * Display a listing of the resource.
     *
     * @param $product_id
     * @return Response
     */
    public function index($product_id)
    {
        $features = $this->feature->whereProduct($product_id, 12);

        return view('suscriptions::admin.features.index', compact('features','product_id'));
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
        $this->assetPipeline->requireJs('icheck.js');
        return view('suscriptions::admin.features.create', compact('statuses', 'product_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $product_id
     * @param  CreateFeatureRequest $request
     * @return Response
     */
    public function store($product_id, CreateFeatureRequest $request)
    {

        try {
            if ($product_id==$request->product_id) {

                $this->feature->create($request->all());

                return redirect()->route('admin.suscriptions.feature.index',[$product_id])
                    ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('suscriptions::features.title.features')]));
            }
            return Redirect::back()->withErrors(trans('core::core.messages.resource error', ['name' => 'product id does not match']))->withInput($request->all());
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()
                ->withError(trans('core::core.messages.resource error', ['name' => trans('suscriptions::features.title.features')]))->withInput($request->all());

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Feature $feature
     * @return Response
     */
    public function edit($product_id,Feature $feature)
    {
        if($product_id==$feature->product_id){
            $statuses = $this->status->lists();
            $this->assetPipeline->requireJs('ckeditor.js');
            return view('suscriptions::admin.features.edit', compact('feature','product_id','statuses'));
        }else{
            //realizr una redireccion 404
            return abort(404);
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Feature $feature
     * @param  UpdateFeatureRequest $request
     * @return Response
     */
    public function update($product_id,Feature $feature, UpdateFeatureRequest $request)
    {
        try {
            $this->feature->update($feature, $request->all());

            return redirect()->route('admin.suscriptions.feature.index', [$product_id])
                ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('suscriptions::features.title.features')]))->withInput($request->all());
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()
                ->withError(trans('core::core.messages.resource error', ['name' => trans('suscriptions::features.title.features')]))->withInput($request->all());


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Feature $feature
     * @return Response
     */
    public function destroy($product_id,Feature $feature)
    {
        try {
            if($product_id==$feature->product_id){
                $this->feature->destroy($feature);

                return redirect()->route('admin.suscriptions.feature.index',[$product_id])
                    ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('suscriptions::features.title.features')]));
            }else{
                //realizr una redireccion 404
                return abort(404);
            }

        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->route('admin.suscriptions.feature.index')
                ->withError(trans('core::core.messages.resource error', ['name' => trans('suscriptions::features.title.features')]));


        }
    }
}
