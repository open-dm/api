<?php

namespace App\Listeners;

class DeleteCharacterRelations
{
    public function handle($event)
    {
        $character = $event->character;

        $character->languages()->detach();
        $character->items()->detach();
        $character->senses()->detach();
        $character->environments()->detach();

        $character->abilities()->delete();
        $character->skills()->delete();
        $character->actions()->delete();
    }
}
