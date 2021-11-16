<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'key' => $this->id,
            'usuario_nombre' => $this->name,
            'usuario_email' => $this->email,
            'usuario_cumple' => $this->birthday,
            'usuario_estatus' => $this->status,
        ];
    }
}
