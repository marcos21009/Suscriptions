<?php

namespace Modules\Suscriptions\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Suscriptions\Entities\Suscription;
use Modules\Suscriptions\Http\Requests\CreateSuscriptionRequest;
use Modules\Suscriptions\Http\Requests\UpdateSuscriptionRequest;
use Modules\Suscriptions\Repositories\SuscriptionRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class SuscriptionController extends AdminBaseController
{
    /**
     * @var SuscriptionRepository
     */
    private $suscription;

    public function __construct(SuscriptionRepository $suscription)
    {
        parent::__construct();

        $this->suscription = $suscription;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$suscriptions = $this->suscription->all();

        return view('suscriptions::admin.suscriptions.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('suscriptions::admin.suscriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateSuscriptionRequest $request
     * @return Response
     */
    public function store(CreateSuscriptionRequest $request)
    {
        $this->suscription->create($request->all());

        return redirect()->route('admin.suscriptions.suscription.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('suscriptions::suscriptions.title.suscriptions')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Suscription $suscription
     * @return Response
     */
    public function edit(Suscription $suscription)
    {
        return view('suscriptions::admin.suscriptions.edit', compact('suscription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Suscription $suscription
     * @param  UpdateSuscriptionRequest $request
     * @return Response
     */
    public function update(Suscription $suscription, UpdateSuscriptionRequest $request)
    {
        $this->suscription->update($suscription, $request->all());

        return redirect()->route('admin.suscriptions.suscription.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('suscriptions::suscriptions.title.suscriptions')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Suscription $suscription
     * @return Response
     */
    public function destroy(Suscription $suscription)
    {
        $this->suscription->destroy($suscription);

        return redirect()->route('admin.suscriptions.suscription.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('suscriptions::suscriptions.title.suscriptions')]));
    }
}
