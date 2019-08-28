<?php

namespace Modules\Suscriptions\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PlanTransformer extends Resource
{
    public function toArray($request)
    {

        $data = [
          'id' => $this->id,
          'name' => $this->name ?? '',
          'description' => $this->description ?? '',
          'code' => $this->code ?? '',
          'status' => $this->status ?? '',
          'displayOrder' => $this->display_order ?? '',
          'recommendation' => $this->recommendation ?? '',
          'free' => $this->free ?? '',
          'visible' => $this->visible ?? '',
          'price' => $this->price ?? '',
          'frequency' => $this->frequency ?? '',
          'billCycle' => $this->bill_cycle ?? '',
          'trialPeriod' => $this->trial_period ?? '',
          'options' => $this->options ?? '',
          'product' => new ProductTransformer($this->whenLoaded('product')),
          'features' => FeatureTransformer::collection($this->whenLoaded('features')),
          'createdAt' => $this->when($this->created_at, $this->created_at),
          'updatedAt' => $this->when($this->updated_at, $this->updated_at),
        ];

        return $data;
    }
}
