<?php

namespace Modules\Suscriptions\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class FeatureTransformer extends Resource
{
    public function toArray($request)
    {

        $data = [
          'id' => $this->id,
          'name' => $this->name ?? '',
          'description' => $this->description ?? '',
          'caption' => $this->caption ?? '',
          'status' => suscriptions__getStatus()->get($this->status) ?? '',
          'type' => suscriptions__getType()->get($this->type) ?? '',
          'unit' => $this->unit ?? '',
          'options' => $this->options ?? '',
          'product' => new ProductTransformer($this->whenLoaded('product')),
          'createdAt' => $this->when($this->created_at, $this->created_at),
          'updatedAt' => $this->when($this->updated_at, $this->updated_at),
        ];

        return $data;
    }
}
