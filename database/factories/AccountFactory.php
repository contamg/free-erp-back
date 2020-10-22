<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\AccountType;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $accountTypeIds = AccountType::all()->pluck('id');

        return [
            'code' => $this->faker->regexify('(\d{2}\.){2,3}\d{2}'),
            'name' => $this->faker->text(20),
            'balance' => $this->faker->randomNumber($nbDigits = 5, $strict = false),
            'account_type_id' => $this->faker->randomElement($accountTypeIds),
        ];
    }
}
