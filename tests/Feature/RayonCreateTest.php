<?php

namespace Tests\Feature;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class RayonCreateTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config([
            'database.default' => 'sqlite',
            'database.connections.sqlite.database' => ':memory:',
        ]);
        DB::purge('sqlite');

        Schema::connection('sqlite')->create('rayons', function (Blueprint $table): void {
            $table->id();
            $table->string('nama_rayon');
            $table->timestamps();
        });
    }

    public function test_index_form_creates_a_rayon_in_the_database(): void
    {
        $this->get(route('rayons.index'))
            ->assertOk()
            ->assertSee('createRayonModal')
            ->assertSee('name="nama_rayon"', false);

        $this->post(route('rayons.store'), [
            'nama_rayon' => 'Cicurug 1',
        ])
            ->assertRedirect(route('rayons.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('rayons', [
            'nama_rayon' => 'Cicurug 1',
        ]);
    }
}
