<?php

namespace Modules\Suscriptions\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Suscriptions\Entities\Feature;
use Modules\Suscriptions\Http\Requests\CreateFeatureRequest;
use Modules\Suscriptions\Http\Requests\UpdateFeatureRequest;
use Modules\Suscriptions\Repositories\FeatureRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class FeatureController extends AdminBaseController
{
    /**
     * @var FeatureRepository
     */
    private $feature;
    public $users;

    public $file;
    public $status;

    public function __construct(FeatureRepository $feature, FileRepository $file, UserRepository $users, Status $status)
    {
        parent::__construct();

        $this->feature = $feature;




    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($product_id)
    {
        //$features = $this->feature->all();

        return view('suscriptions::admin.features.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('suscriptions::admin.features.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateFeatureRequest $request
     * @return Response
     */
    public function store(CreateFeatureRequest $request)
    {
        $this->feature->create($request->all());

        return redirect()->route('admin.suscriptions.feature.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('suscriptions::features.title.features')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Feature $feature
     * @return Response
     */
    public function edit(Feature $feature)
    {
        return view('suscriptions::admin.features.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Feature $feature
     * @param  UpdateFeatureRequest $request
     * @return Response
     */
    public function update(Feature $feature, UpdateFeatureRequest $request)
    {
        $this->feature->update($feature, $request->all());

        return redirect()->route('admin.suscriptions.feature.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('suscriptions::features.title.features')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Feature $feature
     * @return Response
     */
    public function destroy(Feature $feature)
    {
        $this->feature->destroy($feature);

        return redirect()->route('admin.suscriptions.feature.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('suscriptions::features.title.features')]));
    }
}
