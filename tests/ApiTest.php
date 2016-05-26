<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Monolog\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('http://kooliprojekt.dev:8000/login')
            ->see('Laravel 5')
            ->dontSee('Rails');
    }
}

