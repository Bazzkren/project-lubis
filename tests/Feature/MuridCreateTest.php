<?php

namespace Tests\Feature;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class MuridCreateTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config([
            'database.default' => 'sqlite',
            'database.connections.sqlite.database' => ':memory:',
        ]);
        DB::purge('sqlite');

        Schema::connection('sqlite')->create('murids', function (Blueprint $table): void {
            $table->id();
            $table->integer('nisn');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('rayon');
            $table->string('rombel');
            $table->string('no_telp');
            $table->timestamps();
        });
    }

    public function test_index_form_creates_a_murid_in_the_database(): void
    {
        $this->get(route('murids.index'))
            ->assertOk()
            ->assertSee('createMuridModal');

        $this->post(route('murids.store'), [
            'nisn' => 12345,
            'nama' => 'Siswa Contoh',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Contoh',
            'rayon' => 'Cicurug 1',
            'rombel' => 'PPLG X-1',
            'no_telp' => '08123456789',
        ])
            ->assertRedirect(route('murids.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('murids', [
            'nisn' => 12345,
            'nama' => 'Siswa Contoh',
            'rombel' => 'PPLG X-1',
        ]);
    }
}
