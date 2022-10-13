<?php
namespace App\Models;

use Franzose\ClosureTable\Models\Entity;

class IqTest extends Entity
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'iq_tests';

    /**
     * ClosureTable model instance.
     *
     * @var \App\Models\IqTestClosure
     */
    protected $closure = 'App\Models\IqTestClosure';
}
