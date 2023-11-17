<?php

namespace Aphly\LaravelOss\Models;

use Aphly\Laravel\Models\Manager;
use Aphly\Laravel\Models\Menu;
use Aphly\Laravel\Models\Module as Module_base;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Module extends Module_base
{
    public $dir = __DIR__;

    public function install($module_id){
        parent::install($module_id);
        return 'install_ok';
    }

    public function uninstall($module_id){
        parent::uninstall($module_id);
        return 'uninstall_ok';
    }


}
