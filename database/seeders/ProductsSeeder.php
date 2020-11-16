<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
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
                'img' => 'mon-produit.jpg',
                'uri_fr' => 'mon-produit-1',
                'uri_en' => 'my-product-1',
                'title_fr' => 'Mon produit 1',
                'title_en' => 'My product 1',
                'content_fr' => json_encode(['<p>Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.</p>', '<p>Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.</p>']),
                'content_en' => json_encode(['<p>Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.</p>', '<p>Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.</p>']),
                'meta_img' => 'mon-produit.jpg',
                'meta_title_fr' => 'mon-produit-1',
                'meta_title_en' => 'my-product-1',
                'meta_keywords_fr' => 'test,test2',
                'meta_keywords_en' => 'test,test2',
                'meta_description_fr' => 'Sed porttitor lectus nibh. Nulla quis lorem ut libero malesuada feugiat.',
                'meta_description_en' => 'Sed porttitor lectus nibh. Nulla quis lorem ut libero malesuada feugiat.',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'img' => 'mon-produit.jpg',
                'uri_fr' => 'mon-produit-2',
                'uri_en' => 'my-product-2',
                'title_fr' => 'Mon produit 2',
                'title_en' => 'My product 2',
                'content_fr' => json_encode(['<p>Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.</p>', '<p>Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.</p>']),
                'content_en' => json_encode(['<p>Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.</p>', '<p>Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.</p>']),
                'meta_img' => 'mon-produit.jpg',
                'meta_title_fr' => 'mon-produit-2',
                'meta_title_en' => 'my-product-2',
                'meta_keywords_fr' => 'test,test2',
                'meta_keywords_en' => 'test,test2',
                'meta_description_fr' => 'Sed porttitor lectus nibh. Nulla quis lorem ut libero malesuada feugiat.',
                'meta_description_en' => 'Sed porttitor lectus nibh. Nulla quis lorem ut libero malesuada feugiat.',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'img' => 'mon-produit.jpg',
                'uri_fr' => 'mon-produit-3',
                'uri_en' => 'my-product-3',
                'title_fr' => 'Mon produit 3',
                'title_en' => 'My product 3',
                'content_fr' => json_encode(['<p>Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.</p>', '<p>Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.</p>']),
                'content_en' => json_encode(['<p>Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.</p>', '<p>Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.</p>']),
                'meta_img' => 'mon-produit.jpg',
                'meta_title_fr' => 'mon-produit-3',
                'meta_title_en' => 'my-product-3',
                'meta_keywords_fr' => 'test,test2',
                'meta_keywords_en' => 'test,test2',
                'meta_description_fr' => 'Sed porttitor lectus nibh. Nulla quis lorem ut libero malesuada feugiat.',
                'meta_description_en' => 'Sed porttitor lectus nibh. Nulla quis lorem ut libero malesuada feugiat.',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'img' => 'mon-produit.jpg',
                'uri_fr' => 'mon-produit-4',
                'uri_en' => 'my-product-4',
                'title_fr' => 'Mon produit 4',
                'title_en' => 'My product 4',
                'content_fr' => json_encode(['<p>Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.</p>', '<p>Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.</p>']),
                'content_en' => json_encode(['<p>Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.</p>', '<p>Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.</p>']),
                'meta_img' => 'mon-produit.jpg',
                'meta_title_fr' => 'mon-produit-4',
                'meta_title_en' => 'my-product-4',
                'meta_keywords_fr' => 'test,test2',
                'meta_keywords_en' => 'test,test2',
                'meta_description_fr' => 'Sed porttitor lectus nibh. Nulla quis lorem ut libero malesuada feugiat.',
                'meta_description_en' => 'Sed porttitor lectus nibh. Nulla quis lorem ut libero malesuada feugiat.',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'img' => 'mon-produit.jpg',
                'uri_fr' => 'mon-produit-5',
                'uri_en' => 'my-product-5',
                'title_fr' => 'Mon produit 5',
                'title_en' => 'My product 5',
                'content_fr' => json_encode(['<p>Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.</p>', '<p>Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.</p>']),
                'content_en' => json_encode(['<p>Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.</p>', '<p>Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.</p>']),
                'meta_img' => 'mon-produit.jpg',
                'meta_title_fr' => 'mon-produit-5',
                'meta_title_en' => 'my-product-5',
                'meta_keywords_fr' => 'test,test2',
                'meta_keywords_en' => 'test,test2',
                'meta_description_fr' => 'Sed porttitor lectus nibh. Nulla quis lorem ut libero malesuada feugiat.',
                'meta_description_en' => 'Sed porttitor lectus nibh. Nulla quis lorem ut libero malesuada feugiat.',
                'created_at' => $date,
                'updated_at' => $date
            ]
        ];
        Product::insert($list);
    }
}
