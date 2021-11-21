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
     * @testdox Create a new user with valid inputs (201)
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

        $response->assertStatus(201)->assertJsonStructure([
            "data" => ["id", "name", "email", "created_at"],
        ]);
    }

    /**
     * @testdox Create a new user with invalid inputs (422)
     * @group Users
     * @return void
     */
    public function test_create_a_new_user_with_invalid_inputs()
    {
        $user = User::factory()->raw([
            "name" => "",
            "email" => "",
            "password" => "",
        ]);

        $response = $this->post($this->route, [
            "name" => $user["name"],
            "email" => $user["email"],
            "password" => "",
        ]);

        $response
            ->assertStatus(422)
            ->assertJsonStructure([
                "title",
                "message",
                "details" => ["name", "email", "password"],
                "data" => ["name", "email", "password"],
            ]);
    }
}
