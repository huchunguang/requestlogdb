<?php
namespace Qnn\RequestLog\Facades;
use Illuminate\Support\Facades\Facade;
class RequestLog extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'RequestLog';
	}
}