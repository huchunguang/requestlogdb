# log request info into server db for QNN

## How To Use
1. First, Pls.ensuring you have already installed the Laravel framework,then following the below the commnad <br/>
<pre>
composer require "huchunguang/requestlogdb:4.0"
</pre>

2. After installation,you're able to exectue the artisan's command to publish our configuation into you config folder
<pre>
php artisan vendor:publish
</pre> 
now, you could see a list of provider of vendor,to opt the RequestLog provider to do this,by the way, you could directly use option to determine which provider you would like to publish at this time,as you can see the below sample 
<pre>
php artisan vendor:publish --provider=Qnn\RequestLog\RequestLogProvider
</pre>

3. so far,you already completed the installation,then we just need to use it in your project,for that,you need to configure those keys into your .env conf.<br/>
<strong>request_log_ip</strong><br/>
<strong>request_log_port</strong>

4. you can create a middleware to integrate the library,to refer the logrequestDB configration file,you can see all the fields the logging required, be aware of the type of value,and you could use an array to store the fields,after that,you just need call the method of send by using the Facade of RequestLog,almost like this

```
 $data = array(
            'user_id' => $user_id,
            'user_token' => $token,
            'app_id' => self::$app_id,
            'ud_id' => self::$ud_id,
            'api_name' => self::$api_name,
            'param' => self::$param,
            'request_method' => self::$request_method,
            'status' => self::$status,
            'err_code' => self::$err_code,
            'err_message' => self::$err_message,
            'user_sys' => self::$user_sys,
            'user_phone' => self::$user_phone,
            'user_ip' => self::$user_ip,
            'server_ip' => self::$server_ip,
            'host' => $request->getHost(),
            'end_time' => time(),
            'spend_time' => Dh::microTimeFloat() - self::$star_time
        );
        RequestLog::send($data);
```

## License

The library is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).