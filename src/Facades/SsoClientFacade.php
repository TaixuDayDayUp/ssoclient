<?php

namespace TaixuDayDayUp\Ssoclient\Facades;

use Illuminate\Support\Facades\Facade;

class SsoClientFacade extends Facade {

    protected static function getFacadeAccessor() { return 'ssoClient'; }

}