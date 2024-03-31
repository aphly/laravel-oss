<?php

namespace Aphly\LaravelOss\Models;

use Aphly\Laravel\Models\Module as Module_base;

class Module extends Module_base
{
    public $dir = __DIR__;

    public function remoteInstall($module_id){
    }

    public function remoteUninstall($module_id){
    }

}
