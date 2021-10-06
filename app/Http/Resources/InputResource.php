<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InputResource extends JsonResource
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
            'type' => 'Input',
            'attributes' => [
                'device_mac' => $this->device_mac,
                'temperature' => $this->temperature,
                'humidity' => $this->humidity,
                'light' => $this->light,
                'temperature_probe' => $this->temperature_probe,
                'water_level' => $this->water_level,
                'ec_probe' => $this->ec_probe,
                'ph_probe' => $this->ph_probe,
                'device_rtc' => $this->device_rtc,
                'crc' => $this->crc,
                'success' => 'Yes',
            ]
        ];
    }
}
