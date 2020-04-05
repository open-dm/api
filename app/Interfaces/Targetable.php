<?
namespace App\Interfaces;

use App\Models\Items\Action;

interface Targetable
{
    public function applyAction(Action $action);
}
