<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp()
    {
        parent::setUp();

        DB::beginTransaction();
    }

    public function tearDown()
    {
        DB::rollBack();

        parent::tearDown();
    }
}
