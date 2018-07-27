<?php

namespace Modules\Suscriptions\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Suscriptions\Entities\Product;
use Modules\Suscriptions\Http\Requests\CreateProductRequest;
use Modules\Suscriptions\Http\Requests\UpdateProductRequest;
use Modules\Suscriptions\Repositories\ProductRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Suscriptions\Entities\Status;
use Modules\Media\Repositories\FileRepository;
use Modules\User\Repositories\UserRepository;

class ProductController extends AdminBaseController
{
    /**
     * @var ProductRepository
     */
    private $product;

    public $users;

    public $file;
    public $status;

    public function __construct(ProductRepository $product, FileRepository $file, UserRepository $users, Status $status)
    {
        parent::__construct();

        $this->product = $product;
        $this->file = $file;
        $this->users=$users;
        $this->status = $status;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = $this->product->paginate(9);

        return view('suscriptions::admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $statuses = $this->status->lists();
        $users = $this->users->all();
        $this->assetPipeline->requireJs('ckeditor.js');
        $this->assetPipeline->requireJs('icheck.js');
        return view('suscriptions::admin.products.create', compact('statuses', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateProductRequest $request
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {

        try {
            $this->product->create($request->all());

            return redirect()->route('admin.suscriptions.product.index')
                ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('suscriptions::products.title.products')]));
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->route('admin.suscriptions.product.index')
                ->withError(trans('core::core.messages.resource error', ['name' => trans('suscriptions::products.title.products')]));
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        $statuses = $this->status->lists();
        $users = $this->users->all();
        $this->assetPipeline->requireJs('ckeditor.js');
        $this->assetPipeline->requireJs('icheck.js');
        $thumbnail = $this->file->findFileByZoneForEntity('thumbnail', $product);
        return view('suscriptions::admin.products.edit', compact('product', 'thumbnail', 'statuses', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Product $product
     * @param  UpdateProductRequest $request
     * @return Response
     */
    public function update(Product $product, UpdateProductRequest $request)
    {
        try {
            $this->product->update($product, $request->all());

            return redirect()->route('admin.suscriptions.product.index')
                ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('suscriptions::products.title.products')]));

        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->route('admin.suscriptions.product.index')
                ->withSuccess(trans('core::core.messages.resource error', ['name' => trans('suscriptions::products.title.products')]));

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     * @return Response
     */
    public function destroy(Product $product)
    {
        try {
            $this->product->destroy($product);

            return redirect()->route('admin.suscriptions.product.index')
                ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('suscriptions::products.title.products')]));

        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->route('admin.suscriptions.product.index')
                ->withSuccess(trans('core::core.messages.resource error', ['name' => trans('suscriptions::products.title.products')]));

        }
    }
}
