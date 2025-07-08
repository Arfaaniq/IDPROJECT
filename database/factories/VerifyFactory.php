<?php

namespace Database\Factories;

use App\Models\Verify;
use Illuminate\Database\Eloquent\Factories\Factory;

class VerifyFactory extends Factory
{
    protected $model = Verify::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'nama_lengkap' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'no_hp' => $this->faker->phoneNumber,
            'status' => 'Menunggu',
            'layanan' => 'Desain Rumah,Renovasi',
            'tanggal_temu' => $this->faker->date(),
            'jam_temu' => $this->faker->time(),
            'catatan' => $this->faker->sentence,
        ];
    }
}