<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'type' => 'Recipe',
            'attributes' => [
                'device_mac' => $this->device_mac,
                'user_id' => $this->user_id,
                'recipe_name' => $this->recipe_name,
                'fog1_duration' => $this->fog1_duration,
                'fog1_on_minutes' => $this->fog1_on_minutes,
                'fog1_off_minutes' => $this->fog1_off_minutes,
                'fog1_start_time' => $this->fog1_start_time,
                'for1_end_time' => $this->for1_end_time,
                'fog2_duration' => $this->fog2_duration,
                'fog2_on_minutes' => $this->fog2_on_minutes,
                'fog2_off_minutes' => $this->fog2_off_minutes,
                'fog2_start_time' => $this->fog2_start_time,
                'fog2_end_time' => $this->fog2_end_time,
                'light1_red' => $this->light1_red,
                'light1_blue' => $this->light1_blue,
                'light1_green' => $this->light1_green,
                'light1_white' => $this->light1_white,
                'light1_bright' => $this->light1_bright,
                'light1_start_time' => $this->light1_start_time,
                'light1_end_time' => $this->light1_end_time,
                'light2_red' => $this->light2_red,
                'light2_blue' => $this->light2_blue,
                'light2_green' => $this->light2_green,
                'light2_white' => $this->light2_white,
                'light2_bright' => $this->light2_bright,
                'light2_start_time' => $this->light2_start_time,
                'light2_end_time' => $this->light2_end_time,
                'humidity' => $this->humidity,
                'device_rtc' => $this->device_rtc,
                'default' => $this->default,
                'status' => $this->status,
                'success' => 'Yes',
            ]
        ];
    }
}
