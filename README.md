**laravel oss**<br>

环境<br>
php8.0+<br>
laravel9.0+<br>
mysql5.7+<br>

安装<br>
`composer require aphly/laravel-oss` <br>
`php artisan vendor:publish --provider="Aphly\LaravelOss\OssServiceProvider"` <br>

OSS需要安装包<br>
或者 `composer require aliyuncs/oss-sdk-php`<br>

/config/filesystems.php 数组 disks 中添加<br>
`'oss' => [
'driver' => 'oss',
'key' => env('OSS_ACCESSKEYID'),
'secret' => env('OSS_ACCESSKEYSECRET'),
'bucket' => env('OSS_BUCKET'),
'endpoint' => env('OSS_ENDPOINT'),
'isCName' => env('OSS_ISCNAME'),
'url' => env('OSS_URL')
],`

.env文件中修改<br>
`FILESYSTEM_DISK=oss` <br>
`OSS_ACCESSKEYID=` <br>
`OSS_ACCESSKEYSECRET=` <br>
`OSS_ENDPOINT=` <br>
`OSS_BUCKET=` <br>
`OSS_ISCNAME=` <br>
`OSS_URL=` <br>

