<?php

namespace App\Dao;

use App\Contracts\Dao\IqTestDaoInterface;
use App\Models\IqTest;
use App\Models\Record;
use Illuminate\Support\Facades\DB;

/**
 * Data Access
 */
class IqTestDao implements IqTestDaoInterface
{
    /**
     * To get iqtest
     * 
     * @return array response content
     */
    public function getIqTest()
    {
        $iq_tests = IqTest::getTree();
        $records = Record::all();

        foreach ($records as $key => $value) {
            $records[$key]['details_answer'] = DB::table('iq_tests')->whereIn('id', explode(',', $value['answer']))->get();
        }

        return ['iq_tests' => $iq_tests, 'records' => $records];

        // return $iq_tests;
    }

    /**
     * To save iqtest
     * 
     * @return array response content
     */
    public function saveIqTest($request)
    {
        $ans = new Record;
        $ans->answer = $request->answer;
        $ans->save();
        return $ans;
    }
}
