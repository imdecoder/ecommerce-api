<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
			'name' => $this->name,
			'totalPrice' => number_format(($this->price - $this->discount), 2, ',', '.'),
			'rating' => $this->reviews->count() > 0
				? round($this->reviews->sum('star') / $this->reviews->count(), 2)
				: 'No rating yet.',
			'discount' => number_format($this->discount, 2, ',', '.'),
			'href' => [
				'link' => route('products.show', $this->id)
			]
		];
    }
}
