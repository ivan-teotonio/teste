<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Company;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test company creation.
     *
     * @return void
     */
    public function testCreateCompany()
    {
        $response = $this->post('/companies', [
            'name' => 'Nome teste',
            'email' => 'nome@example.com',
            'address' => 'rua teste 123',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('companies', [
            'name' => 'Nome teste',
            'email' => 'nome@example.com',
            'address' => 'rua teste 123',
        ]);
    }
}
