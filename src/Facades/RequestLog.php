<?php
namespace Qnn\RequstLog\Facades;
use Illuminate\Support\Facades\Facade;
class RequestLog extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'RequestLog';
	}
}