<?php

namespace Database\Seeders;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil user atau buat dummy jika kosong
        $users = User::count()
            ? User::all()
            : User::factory()->count(5)->create();

        // Buat 10 thread
        Thread::factory()
            ->count(10)
            ->make()
            ->each(function ($thread) use ($users) {

                $author = $users->random();

                $thread->user_id = $author->id;
                $thread->slug = Str::slug($thread->title) . '-' . rand(100, 999);
                $thread->save();

                // Setiap thread punya 2–6 balasan
                Reply::factory()
                    ->count(rand(2, 6))
                    ->make()
                    ->each(function ($reply) use ($thread, $users) {
                        $reply->thread_id = $thread->id;
                        $reply->user_id = $users->random()->id;
                        $reply->save();
                    });
            });
    }
}
