<?php

namespace Database\Seeders;

use App\Models\Information;
use Illuminate\Database\Seeder;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'type' => 'CONTACT',
                'label' => 'phone_hn',
                'value' => '01234567890',
            ],[
                'type' => 'CONTACT',
                'label' => 'phone_hcm',
                'value' => '01234567890',
            ],[
                'type' => 'CONTACT',
                'label' => 'hotline',
                'value' => '01234567890',
            ],[
                'type' => 'CONTACT',
                'label' => 'zalo',
                'value' => 'https://zalo.me/9999999999',
            ],[
                'type' => 'CONTACT',
                'label' => 'messenger',
                'value' => 'https://m.me/LoremIpsum',
            ],[
                'type' => 'CONTACT',
                'label' => 'address_hn',
                'value' => 'Số 1 đường ABC, Cầu Giấy, Hà Nội',
            ],[
                'type' => 'CONTACT',
                'label' => 'address_hcm',
                'value' => 'Số 2 đường DEF, Quận 1, TP Hồ Chí Minh',
            ],[
                'type' => 'CONTACT',
                'label' => 'google_map_hn',
                'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3673.6443074651593!2d76.04800561535346!3d22.96332312430135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3963179aa37da85d%3A0x9ad74f985a500d01!2sWebstrot%20Technology!5e0!3m2!1sen!2sin!4v1610533150713!5m2!1sen!2sin',
            ],[
                'type' => 'CONTACT',
                'label' => 'google_map_hcm',
                'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3673.6443074651593!2d76.04800561535346!3d22.96332312430135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3963179aa37da85d%3A0x9ad74f985a500d01!2sWebstrot%20Technology!5e0!3m2!1sen!2sin!4v1610533150713!5m2!1sen!2sin',
            ],[
                'type' => 'CONTACT',
                'label' => 'email',
                'value' => 'sưpport@saobacmedia.vn',
            ],[
                'type' => 'ABOUT',
                'label' => 'about',
                'value' => '',
            ]
        ];

        Information::insert($data);
    }
}
