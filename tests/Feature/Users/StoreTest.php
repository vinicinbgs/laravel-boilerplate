<?php

namespace Tests\Feature\Users;

use App\Models\User;

use Tests\TestCase;

class StoreTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->route = parent::getRoute("users");
    }

    /**
     * @testdox Create a new user with valid inputs
     * @group Users
     * @return void
     */
    public function test_create_a_new_user_with_valid_inputs()
    {
        $user = User::factory()->raw();

        $response = $this->post($this->route, [
            "name" => $user["name"],
            "email" => $user["email"],
            "password" => "password",
        ]);

        $response->assertStatus(201);
    }
}
