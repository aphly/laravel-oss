<?php

namespace Aphly\LaravelOss;

use Aphly\Laravel\Providers\ServiceProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Filesystem\FilesystemAdapter;
use League\Flysystem\Filesystem;


class OssServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('oss', function(Application $app, array $config){
            $accessId  = $config['key'];
            $accessKey = $config['secret'];
            $endPoint  = $config['endpoint'];
            $bucket    = $config['bucket'];
            $isCname   = $config['isCName']=='true';
            $url    = $config['url'];
            $adapter = new OssAdapter($accessId, $accessKey, $endPoint,$isCname,$bucket,$url);
            return new FilesystemAdapter(
                new Filesystem($adapter, $config),
                $adapter,
                $config
            );
        });


    }

}
