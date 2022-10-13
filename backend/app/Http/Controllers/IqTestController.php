<?php

namespace App\Http\Controllers;

use App\Contracts\Services\IqTestServiceInterface;
use Illuminate\Http\Request;

class IqTestController extends Controller
{
    /**
     * Interface
     */
    private $iq_testService;

    /**
     * Create a new controller instance.
     * 
     * @param IqTestServiceInterface $iq_testServiceInterface
     * @return void
     */
    public function __construct(IqTestServiceInterface $iq_testServiceInterface)
    {
        $this->iq_testService = $iq_testServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->iq_testService->getIqTest();

        return response()->json([
            'iq_tests' => $data['iq_tests'],
            'records' => $data['records']
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->iq_testService->saveIqTest($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
