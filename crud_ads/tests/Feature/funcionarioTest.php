<?php

namespace Tests\Feature;

use App\Models\Funcionarios;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FuncionarioTeste extends TestCase
{
    use RefreshDatabase;
    public function test_admin_can_store_new_product()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $response = $this->actingAs($admin)->post('/funcionarios', [
            'nome' => 'Apple',
            'email' => 'Fruit',
            'listas_funcionarios' => 5
        ]);
        // dd($response->getContent());
        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/livros');
        $this->assertCount(1, Funcionarios::all());
        $this->assertDatabaseHas('funcionarios', ['nome' => 'Apple', 'email' => 'Fruit', 'listas_funcionarios' => 5]);
    }

     public function test_admin_can_see_the_edit_product_page()
    {
         $admin = User::factory()->create(['is_admin' => 1]);
         $product = Funcionarios::factory()->create();
         $response = $this->actingAs($admin)->get('/funcionarios/' . $product->id . '/edit');
         $response->assertStatus(200);
         $response->assertSee($product->name);
     }

     public function test_admin_can_update_product()
     {
         $admin = User::factory()->create(['is_admin' => 1]);
         Funcionarios::factory()->create();
         $this->assertCount(1, Funcionarios::all());
         $product = Funcionarios::first();
         $response = $this->actingAs($admin)->put('/funcionarios/' . $product->id, [
             'nome'  => 'Updated Product',
             'email' => 'Test',
             'listas_funcionarios' => 5
         ]);
         $response->assertSessionHasNoErrors();
         $response->assertRedirect('/funcionarios');
         $this->assertEquals('Updated Product', Funcionarios::first()->name);
         $this->assertEquals('Test', Funcionarios::first()->email);
        $this->assertEquals(5, Funcionarios::first()->listas_funcionarios);
     }

     public function test_admin_can_delete_product()
     {
        $admin = User::factory()->create(['is_admin' => 1]);
        $product =  Funcionarios::factory()->create();
        $this->assertEquals(1, Funcionarios::count());
         $response = $this->actingAs($admin)->delete('/funcionarios/' . $product->id);
         $response->assertStatus(302);
         $this->assertEquals(0, Funcionarios::count());
     }
}