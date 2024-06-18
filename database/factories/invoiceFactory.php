<?php


namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;  //importar el customer
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\invoice>
 */
class invoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //estados en los que va a estar
        $status = $this->faker->randomElement(["B","P","V"]);
        return [
            //cando llamemos al seeder a usar los factori pero vamos a crearlos factoris desde los invoices
            'customer_id' => Customer::factory(),
            'amount' => $this->faker->numberBetween(100,20000),
            'status' => $status,
            'billed_dated' => $this->faker->dateTimeThisDecade(),
            'paid_dated' => $status == 'P' ? $this->faker->dateTimeThisDecade() : null


        ];
    }
}
