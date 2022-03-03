<?php

namespace Tests;
namespace Shetabit\Payment\Tests;


use Shetabit\Payment\Tests\Mocks\Drivers\BarDriver;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}
