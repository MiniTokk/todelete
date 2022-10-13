<?php

namespace App\Services;

use App\Contracts\Dao\IqTestDaoInterface;
use App\Contracts\Services\IqTestServiceInterface;

/**
 * Service class for IqTest
 */
class IqTestService implements IqTestServiceInterface
{
    /**
     * IqTest Dao
     */
    private $IqTestDao;

    /**
     * Class Constructor
     * 
     * @param IqTestDaoInterface
     * @return
     */
    public function __construct(IqTestDaoInterface $IqTestDao)
    {
        $this->IqTestDao = $IqTestDao;
    }

    /**
     * To get IqTest
     * 
     * @return array response content
     */
    public function getIqTest()
    {
        return $this->IqTestDao->getIqTest();
    }

    /**
     * To save IqTest
     * 
     * @return array response content
     */
    public function saveIqTest($request)
    {
        return $this->IqTestDao->saveIqTest($request);
    }
}