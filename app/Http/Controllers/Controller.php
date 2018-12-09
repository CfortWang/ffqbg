<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected static $httpOK = 200;                 // 언제 쓰는가?
    protected static $httpCreated = 201;            // 언제 쓰는가?
    protected static $httpAccepted = 202;           // 언제 쓰는가?
    protected static $httpNoContent = 204;          // 언제 쓰는가?

    protected static $httpBadRequest = 400;         // 언제 쓰는가?
    protected static $httpUnauthorized = 401;       // 언제 쓰는가?
    protected static $httpForbidden = 403;          // 언제 쓰는가?
    protected static $httpNotFound = 404;           // 언제 쓰는가?
    protected static $httpMethodNotAllowed = 405;   // 언제 쓰는가?
    protected static $httpTimeOut = 408;            // 언제 쓰는가?
    protected static $httpConflict = 409;           // 언제 쓰는가?
    protected static $httpGone = 410;               // 언제 쓰는가?

    protected static $httpServerError = 500;        // 언제 쓰는가?

    protected function responseOK($msg, $data = null)
    {
        return response()->json([
            'status'    => static::$httpOK,
            'message'   => $msg,
            'data'      => $data,
        ], static::$httpOK, [], JSON_UNESCAPED_UNICODE);
    }

    protected function responseUnauthorized($msg, $paramCode = null, $data = null)
    {
        $code = empty($paramCode) ? static::$httpUnauthorized : $paramCode;
        return response()->json([
            'status'    => $code,
            'message'   => $msg,
            'data'      => $data,
        ], static::$httpUnauthorized, [], JSON_UNESCAPED_UNICODE);
    }

    protected function responseBadRequest($msg, $paramCode = null, $data = null)
    {
        $code = empty($paramCode) ? static::$httpBadRequest : $paramCode;
        return response()->json([
            'status'    => $code,
            'message'   => $msg,
            'data'      => $data,
        ], static::$httpBadRequest, [], JSON_UNESCAPED_UNICODE);
    }

    protected function responseNotFound($msg, $paramCode = null, $data = null)
    {
        $code = empty($paramCode) ? static::$httpNotFound : $paramCode;
        return response()->json([
            'status'    => $code,
            'message'   => $msg,
            'data'      => $data,
        ], static::$httpNotFound, [], JSON_UNESCAPED_UNICODE);
    }

    protected function responseTimeOut($msg, $paramCode = null, $data = null)
    {
        $code = empty($paramCode) ? static::$httpTimeOut : $paramCode;
        return response()->json([
            'status'    => $code,
            'message'   => $msg,
            'data'      => $data,
        ], static::$httpTimeOut, [], JSON_UNESCAPED_UNICODE);
    }

    protected function responseConflict($msg, $paramCode = null, $data = null)
    {
        $code = empty($paramCode) ? static::$httpConflict : $paramCode;
        return response()->json([
            'status'    => $code,
            'message'   => $msg,
            'data'      => $data,
        ], static::$httpConflict, [], JSON_UNESCAPED_UNICODE);
    }

    protected function responseGone($msg, $paramCode = null, $data = null)
    {
        $code = empty($paramCode) ? static::$httpGone : $paramCode;
        return response()->json([
            'status'    => $code,
            'message'   => $msg,
            'data'      => $data,
        ], static::$httpGone, [], JSON_UNESCAPED_UNICODE);
    }

    protected function responseServerError($msg, $paramCode = null, $data = null)
    {
        $code = empty($paramCode) ? static::$httpServerError : $paramCode;
        return response()->json([
            'status'    => $code,
            'message'   => $msg,
            'data'      => $data,
        ], static::$httpServerError, [], JSON_UNESCAPED_UNICODE);
    }

    protected function response4List($data)
    {
        $totalCnt = count($data);

        if ($totalCnt == 0) {
            return $this->responseOK('목록이 존재하지 않습니다.', [
                'total_cnt' => $totalCnt,
                'data'      => $data,
            ]);
        } else {
            return $this->responseOK('전체 목록을 조회합니다.', [
                'total_cnt' => $totalCnt,
                'data'      => $data,
            ]);
        }
    }

    protected function response4DataTables($items, $recordsTotal, $recordsFiltered)
    {
        $totalCnt = count($items);

        if ($totalCnt == 0 || $recordsTotal === 0) {
            return $this->responseOK('목록이 존재하지 않습니다.',[
                'data'              => $items,
                'recordsTotal'      => $recordsTotal,
                'recordsFiltered'   => $recordsFiltered,
            ]);
        } else {
            return $this->responseOK('목록을 조회합니다.', [
                'data'              => $items,
                'recordsTotal'      => $recordsTotal,
                'recordsFiltered'   => $recordsFiltered,
            ]);
        }
    }

}
