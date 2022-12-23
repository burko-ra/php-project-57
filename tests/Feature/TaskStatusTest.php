<?php

namespace Tests\Feature;

use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskStatusTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var array<string, mixed>
     */
    private $data;
    private User $user;
    private TaskStatus $taskStatus;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->data = TaskStatus::factory()->make()->only('name');
        $this->taskStatus = TaskStatus::factory()->create();
    }

    public function testGuestCanViewTaskStatusList(): void
    {
        $response = $this->get(route('task_statuses.index'));
        $response->assertOk();
    }

    public function testGuestCannotCreateTaskStatuses(): void
    {
        $response = $this->get(route('task_statuses.create'));
        $response->assertStatus(403);
    }

    public function testGuestCannotStoreTaskStatuses(): void
    {
        $response = $this->post(route('task_statuses.store'), $this->data);
        $response->assertStatus(403);
    }

    public function testGuestCannotEditTaskStatuses(): void
    {
        $response = $this->get(route('task_statuses.edit', [$this->taskStatus]));
        $response->assertStatus(403);
    }

    public function testGuestCannotUpdateTaskStatuses(): void
    {
        $response = $this->patch(route('task_statuses.update', [$this->taskStatus]), $this->data);
        $response->assertStatus(403);
    }

    public function testGuestCannotDestroyTaskStatuses(): void
    {
        $response = $this->delete(route('task_statuses.create', [$this->taskStatus]));
        $response->assertStatus(403);
    }

    public function testUserCanCreateTaskStatuses(): void
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('task_statuses.create'));
        $response->assertOk();
    }

    public function testUserCanStoreTaskStatuses(): void
    {
        $response = $this
            ->actingAs($this->user)
            ->post(route('task_statuses.store'), $this->data);
        $response->assertRedirect(route('task_statuses.index'));
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('task_statuses', $this->data);
    }

    public function testUserCanEditTaskStatuses(): void
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('task_statuses.edit', [$this->taskStatus]));
        $response->assertOk();
    }

    public function testUserCanUpdateTaskStatuses(): void
    {
        $response = $this
            ->actingAs($this->user)
            ->patch(route('task_statuses.update', [$this->taskStatus]), $this->data);
        $response->assertRedirect(route('task_statuses.index'));
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('task_statuses', $this->data);
    }

    public function testUserCanDestroyTaskStatuses(): void
    {
        $response = $this
            ->actingAs($this->user)
            ->delete(route('task_statuses.update', [$this->taskStatus]));
        $response->assertRedirect(route('task_statuses.index'));
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseMissing('task_statuses', $this->taskStatus->only('id'));
    }
}
