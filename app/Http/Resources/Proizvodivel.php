<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Proizvodivel extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'naziv' => $this->naziv,
            'opis' => $this->opis,
            'slika' => $this->slika,
            'vrsta_id' => $this->vrsta_id,
            'cena_jedan' => $this->cena_jedan,
            'cena_paket' => $this->cena_paket,
            'cena_jedan_sniz' => $this->cena_jedan_sniz,
            'cena_paket_sniz' => $this->cena_paket_sniz,
            'kategorija_id' => $this->kategorija_id,
            'podkategorija_id' => $this->podkategorija_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
