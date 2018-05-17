<?php

use Laravel\Lumen\Testing\DatabaseTransactions;
use Laravel\Lumen\Testing\DatabaseMigrations;


class AuthorEndpointsTest extends TestCase
{

    use DatabaseMigrations;

    public function testStoreFailsOnMissingName()
    {

        $this->post('/authors', ['name' => 'John']);
        $this->seeStatusCode(422);
        $this->seeJsonEquals([
            'last_name' => ['The last name field is required.']
        ]);
    }

    public function testStoreFailsOnMissingLastName()
    {

        $this->post('/authors', ['last_name' => 'Lemon']);
        $this->seeStatusCode(422);
        $this->seeJsonEquals([
            'name' => ['The name field is required.']
        ]);
    }

    public function testStoreFailsOnDuplicate()
    {

        factory('App\Author')->create([
            'name' => 'John',
            'last_name' => 'Lemon'
        ]);

        $this->post('/authors', ['name' => 'John', 'last_name' => 'Lemon']);
        $this->seeStatusCode(409);
        $this->seeJsonEquals([
            'name' => ['The name and last name are duplicate.'],
            'last_name' => ['The name and last name are duplicate.']
        ]);

    }

    public function testStoreSuccess()
    {

        $this->post('/authors', ['name' => 'John', 'last_name' => 'Lemon']);

        $this->seeStatusCode(200);
        $this->seeJsonStructure(['id']);
        $this->seeInDatabase('authors', [
            'name' => 'John',
            'last_name' => 'Lemon'
        ]);
    }
}
