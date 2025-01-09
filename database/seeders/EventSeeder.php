<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run()
    {

        Event::create([
            'name' => 'Music Festival',
            'image' => 'images/event_1.jpg',
            'price' => 29.99,
            'description' => 'An amazing music festival with popular bands.',
            'location' => 'New York, NY',
        ]);

        Event::create([
            'name' => 'Business Conference',
            'image' => 'images/event_2.jpg',
            'price' => 49.99,
            'description' => 'A conference for business professionals to network and learn.',
            'location' => 'Los Angeles, CA',
        ]);

        Event::create([
            'name' => 'Creative Workshop',
            'image' => 'images/event_3.png',
            'price' => 19.99,
            'description' => 'A workshop to unleash your creative potential with hands-on activities.',
            'location' => 'San Francisco, CA',
        ]);

        Event::create([
            'name' => 'Abstract Painting Class',
            'image' => 'images/event_4.jpg',
            'price' => 24.99,
            'description' => 'Learn the art of abstract painting in this fun and interactive class.',
            'location' => 'Miami, FL',
        ]);

        Event::create([
            'name' => 'Social Media Marketing Workshop',
            'image' => 'images/event_5.jpg',
            'price' => 34.99,
            'description' => 'Master the skills of social media marketing with expert guidance.',
            'location' => 'Chicago, IL',
        ]);

        Event::create([
            'name' => 'Reggae Competition',
            'image' => 'images/event_6.jpg',
            'price' => 15.00,
            'description' => 'Showcase your reggae talents and compete for amazing prizes.',
            'location' => 'Austin, TX',
        ]);

        Event::create([
            'name' => 'Yoga Retreat',
            'image' => 'images/event_7.jpg',
            'price' => 99.99,
            'description' => 'Relax and rejuvenate in a serene environment with guided yoga sessions.',
            'location' => 'Sedona, AZ',
        ]);

        Event::create([
            'name' => 'Culinary Workshop',
            'image' => 'images/event_8.jpg',
            'price' => 39.99,
            'description' => 'Learn to cook delicious dishes from professional chefs.',
            'location' => 'Portland, OR',
        ]);

        Event::create([
            'name' => 'Photography Walk',
            'image' => 'images/event_9.jpg',
            'price' => 14.99,
            'description' => 'Join a group of photography enthusiasts for a scenic photo walk.',
            'location' => 'Vancouver, WA',
        ]);

        Event::create([
            'name' => 'Tech Expo 2025',
            'image' => 'images/event_10.jpg',
            'price' => 59.99,
            'description' => 'Explore the latest innovations in technology at the Tech Expo.',
            'location' => 'Seattle, WA',
        ]);

        Event::create([
            'name' => 'Wine Tasting Event',
            'image' => 'images/event_11.jpg',
            'price' => 44.99,
            'description' => 'Sample a variety of fine wines and learn about their origins.',
            'location' => 'Napa Valley, CA',
        ]);

        Event::create([
            'name' => 'Stand-Up Comedy Night',
            'image' => 'images/event_12.jpg',
            'price' => 20.00,
            'description' => 'Laugh the night away with top comedians performing live.',
            'location' => 'Las Vegas, NV',
        ]);
    }
}
