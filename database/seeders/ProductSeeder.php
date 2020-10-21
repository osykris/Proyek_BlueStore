<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'LAYER OUTER GREY',
            'price' => '149000',
            'category_id' => 1,
            'description' => 'The outside for your layering game,
            the layer details on the front are sweetened.
            There are two hidden bags on the right and left.
            Complete with Flowy Inner
            Material:
            Wolly Crepe (tight fibers, not too thick,
            Material falls when used, is not hot,
            not slippery, suitable for daily or formal) with size M',
            'qty' => 14,
            'picture' => 'TOP01.jpg'
        ]);

        DB::table('products')->insert([
            'name' => 'SUMMER SLIT DRESS LONGSLEEVE NAVY',
            'price' => '229000',
            'category_id' => 1,
            'description' => 'Dress with a simple slit accent but still stunning. 
            The material used is the best chiffon crepe so it is comfortable and falls when worn. 
            There is a zipper on the back. Material: 
            Chiffon Crepe (Crepe that is not rigid, flexible, soft, not too thin or thick and not dreamy) 
            with size M',
            'qty' => 8,
            'picture' => 'TOP02.jpg'
        ]);

        DB::table('products')->insert([
            'name' => 'SUMMER SLIT DRESS NOSLEEVE GREEN',
            'price' => '199000',
            'category_id' => 1,
            'description' => 'Dress with a simple slit accent but still stunning. 
            The material used is the best chiffon crepe so it is comfortable and falls when worn. 
            There is a zipper on the back. Material: 
            Chiffon Crepe (Crepe that is not rigid, flexible, soft, not too thin or thick and not dreamy) 
            with size S',
            'qty' => 11,
            'picture' => 'TOP03.jpg'
        ]);

        DB::table('products')->insert([
            'name' => 'ANKLE CULOTTE CHOCO',
            'price' => '169000',
            'category_id' => 2,
            'description' => 'Specially designed to fall exactly
            at the ankle to make it look slender.
            There are standard YKK zippers, hooks and front buttons,
            with two pockets on the right and left and two pockets on the back side.
            Also available is a belt holder at the waist.
            Material:
            Cotton Proff (with a blend of cotton and polyester fibers,
            so that it falls perfectly, not stiff
            and travel friendly because it is not easy to tangle) with size fit to L',
            'qty' => 13,
            'picture' => 'BTM01.jpg'
        ]);

        DB::table('products')->insert([
            'name' => 'CHINO PANTS BLACK',
            'price' => '159000',
            'category_id' => 2,
            'description' => 'Designed with a straight cut fit, as well as the best materials
            which is comfortable when worn. There are two pockets
            on the right and left, there is a place for the belt,
            the back is full of rubber, using YKK zippers
            and Japanese standard buttons.
            Material:
            High Quality Drill (the material is not thin, not easily scratched,
            no press on the body, and
            very durable) with size M',
            'qty' => 9,
            'picture' => 'BTM02.jpg'
        ]);

        DB::table('products')->insert([
            'name' => 'CARGO PANTS GREY',
            'price' => '179000',
            'category_id' => 2,
            'description' => 'A new pants for your collection!
            Cool look for your daily need.
            Uniquely, these pants have 2 pockets at the top,
            2 pockets on the bottom, and 2 on the right and left.
            Function to the fullest.
            Material:
            Stretch Drill (Not thin, not easily scratched,
            no press on the body, soft, and most importantly,
            very durable even though its been used
            and washed many times) with size fit to L',
            'qty' => 19,
            'picture' => 'BTM03.jpg'
        ]);

        DB::table('products')->insert([
            'name' => 'PLAIN SQUARE HIJAB BLACK',
            'price' => '79000',
            'category_id' => 3,
            'description' => 'Complete your daily outfit with the Plain Square Hijab.
            The material is comfortable, does NOT wrinkle easily, and is square in shape, 
            perfect for those of you who wear hijab and have a lot of activities. This time there are many color choices,
            which you can mix and match with your favorite outfit.
            Material: Special Ultrafine (not easy to wrinkle, absorb sweat, comfortable, not hot, 
            lint-free after repeated washing)',
            'qty' => 5,
            'picture' => 'HW01.jpg'
        ]);

        DB::table('products')->insert([
            'name' => 'PLAIN SQUARE HIJAB MOCCA',
            'price' => '79000',
            'category_id' => 3,
            'description' => 'Complete your daily outfit with the Plain Square Hijab.
            The material is comfortable, does NOT wrinkle easily, and is square in shape, 
            perfect for those of you who wear hijab and have a lot of activities. This time there are many color choices,
            which you can mix and match with your favorite outfit.
            Material: Special Ultrafine (not easy to wrinkle, absorb sweat, comfortable, not hot, 
            lint-free after repeated washing)',
            'qty' => 15,
            'picture' => 'HW02.jpg'
        ]);

        DB::table('products')->insert([
            'name' => 'PLAIN SQUARE HIJAB NAVY',
            'price' => '79000',
            'category_id' => 3,
            'description' => 'Complete your daily outfit with the Plain Square Hijab.
            The material is comfortable, does NOT wrinkle easily, and is square in shape, 
            perfect for those of you who wear hijab and have a lot of activities. This time there are many color choices,
            which you can mix and match with your favorite outfit.
            Material: Special Ultrafine (not easy to wrinkle, absorb sweat, comfortable, not hot, 
            lint-free after repeated washing)',
            'qty' => 9,
            'picture' => 'HW03.jpg'
        ]);

        DB::table('products')->insert([
            'name' => 'GIFT CARD',
            'price' => '4900',
            'category_id' => 4,
            'description' => 'Extra Gift Card to complement the package!
            Complete your package with a customizable greeting card with the words you compose yourself, 
            perfect as a gift for your loved one. Info: The words written will be adjusted to those inputted in 
            the seller s note column at checkout and if there is no custom text, gift cards will be sent in general',
            'qty' => 90,
            'picture' => 'ADD01.jpg'
        ]);

        DB::table('products')->insert([
            'name' => 'WHITE BOX',
            'price' => '9000',
            'category_id' => 4,
            'description' => 'Additional Box is black as a complement to the package! 
            Present the THENBLANK product unboxing experience with a box. Boxes are also very appropriate 
            as product packaging for those of you who want to give them as gifts.
            You can also add a special greeting card with the custom text you want.',
            'qty' => 99,
            'picture' => 'ADD02.jpg'
        ]);

    }
}
