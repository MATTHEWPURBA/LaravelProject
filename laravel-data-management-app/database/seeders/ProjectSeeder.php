<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Example data to seed into the project table
        $projects = [
            [
                'project_name' => 'Project Alpha',
                'project_description' => 'Description for Project Alpha.',
                'deadline' => now()->addDays(30), // Deadline 30 days from now
                'created_by' => 1, // Assuming user ID 1
                'updated_by' => 1, // Assuming user ID 1
            ],
        ];

        foreach ($projects as $project) {
            DB::table('projects')->insert($project);
        }
    }
}
