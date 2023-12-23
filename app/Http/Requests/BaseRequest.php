<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
/**
 * https://learnku.com/laravel/wikis/16069
 * Laravel 响应：永远返回 JSON 响应
 */
class BaseRequest extends Request
{
    public function expectsJson()
    {
        return true;
    }
    public function wantsJson()
    {
        return true;
    }
}
