<?php

namespace Database\Seeders;

use App\Models\Staff;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'password' => bcrypt('asdfasdf'),
            'photo' => '',
            'ic' => '010101010101',
            'gender' => 'male',
            'religion' => 'islam',
            'race' => 'malay',
            'address' => 'Universiti Malaysia Pahang',
            'city' => 'Pekan',
            'state' => 'Pahang',
            'postcode' => '26600',
            'phoneNo' => '0100000000',
            'role' => 'staff',
            'age' => 23,
            'dob' => '2001-01-01'
        ])->staff()->create();

        User::factory()->create([
            'name' => 'Mentor',
            'email' => 'mentor@gmail.com',
            'password' => bcrypt('asdfasdf'),
            'photo' => '',
            'ic' => '020202020202',
            'gender' => 'female',
            'religion' => 'christianity',
            'race' => 'chinese',
            'address' => 'Universiti Malaysia Pahang',
            'city' => 'Pekan',
            'state' => 'Pahang',
            'postcode' => '26600',
            'phoneNo' => '0111111111',
            'role' => 'mentor',
            'age' => 22,
            'dob' => '2002-02-02'
        ]);

        // User::factory()->create([
        //     'name' => 'CRMP 1',
        //     'email' => 'crmp1@gmail.com',
        //     'password' => bcrypt('asdfasdf'),
        //     'photo' => '',
        //     'ic' => '030303030303',
        //     'gender' => 'male',
        //     'religion' => 'buddhism',
        //     'race' => 'chinese',
        //     'address' => 'Universiti Malaysia Pahang',
        //     'city' => 'Pekan',
        //     'state' => 'Pahang',
        //     'postcode' => '26600',
        //     'phoneNo' => '0122222222',
        //     'role' => 'crmp',
        //     'age' => 21,
        //     'dob' => '2003-03-03'
        // ])->platinum()->create([
        //     'educationLevel' => 'Phd',
        //     'educationField' => 'Computer Science',
        //     'educationInstitute' => 'Universiti Malaysia Pahang',
        //     'package' => 'drjr',
        //     'staff_id' => 1
        // ])->crmp()->create();

        // User::factory()->create([
        //     'name' => 'CRMP 2',
        //     'email' => 'crmp2@gmail.com',
        //     'password' => bcrypt('asdfasdf'),
        //     'photo' => '',
        //     'ic' => '040404040404',
        //     'gender' => 'female',
        //     'religion' => 'hinduism',
        //     'race' => 'indian',
        //     'address' => 'Universiti Malaysia Pahang',
        //     'city' => 'Pekan',
        //     'state' => 'Pahang',
        //     'postcode' => '26600',
        //     'phoneNo' => '0133333333',
        //     'role' => 'crmp',
        //     'age' => 20,
        //     'dob' => '2004-04-04'
        // ])->platinum()->create([
        //     'educationLevel' => 'Masters',
        //     'educationField' => 'Computer Science',
        //     'educationInstitute' => 'Universiti Malaysia Pahang',
        //     'package' => 'drjr',
        //     'staff_id' => 1
        // ])->crmp()->create();

        // User::factory()->create([
        //     'name' => 'Platinum 1',
        //     'email' => 'platinum1@gmail.com',
        //     'password' => bcrypt('asdfasdf'),
        //     'photo' => '',
        //     'ic' => '050505050505',
        //     'gender' => 'male',
        //     'religion' => 'other',
        //     'race' => 'other',
        //     'address' => 'Universiti Malaysia Pahang',
        //     'city' => 'Pekan',
        //     'state' => 'Pahang',
        //     'postcode' => '26600',
        //     'phoneNo' => '0144444444',
        //     'role' => 'platinum',
        //     'age' => 19,
        //     'dob' => '2005-05-05'
        // ])->platinum()->create([
        //     'educationLevel' => 'Bachelor Degree',
        //     'educationField' => 'Computer Science',
        //     'educationInstitute' => 'Universiti Malaysia Pahang',
        //     'package' => 'professorship',
        //     'staff_id' => 1
        // ])->supervision()->create([
        //     'crmp_id' => 1
        // ]);
    }
}