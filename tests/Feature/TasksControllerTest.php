<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TasksControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_can_be_visited()
    {
        $this->assertGuest();
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_dashboard_page_can_be_visited()
    {
        /** @var Authenticatable $user */
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/dashboard');

        $this->assertAuthenticatedAs($user);
        $response
            ->assertOk()
            ->assertViewIs('dashboard');

    }

    public function test_possible_to_visit_todo_page()
    {
        /** @var Authenticatable $user */
        $user = User::factory()->create();

        $this->actingAs($user);
        $response = $this->get(route('tasks.index'));
        $response
            ->assertStatus(200)
            ->assertViewIs('pages.todo')
            ->assertViewHas('tasks');
    }

    public function test_possible_to_visit_create_page()
    {
        /** @var Authenticatable $user */
        $user = User::factory()->create();

        $this->actingAs($user);
        $response = $this->get(route('tasks.create'));
        $response
            ->assertStatus(200)
            ->assertViewIs('pages.create');
    }

    public function test_possible_to_visit_edit_page()
    {
        /** @var Authenticatable $user */
        $user = User::factory()->create();
        $task = Task::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('tasks.edit', $task));
        $response
            ->assertStatus(200)
            ->assertViewIs('pages.edit')
            ->assertViewHas('task');
    }

    public function test_possible_to_destroy_task()
    {
        /** @var Authenticatable $user */
        $user = User::factory()->create();
        $task = Task::factory()->create();
        $this->actingAs($user);

        $response = $this->delete(route('tasks.destroy', $task));
        $response
            ->assertStatus(302);
    }

}
