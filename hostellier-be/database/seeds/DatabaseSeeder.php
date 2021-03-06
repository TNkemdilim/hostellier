<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void                                                                                                                                             
     */
    public function run()
    {
        $this->call(CourseSeeder::class);
        factory(App\Models\OffCampusRoom::class, 60)->create();
        factory(App\Models\OnCampusRoom::class, 60)->create()->each(
            function ($onCampusRoom) {
                $courseId = App\Models\Course::inRandomOrder()->first()->id;

                App\Models\OnCampusRoomAllowedCourses::create(
                    [
                        'on_campus_room_id' => $onCampusRoom->id,
                        'course_id' => $courseId
                    ]
                );
            }
        );
        $this->call(UserTypeSeeder::class);
        $this->call(AdminSeeder::class);

        // $this->call(UsersTableSeeder::class);
    }
}
