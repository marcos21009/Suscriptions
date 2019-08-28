<?php

namespace Modules\Suscriptions\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\User\Transformers\UserProfileTransformer;

class ProductTransformer extends Resource
{
    public function toArray($request)
    {

        $data = [
          'id' => $this->id,
          'name' => $this->name ?? '',
          'description' => $this->description ?? '',
          'status' => suscriptions__getStatus()->get($this->status) ?? '',
          'options' => $this->options ?? '',
          'requireShippingAddress' => $this->require_shipping_address ?? '',
          'user' => new UserProfileTransformer($this->whenLoaded('user')),
          'plans' => PlanTransformer::collection($this->whenLoaded('plans')),
          'createdAt' => $this->when($this->created_at, $this->created_at),
          'updatedAt' => $this->when($this->updated_at, $this->updated_at),
        ];

        return $data;
    }
}
