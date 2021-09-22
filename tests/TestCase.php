<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

/**
 * Class TestCase.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    private $route = null;
    private $model = null;

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('db:seed');
    }

}
