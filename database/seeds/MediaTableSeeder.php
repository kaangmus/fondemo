<?php

use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('media')->insert(
            [
                'id'=>1,
                'model_type' => 'App\Slider',
                'model_id' => 1,
                'name' => '5e02554cc63ff_slider1',
                'collection_name'=>"image",
                'file_name' => '5e02554cc63ff_slider1.jpg',
                'mime_type' => 'image/jpeg',
                'disk' => 'public',
                'size' => 125270,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true}}',
                'responsive_images' => '[]',
                'order_column' => 1
                

            ]);
         DB::table('media')->insert(
             [
                'id'=>2,
                'model_type' => 'App\Slider',
                'model_id' => 2,
                'name' => '5e02555f9f6ed_slider1',
                'collection_name'=>"image",
                'file_name' => '5e02555f9f6ed_slider1.jpg',
                'mime_type' => 'image/jpeg',
                'disk' => 'public',
                'size' => 206533,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true}}',
                'responsive_images' => '[]',
                'order_column' => 2
                

             ]);
            DB::table('media')->insert(
             [
                'id'=>3,
                'model_type' => 'App\Slider',
                'model_id' => 3,
                'name' => '5e02556adf30d_slider2',
                'collection_name'=>"image",
                'file_name' => '5e02556adf30d_slider2.jpg',
                'mime_type' => 'image/jpeg',
                'disk' => 'public',
                'size' => 282880,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true}}',
                'responsive_images' => '[]',
                'order_column' => 3
                

             ]);
             DB::table('media')->insert(
             [
                'id'=>4,
                'model_type' => 'App\ContentPage',
                'model_id' => 1,
                'name' => '5e07af6f708a5_mov_bbb',
                'collection_name'=>"video",
                'file_name' => '5e07af6f708a5_mov_bbb.mp4',
                'mime_type' => 'video/mp4',
                'disk' => 'public',
                'size' => 788493,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true}}',
                'responsive_images' => '[]',
                'order_column' => 4
                

             ]);
              DB::table('media')->insert(
             [
                'id'=>5,
                'model_type' => 'App\ContentPage',
                'model_id' => 1,
                'name' => '5e07be97bd914_slider2',
                'collection_name'=>"featured_image",
                'file_name' => '5e07be97bd914_slider2.jpg',
                'mime_type' => 'image/jpeg',
                'disk' => 'public',
                'size' => 159378,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 5
                

             ]);
              DB::table('media')->insert(
             [
                'id'=>6,
                'model_type' => 'App\ContentPage',
                'model_id' => 2,
                'name' => '5e07bea17b475_slider1',
                'collection_name'=>"featured_image",
                'file_name' => '5e07bea17b475_slider1.jpg',
                'mime_type' => 'image/jpeg',
                'disk' => 'public',
                'size' => 159378,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 6
                

             ]);
              DB::table('media')->insert(
             [
                'id'=>7,
                'model_type' => 'App\ContentPage',
                'model_id' => 3,
                'name' => '5e07beaec47f2_slider2',
                'collection_name'=>"featured_image",
                'file_name' => '5e07beaec47f2_slider2.jpg',
                'mime_type' => 'image/jpeg',
                'disk' => 'public',
                'size' => 159678,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 7
                

             ]);

             DB::table('media')->insert(
             [
                'id'=>8,
                'model_type' => 'App\Advisor',
                'model_id' => 1,
                'name' => '5e09acd048d1a_favicon',
                'collection_name'=>"photp",
                'file_name' => '5e09acd048d1a_favicon.png',
                'mime_type' => 'image/png',
                'disk' => 'public',
                'size' => 24818,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 7
                

             ]);
             DB::table('media')->insert(
             [
                'id'=>9,
                'model_type' => 'App\Advisor',
                'model_id' => 2,
                'name' => '5e09acdb0983e_favicon',
                'collection_name'=>"photp",
                'file_name' => '5e09acdb0983e_favicon.png',
                'mime_type' => 'image/png',
                'disk' => 'public',
                'size' => 159678,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 7
                

             ]);
             DB::table('media')->insert(
             [
                'id'=>10,
                'model_type' => 'App\Advisor',
                'model_id' => 3,
                'name' => '5e09ace5637cf_favicon',
                'collection_name'=>"photp",
                'file_name' => '5e09ace5637cf_favicon.png',
                'mime_type' => 'image/png',
                'disk' => 'public',
                'size' => 159678,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 7
                

             ]);
             DB::table('media')->insert(
             [
                'id'=>11,
                'model_type' => 'App\Advisor',
                'model_id' => 4,
                'name' => '5e09acef2eebc_favicon',
                'collection_name'=>"photp",
                'file_name' => '5e09acef2eebc_favicon.png',
                'mime_type' => 'image/png',
                'disk' => 'public',
                'size' => 159678,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 7
                

             ]);
             DB::table('media')->insert(
             [
                'id'=>12,
                'model_type' => 'App\Advisor',
                'model_id' => 5,
                'name' => '5e09acfbc5797_favicon',
                'collection_name'=>"photp",
                'file_name' => '5e09acfbc5797_favicon.png',
                'mime_type' => 'image/png',
                'disk' => 'public',
                'size' => 159678,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 7
                

             ]);
             DB::table('media')->insert(
             [
                'id'=>13,
                'model_type' => 'App\Advisor',
                'model_id' => 6,
                'name' => '5e09ad07afeda_favicon',
                'collection_name'=>"photp",
                'file_name' => '5e09ad07afeda_favicon.png',
                'mime_type' => 'image/png',
                'disk' => 'public',
                'size' => 159678,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 7
                

             ]);

             DB::table('media')->insert(
             [
                'id'=>14,
                'model_type' => 'App\Advisor',
                'model_id' => 7,
                'name' => '5e09ad12db2ae_favicon',
                'collection_name'=>"photp",
                'file_name' => '5e09ad12db2ae_favicon.png',
                'mime_type' => 'image/png',
                'disk' => 'public',
                'size' => 159678,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 7
                

             ]);



        
              //  species
             DB::table('media')->insert(
             [
                'id'=>15,
                'model_type' => 'App\Species',
                'model_id' => 14,
                'name' => '5e19dedcba758_ANIMAL-CARE-&-CRUELTY',
                'collection_name'=>"image",
                'file_name' => '5e19dedcba758_ANIMAL-CARE-&-CRUELTY.png',
                'mime_type' => 'image/png',
                'disk' => 'public',
                'size' => 99409,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 8
                

             ]);

            DB::table('media')->insert(
             [
                'id'=>16,
                'model_type' => 'App\Species',
                'model_id' => 13,
                'name' => '5e19df8eed2c4_HABITAT-&-BIODIVERSITY',
                'collection_name'=>"image",
                'file_name' => '5e19df8eed2c4_HABITAT-&-BIODIVERSITY.jpeg',
                'mime_type' => 'image/jpeg',
                'disk' => 'public',
                'size' => 99409,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 9
                

             ]);
             DB::table('media')->insert(
             [
                'id'=>17,
                'model_type' => 'App\Species',
                'model_id' => 12,
                'name' => '5e19df9a3a505_TORTOISES',
                'collection_name'=>"image",
                'file_name' => '5e19df9a3a505_TORTOISES.jpg',
                'mime_type' => 'image/jpeg',
                'disk' => 'public',
                'size' => 99409,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 10
                

             ]);
             DB::table('media')->insert(
             [
                'id'=>18,
                'model_type' => 'App\Species',
                'model_id' => 11,
                'name' => '5e19dfa70fc43_WOLVES',
                'collection_name'=>"image",
                'file_name' => '5e19dfa70fc43_WOLVES.jpg',
                'mime_type' => 'image/jpeg',
                'disk' => 'public',
                'size' => 99409,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 11
                

             ]);
             DB::table('media')->insert(
             [
                'id'=>19,
                'model_type' => 'App\Species',
                'model_id' => 10,
                'name' => '5e19dfd682b8e_LEOPARDS',
                'collection_name'=>"image",
                'file_name' => '5e19dfd682b8e_LEOPARDS.jpg',
                'mime_type' => 'image/jpeg',
                'disk' => 'public',
                'size' => 99409,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 10
                

             ]);
                          DB::table('media')->insert(
             [
                'id'=>20,
                'model_type' => 'App\Species',
                'model_id' => 9,
                'name' => '5e19dfe80182f_RHINOCEROS',
                'collection_name'=>"image",
                'file_name' => '5e19dfe80182f_RHINOCEROS.jpg',
                'mime_type' => 'image/jpeg',
                'disk' => 'public',
                'size' => 99409,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 11
                

             ]);
                          DB::table('media')->insert(
             [
                'id'=>21,
                'model_type' => 'App\Species',
                'model_id' => 8,
                'name' => '5e19dff1b2fc1_ELEPHANTS',
                'collection_name'=>"image",
                'file_name' => '5e19dff1b2fc1_ELEPHANTS.jpg',
                'mime_type' => 'image/jpeg',
                'disk' => 'public',
                'size' => 99409,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 12
                

             ]);
             
                          DB::table('media')->insert(
             [
                'id'=>22,
                'model_type' => 'App\Species',
                'model_id' => 7,
                'name' => '5e19dffc12f3f_GREAT-APES',
                'collection_name'=>"image",
                'file_name' => '5e19dffc12f3f_GREAT-APES.jpeg',
                'mime_type' => 'image/jpeg',
                'disk' => 'public',
                'size' => 99409,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 13
                

             ]);
                         
             
             DB::table('media')->insert(
             [
                'id'=>23,
                'model_type' => 'App\Species',
                'model_id' => 6,
                'name' => '5e19e0070208b_RAINFORESTS',
                'collection_name'=>"image",
                'file_name' => '5e19e0070208b_RAINFORESTS.jpeg',
                'mime_type' => 'image/jpeg',
                'disk' => 'public',
                'size' => 99409,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 14
                

             ]);
             DB::table('media')->insert(
             [
                'id'=>24,
                'model_type' => 'App\Species',
                'model_id' => 5,
                'name' => '5e19e0169d00e_TURTLES',
                'collection_name'=>"image",
                'file_name' => '5e19e0169d00e_TURTLES.jpg',
                'mime_type' => 'image/jpeg',
                'disk' => 'public',
                'size' => 99409,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 15
                

             ]);
             DB::table('media')->insert(
             [
                'id'=>25,
                'model_type' => 'App\Species',
                'model_id' => 4,
                'name' => '5e19e02f206af_SHARKS',
                'collection_name'=>"image",
                'file_name' => '5e19e02f206af_SHARKS.jpg',
                'mime_type' => 'image/jpeg',
                'disk' => 'public',
                'size' => 99409,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 16
                

             ]);
             DB::table('media')->insert(
             [
                'id'=>26,
                'model_type' => 'App\Species',
                'model_id' => 3,
                'name' => '5e19e03a0de53_MANTA-RAYS',
                'collection_name'=>"image",
                'file_name' => '5e19e03a0de53_MANTA-RAYS.jpeg',
                'mime_type' => 'image/jpeg',
                'disk' => 'public',
                'size' => 99409,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 17
                

             ]);
             DB::table('media')->insert(
             [
                'id'=>27,
                'model_type' => 'App\Species',
                'model_id' => 2,
                'name' => '5e19e0519cf7a_OCEANS',
                'collection_name'=>"image",
                'file_name' => '5e19e0519cf7a_OCEANS.jpg',
                'mime_type' => 'image/jpeg',
                'disk' => 'public',
                'size' => 99409,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 18
                

             ]);
             DB::table('media')->insert(
             [
                'id'=>28,
                'model_type' => 'App\Species',
                'model_id' => 1,
                'name' => '5e19e05cb44a0_WHALES-AND-DOLPHINS',
                'collection_name'=>"image",
                'file_name' => '5e19e05cb44a0_WHALES-AND-DOLPHINS.jpg',
                'mime_type' => 'image/jpeg',
                'disk' => 'public',
                'size' => 99409,
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"thumb":true,"medium":true}}',
                'responsive_images' => '[]',
                'order_column' => 18
                

             ]);
             









 
             
             
              
              
              

        
    
 }
}
