<?php

namespace Database\Seeders;

use App\Domains\Contact\Models\Contact;
use App\Domains\Contact\Models\ContactPhone;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

/**
 * Class ContactSeeder.
 */
class ContactSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->disableForeignKeys();

        $this->truncate('contacts');

        if (app()->environment(['local', 'testing'])) {
            Contact::factory(10)->create()->each(function ($customer) {
                $phones = ContactPhone::factory(2)->make();
                $customer->phones()->saveMany($phones);
            });
        }

        $this->enableForeignKeys();
    }
}
