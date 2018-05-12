<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class AuthorEndpointsTest extends TestCase
{

    public function testStoreFailOnMissingLastName()
    {
        $response = $this->call('POST', '/authors', ['name' => 'John']);

        $this->assertEquals(422, $response->status());
    }

    public function testStoreFailOnMissingName()
    {
        $response = $this->call('POST', '/authors', ['last_name' => 'Lemon']);

        $this->assertEquals(422, $response->status());
    }
}