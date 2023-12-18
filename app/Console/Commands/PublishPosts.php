<?php

namespace App\Console\Commands;

use App\Events\PostPublished;
use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class PublishPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:publish-posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = 0;
        $posts = Post::where('publiched', false)->get();
        if (!$posts->isEmpty()){
            $currentDateTime = Carbon::now();

            foreach ($posts as $post){                
                $publishedAt = $post->publiched_at;
                if ($currentDateTime->greaterThanOrEqualTo($publishedAt)){
                    $post->publiched = true;
                    $post->save();
                    $count += 1;
                    event(new PostPublished($post));
                }
            }       
            
        }
        if ($count > 0){
            $this->info('Posts published '. $count);
        } else {
            $this->info('No unpublished posts found');
        }
    }
}
