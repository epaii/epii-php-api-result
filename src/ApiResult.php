<?php

namespace epii\api\result;

/**
 * Created by PhpStorm.
 * User: mrren
 * Date: 2018/11/30
 * Time: 1:38 PM
 */
class ApiResult
{


    private $data;


    public function __construct($stringOrdata)
    {
        if (is_array($stringOrdata))
            $this->data = $stringOrdata;
        else
            $this->data = json_decode($stringOrdata, true);
    }

    public function isSuccess($code_value = 1)
    {
        return $this->data["code"] == $code_value;
    }

    public function getMsg()
    {
        return $this->data["msg"];
    }

    public function getCode()
    {
        return $this->data["code"];
    }

    public function getData()
    {

        return $this->data["data"];
    }

    /*
     *
     */
    public function getApiResultData($key)
    {

        return new ApiResult($this->getData()[$key]);
    }

}