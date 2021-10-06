<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeviceResource extends JsonResource
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
            'id' => $this->id,
            'type' => 'Device',
            'attributes' => [
                'name' => $this->name,
                'device_mac' => $this->mac_address,
                'user_id' => $this->user_id,
                'status' => $this->status,
                'success' => 'Yes',
            ]
        ];
    }
}
