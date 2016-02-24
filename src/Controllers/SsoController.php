<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use TaixuDayDayUp\Ssoclient\SsoClient;

class SsoController extends Controller
{
    /**
     * ajax返回统一格式
     *
     * @return \Illuminate\Http\Response
     */
    private function result($status, $message = '', $data = [])
    {
        $response =  response()->json([
            'status'  => $status,
            'message' => $message,
            'data'    => $data
        ]);

        $callback = \Request::input('callback');

        if(!empty($callback))
            $response = $response->setCallback(Input::get('callback'));

        return $response;
    }

    /**
     *
    **/
    public function checkSync()
    {
        $ssoClient = new SsoClient;

        if(! $ssoClient->isSync()) {
            $getRedisKeyUrl = \Config::get('sso')['server']['getRedisKeyUrl'];

            return $this->result(false, '还没同步', ['url' => $getRedisKeyUrl]);
        } else {
            $user = $ssoClient->getUser();

            return $this->result($user ? true : false);
        }
    }

    /**
     *
    **/
    public function handelSyncToken(Request $request)
    {
        $token = $request->get('token');

        $result = (new SsoClient)->saveRedisKey($token);

        return $this->result($result);
    }
}
