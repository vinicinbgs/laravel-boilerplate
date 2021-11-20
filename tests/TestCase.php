<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

use Tests\Routes;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, Routes;

    /** @var string $route */
    protected $route;
}
