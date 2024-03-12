<?php

namespace Database\Factories\Registration;

use App\Models\Registration\Founder;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Registration\FounderDetail;
use App\Enums\BusinessType;
use App\Enums\FinancialLevel;
use App\Enums\FocusAreas;
use App\Enums\FundingStatus;
use App\Enums\PartneringOption;

class FounderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Founder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'otp' => $this->faker->randomNumber(5),
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Founder $founder) {
            $founderDetail = new FounderDetail([
                'company_name' => $this->faker->company,
                'business_type' => $this->faker->randomElement(BusinessType::class),
                'financial_level' => $this->faker->randomElement(FinancialLevel::class),
                'focus_area' => $this->faker->randomElement(FocusAreas::class),
                'challenges' => $this->faker->sentence,
                'funding_status' => $this->faker->randomElement(FundingStatus::class),
                'partnership' => $this->faker->randomElement(PartneringOption::class),
                'community_support' => $this->faker->boolean,
            ]);

            $founder->detail()->save($founderDetail);
        });
    }
}
