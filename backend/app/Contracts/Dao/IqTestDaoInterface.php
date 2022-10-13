<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for quiz
 */
interface IqTestDaoInterface
{
    /**
     * To get iqtest
     * 
     * @return array response content
     */
    public function getIqTest();

    /**
     * To save iqtest
     * 
     * @return array response content
     */
    public function saveIqTest($request);
}