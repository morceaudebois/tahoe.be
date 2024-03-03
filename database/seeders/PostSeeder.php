<?php

namespace Database\Seeders;

use App\Models\Post;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Post::insert([
            [
                'title' => 'My favorite dogs',
                'excerpt' => 'Create a list of your favorite dog breeds and share it with your friends.',
                'tags' => '2022|dogs|php',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus molestie arcu id fermentum. Sed ultrices iaculis ex at interdum. Integer aliquet dapibus dignissim. Donec elementum efficitur nunc in iaculis. Morbi pretium gravida interdum. Phasellus tempus gravida velit, quis porta nisi laoreet a. Duis et leo sed nunc suscipit vulputate nec quis felis. Donec justo enim, ullamcorper non tempor id, condimentum at leo. Fusce suscipit, nulla vitae semper posuere, tellus est commodo neque, nec hendrerit libero purus sed odio.

                Aliquam aliquam convallis enim, congue tincidunt justo laoreet auctor. Nullam porttitor euismod dolor ut porta. Sed dictum purus gravida vehicula ultricies. Cras mauris leo, accumsan at purus id, finibus auctor diam. Vestibulum lobortis libero vitae mi feugiat, ut gravida tortor congue. Aliquam erat volutpat.'
            ],
            [
                'title' => 'Another post',
                'excerpt' => 'Create a list of your favorite dog breeds and share it with your friends.',
                'tags' => '2021|other|javascript',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus molestie arcu id fermentum. Sed ultrices iaculis ex at interdum. Integer aliquet dapibus dignissim. Donec elementum efficitur nunc in iaculis. Morbi pretium gravida interdum. Phasellus tempus gravida velit, quis porta nisi laoreet a. Duis et leo sed nunc suscipit vulputate nec quis felis. Donec justo enim, ullamcorper non tempor id, condimentum at leo. Fusce suscipit, nulla vitae semper posuere, tellus est commodo neque, nec hendrerit libero purus sed odio.

                Aliquam aliquam convallis enim, congue tincidunt justo laoreet auctor. Nullam porttitor euismod dolor ut porta. Sed dictum purus gravida vehicula ultricies. Cras mauris leo, accumsan at purus id, finibus auctor diam. Vestibulum lobortis libero vitae mi feugiat, ut gravida tortor congue. Aliquam erat volutpat.'
            ],
            [
                'title' => 'Wow that\'s a third post',
                'excerpt' => 'Create a list of your favorite dog breeds and share it with your friends.',
                'tags' => '2023|tag|wow',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus molestie arcu id fermentum. Sed ultrices iaculis ex at interdum. Integer aliquet dapibus dignissim. Donec elementum efficitur nunc in iaculis. Morbi pretium gravida interdum. Phasellus tempus gravida velit, quis porta nisi laoreet a. Duis et leo sed nunc suscipit vulputate nec quis felis. Donec justo enim, ullamcorper non tempor id, condimentum at leo. Fusce suscipit, nulla vitae semper posuere, tellus est commodo neque, nec hendrerit libero purus sed odio.

                Aliquam aliquam convallis enim, congue tincidunt justo laoreet auctor. Nullam porttitor euismod dolor ut porta. Sed dictum purus gravida vehicula ultricies. Cras mauris leo, accumsan at purus id, finibus auctor diam. Vestibulum lobortis libero vitae mi feugiat, ut gravida tortor congue. Aliquam erat volutpat.'
            ],
            [
                'title' => 'And a fourth',
                'excerpt' => 'Create a list of your favorite dog breeds and share it with your friends.',
                'tags' => '2023|tag|wow',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus molestie arcu id fermentum. Sed ultrices iaculis ex at interdum. Integer aliquet dapibus dignissim. Donec elementum efficitur nunc in iaculis. Morbi pretium gravida interdum. Phasellus tempus gravida velit, quis porta nisi laoreet a. Duis et leo sed nunc suscipit vulputate nec quis felis. Donec justo enim, ullamcorper non tempor id, condimentum at leo. Fusce suscipit, nulla vitae semper posuere, tellus est commodo neque, nec hendrerit libero purus sed odio.

                Aliquam aliquam convallis enim, congue tincidunt justo laoreet auctor. Nullam porttitor euismod dolor ut porta. Sed dictum purus gravida vehicula ultricies. Cras mauris leo, accumsan at purus id, finibus auctor diam. Vestibulum lobortis libero vitae mi feugiat, ut gravida tortor congue. Aliquam erat volutpat.'
            ]
        ]);
    }
}
