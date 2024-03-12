<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Registration\Founder;
use App\Models\Registration\Investor;
use App\Models\Registration\Professional;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Determine the user type and create a user instance
        $userType = $this->faker->randomElement(['founder', 'investor', 'professional']);
        $user = null;

        switch ($userType) {
            case 'founder':
                $user = Founder::factory()->create();
                break;
            case 'investor':
                $user = Investor::factory()->create();
                break;
            case 'professional':
                $user = Professional::factory()->create();
                break;
        }

        return [
            'user_type' => $userType,
            'user_id' => $user->id,
            'external_ref' => $this->faker->uuid,
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'status' => $this->faker->randomElement(['pending', 'completed', 'failed']),
        ];
    }
}
