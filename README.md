# hyid
hidden your id. 隐藏你的ID.

## 使用场景
当我们的应用需要提供一个无状态通过ID获取信息的接口，例如 `GET /user/{id}` ，此类接口只要递增ID进行请求，就可以得到我们数据库中所有公开信息，这很显然不是我们想看到的。
 `hyid` 可以帮助你隐藏我们不希望用户看到的ID字段，或者其他数字字段。
 
## 安装
`composer require 96qby/hyid`

### laravel or lumen
1. 注册服务提供者 : `Qbhy\Hyid\ServiceProvider::class`
2. 发布配置文件(lumen可以自行复制 `config/hyid.php` 或者安装 `vendor:publish` 命令): `php artisan vendor:publish --provider=Qbhy\Hyid\ServiceProvider`


## 使用
```php
class User extends Model{
    use Qbhy\Hyid\HyidAble;
    
    // or 
    public function getUserId($userId){
        return hyid($userId);
    }
    
    // or
    public function toArray(){
        $data = parent::toArray();

        $data['id'] = hyid()->encode($data['id'])
        
        return $data;
    }
}
// decode
    public function userinfo($id){
        return User::query()->findOrFail(hyid()->decode($id))->toArray();
    }
// 非 laravel or lumen 下，可以自行实例化 Hyid 类
$secret = 'qbhy';
$offset = 1996;
$hyid = new Hyid($secret,$offset);

$encodedId = $hyid->encode(1);
$id = $hyid->decode($encodedId);
```

96qbhy@gmail.com  
[qbhy/hyid](https://github.com/qbhy/hyid)
