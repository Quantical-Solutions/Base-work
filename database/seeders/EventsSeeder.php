<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date("Y-m-d H:i:s");
        $list = [
            [
                'event_date' => '2020-12-10',
                'event_start' => '18:00:00',
                'event_end' => '21:00:00',
                'title_fr' => 'Le titre de mon event',
                'title_en' => 'My event title',
                'content_fr' => 'Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'content_en' => 'Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'address' => '',
                'address_details' => 'Entréé B',
                'zip' => '33000',
                'city' => 'BORDEAUX',
                'img' => 'Le-titre-de-mon-event.jpg',
                'meta_img' => 'Le-titre-de-mon-event.jpg',
                'meta_title_fr' => 'Test Meta',
                'meta_title_en' => 'Meta test',
                'meta_keywords_fr' => 'test,test2',
                'meta_keywords_en' => 'test,test2',
                'meta_description_fr' => 'Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'meta_description_en' => 'Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'event_date' => '2020-12-14',
                'event_start' => '18:00:00',
                'event_end' => '21:00:00',
                'title_fr' => 'Le titre de mon event 2',
                'title_en' => 'My event title 2',
                'content_fr' => 'Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'content_en' => 'Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'address' => '',
                'address_details' => 'Entréé B',
                'zip' => '33000',
                'city' => 'BORDEAUX',
                'img' => 'Le-titre-de-mon-event.jpg',
                'meta_img' => 'Le-titre-de-mon-event.jpg',
                'meta_title_fr' => 'Test Meta',
                'meta_title_en' => 'Meta test',
                'meta_keywords_fr' => 'test,test2',
                'meta_keywords_en' => 'test,test2',
                'meta_description_fr' => 'Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'meta_description_en' => 'Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'event_date' => '2020-12-18',
                'event_start' => '18:00:00',
                'event_end' => '21:00:00',
                'title_fr' => 'Le titre de mon event 3',
                'title_en' => 'My event title 3',
                'content_fr' => 'Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'content_en' => 'Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'address' => '',
                'address_details' => 'Entréé B',
                'zip' => '33000',
                'city' => 'BORDEAUX',
                'img' => 'Le-titre-de-mon-event.jpg',
                'meta_img' => 'Le-titre-de-mon-event.jpg',
                'meta_title_fr' => 'Test Meta',
                'meta_title_en' => 'Meta test',
                'meta_keywords_fr' => 'test,test2',
                'meta_keywords_en' => 'test,test2',
                'meta_description_fr' => 'Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'meta_description_en' => 'Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'event_date' => '2020-12-19',
                'event_start' => '18:00:00',
                'event_end' => '21:00:00',
                'title_fr' => 'Le titre de mon event 4',
                'title_en' => 'My event title 4',
                'content_fr' => 'Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'content_en' => 'Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'address' => '',
                'address_details' => 'Entréé B',
                'zip' => '33000',
                'city' => 'BORDEAUX',
                'img' => 'Le-titre-de-mon-event.jpg',
                'meta_img' => 'Le-titre-de-mon-event.jpg',
                'meta_title_fr' => 'Test Meta',
                'meta_title_en' => 'Meta test',
                'meta_keywords_fr' => 'test,test2',
                'meta_keywords_en' => 'test,test2',
                'meta_description_fr' => 'Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'meta_description_en' => 'Cras ultricies ligula sed magna dictum porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'created_at' => $date,
                'updated_at' => $date
            ]
        ];
        Event::insert($list);
    }
}
