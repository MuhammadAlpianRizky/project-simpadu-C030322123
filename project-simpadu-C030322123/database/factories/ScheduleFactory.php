<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => 2,
            'subject_id' => 5,
            'schedule_date' => fake()->dateTime(),
            'schedule_type' => 'online',
            'hari'=> 'selasa',
            'jam_mulai'=> '12:00',
            'jam_selesai'=> '14:00',
            'ruangan'=> 'Lab.Rekayasa Komputer',
            'kode_absensi'=> '17',
            'tahun_akademik'=> '2022',
            'semester'=> '3',
            'created_by'=> 'Alpian',
            'update_by'=> 'Alpian',
            'delete_by'=> 'Alpian',

            

        ];
    }
}
