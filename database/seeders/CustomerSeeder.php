<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//importar el modelo de customer
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //para ejecutar
        Customer::factory()
        ->count(25) //los customer --clientes
        ->hasInvoices(10) //las invoices -pueden tener o no tener
        ->create(); //crear

        Customer::factory()
        ->count(100)
        ->hasInvoices(3)
        ->create();

        Customer::factory()
        ->count(100)
        ->hasInvoices(1) 
        ->create();

        Customer::factory()
        ->count(100)
        ->create();

    }
}
