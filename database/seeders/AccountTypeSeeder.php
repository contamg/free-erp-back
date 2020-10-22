<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AccountType;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account_types = collect([
            'Expenses',
            'To Charge',
            'To Pay',
            'Bank and Box',
            'Credit Card',
            'Current Assets',
            'Fixed Assets',
            'Current Liabilities',
            'No Current Liabilities',
            'Capital',
            'Profits',
            'Profits',
            'Other incomes',
            'Incomes',
            'Depreciation',
            'Sales Cost',
        ]);

        $account_types->each(function($item) {
            AccountType::create(['name' => $item]);
        });
    }
}
