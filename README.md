**laravel oss**<br>

环境<br>
php8.1+<br>
laravel10.0+<br>
mysql5.7+<br>

安装<br>
`composer require aphly/laravel-oss` <br>
`php artisan vendor:publish --provider="Aphly\LaravelOss\OssServiceProvider"` <br>

OSS需要安装包<br>
`composer require aliyuncs/oss-sdk-php`<br>

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
`FILESYSTEM_DISK=oss
OSS_ACCESSKEYID=
OSS_ACCESSKEYSECRET=
OSS_ENDPOINT=
OSS_BUCKET=
OSS_ISCNAME=
OSS_URL=` cname 域名<br> 

OSS_ISCNAME 为true时，OSS_ENDPOINT 请填写自定义域名（比如：img.apixn.com），OSS_URL是http开头的自定义域名（比如：http：//img.apixn.com）

