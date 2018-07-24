<?php
namespace Modules\Suscriptions\Events;

use Modules\Core\Contracts\EntityIsChanging;
use Modules\Core\Events\AbstractEntityHook;

class ProductIsCreating extends AbstractEntityHook implements EntityIsChanging
{

}