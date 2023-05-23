<?php

namespace App\DTOs;

use Illuminate\Database\Eloquent\Collection;

class  JsonResponseDTO
{
    public bool $success = true;
    public string $message;
    public Collection $data;


    public function __construct($data = null)
    {
        if ($data) {
            $this->success = $data['success'];
            $this->message = $data['message'];
            $this->data = $data['data'];
        }
    }
}
