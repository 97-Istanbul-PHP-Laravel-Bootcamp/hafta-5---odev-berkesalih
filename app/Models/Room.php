<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = "room";
    protected $guarded = [];

    protected $casts = [
        'info_s' => 'array'
    ];
    public static function getBoardR($obj = NULL, $prop = 'name')
    {
        $obj_ = [
            'tv' => array(
                'name' => "Televizyon"
            ),
            'minibar' => array(
                'name' => "Minibar"
            ),
            'konsol' => array(
                'name' => "Oyun Konsolu"
            ),
            'projeksiyon' => array(
                'name' => "Kasa"
            ),
            'kasa' => array(
                'name' => "Projeksiyon"
            )
        ];
        return getR($obj_, $obj, $prop);
    }
    public static function getSpecR($obj = NULL, $prop = 'name')
    {
        $obj_ = [
            'parking' => [
                'name' => 'Ücretsiz Otopark',
            ],
            'wifi' => [
                'name' => 'Ücretsiz Wifi'
            ],
            'pool' => [
                'name' => 'Yüzme Havuzu'
            ],
            'gym' => [
                'name' => 'Fitness Center'
            ],
            'concierge' => [
                'name' => 'Otel Concierge'
            ],
            'spa' => [
                'name' => 'SPA Salonu'
            ],
            'room_service' => [
                'name' => '7/24 Oda Servisi'
            ]
        ];

        return getR($obj_, $obj, $prop);
    }
}
