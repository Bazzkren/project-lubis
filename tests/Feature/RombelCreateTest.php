<?php

namespace Tests\Feature;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class RombelCreateTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config([
            'database.default' => 'sqlite',
            'database.connections.sqlite.database' => ':memory:',
        ]);
        DB::purge('sqlite');

        Schema::connection('sqlite')->create('rombels', function (Blueprint $table): void {
            $table->id();
            $table->string('nama_rombel');
            $table->timestamps();
        });
    }

    public function test_index_form_creates_a_rombel_in_the_database(): void
    {
        $this->get(route('rombels.index'))
            ->assertOk()
            ->assertSee('createRombelModal')
            ->assertSee('name="nama_rombel"', false);

        $this->post(route('rombels.store'), [
            'nama_rombel' => 'PPLG X-1',
        ])
            ->assertRedirect(route('rombels.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('rombels', [
            'nama_rombel' => 'PPLG X-1',
        ]);
    }
}
