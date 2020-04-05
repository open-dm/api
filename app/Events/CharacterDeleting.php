<?php

namespace App\Events;

use App\Models\Characters\Character;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CharacterDeleting
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $character;

    public function __construct(Character $character)
    {
        $this->character = $character;
    }
}
