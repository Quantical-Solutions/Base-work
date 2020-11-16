<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticlesSeeder extends Seeder
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
                'category_id' => 4,
                'published' => 1,
                'uri_fr' => '',
                'uri_en' => '',
                'title_fr' => 'Glisse and Drone ?',
                'title_en' => 'Slide and Drone',
                'content_fr' => json_encode(['<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus.

Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus.

Nulla porttitor accumsan tincidunt. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed magna dictum porta.

Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat.

Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus.

Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus.

Nulla porttitor accumsan tincidunt. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed magna dictum porta.

Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat.

Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>']),
                'content_en' => json_encode(['<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus.

Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus.

Nulla porttitor accumsan tincidunt. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed magna dictum porta.

Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat.

Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus.

Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus.

Nulla porttitor accumsan tincidunt. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed magna dictum porta.

Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat.

Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>']),
                'img_1' => 'article1.jpg',
                'img_2' => 'article1.jpg',
                'img_3' => 'article1.jpg',
                'meta_img' => 'article1.jpg',
                'meta_title_fr' => 'Glisse and Drone',
                'meta_title_en' => 'Slide and Drone',
                'meta_keywords_fr' => 'test,test2,test3',
                'meta_keywords_en' => 'test,test2,test3',
                'meta_description_fr' => 'Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
                'meta_description_en' => 'Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'category_id' => 4,
                'published' => 1,
                'uri_fr' => '',
                'uri_en' => '',
                'title_fr' => 'Glisse and Drone ?',
                'title_en' => 'Slide and Drone',
                'content_fr' => json_encode(['<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus.

Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus.

Nulla porttitor accumsan tincidunt. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed magna dictum porta.

Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat.

Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus.

Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus.

Nulla porttitor accumsan tincidunt. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed magna dictum porta.

Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat.

Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>']),
                'content_en' => json_encode(['<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus.

Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus.

Nulla porttitor accumsan tincidunt. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed magna dictum porta.

Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat.

Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus.

Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus.

Nulla porttitor accumsan tincidunt. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed magna dictum porta.

Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat.

Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>']),
                'img_1' => 'article1.jpg',
                'img_2' => 'article1.jpg',
                'img_3' => 'article1.jpg',
                'meta_img' => 'article1.jpg',
                'meta_title_fr' => 'Glisse and Drone',
                'meta_title_en' => 'Slide and Drone',
                'meta_keywords_fr' => 'test,test2,test3',
                'meta_keywords_en' => 'test,test2,test3',
                'meta_description_fr' => 'Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
                'meta_description_en' => 'Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'category_id' => 5,
                'published' => 1,
                'uri_fr' => '',
                'uri_en' => '',
                'title_fr' => 'Glisse and Drone ?',
                'title_en' => 'Slide and Drone',
                'content_fr' => json_encode(['<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus.

Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus.

Nulla porttitor accumsan tincidunt. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed magna dictum porta.

Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat.

Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus.

Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus.

Nulla porttitor accumsan tincidunt. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed magna dictum porta.

Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat.

Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>']),
                'content_en' => json_encode(['<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus.

Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus.

Nulla porttitor accumsan tincidunt. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed magna dictum porta.

Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat.

Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus.

Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus.

Nulla porttitor accumsan tincidunt. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed magna dictum porta.

Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat.

Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>']),
                'img_1' => 'article1.jpg',
                'img_2' => 'article1.jpg',
                'img_3' => 'article1.jpg',
                'meta_img' => 'article1.jpg',
                'meta_title_fr' => 'Glisse and Drone',
                'meta_title_en' => 'Slide and Drone',
                'meta_keywords_fr' => 'test,test2,test3',
                'meta_keywords_en' => 'test,test2,test3',
                'meta_description_fr' => 'Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
                'meta_description_en' => 'Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'category_id' => 5,
                'published' => 0,
                'uri_fr' => '',
                'uri_en' => '',
                'title_fr' => 'Glisse and Drone ?',
                'title_en' => 'Slide and Drone',
                'content_fr' => json_encode(['<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus.

Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus.

Nulla porttitor accumsan tincidunt. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed magna dictum porta.

Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat.

Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus.

Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus.

Nulla porttitor accumsan tincidunt. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed magna dictum porta.

Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat.

Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>']),
                'content_en' => json_encode(['<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus.

Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus.

Nulla porttitor accumsan tincidunt. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed magna dictum porta.

Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat.

Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus.

Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Proin eget tortor risus.

Nulla porttitor accumsan tincidunt. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed magna dictum porta.

Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla quis lorem ut libero malesuada feugiat.

Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>']),
                'img_1' => 'article1.jpg',
                'img_2' => 'article1.jpg',
                'img_3' => 'article1.jpg',
                'meta_img' => 'article1.jpg',
                'meta_title_fr' => 'Glisse and Drone',
                'meta_title_en' => 'Slide and Drone',
                'meta_keywords_fr' => 'test,test2,test3',
                'meta_keywords_en' => 'test,test2,test3',
                'meta_description_fr' => 'Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
                'meta_description_en' => 'Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
                'created_at' => $date,
                'updated_at' => $date
            ]
        ];
        Article::insert($list);
    }
}
