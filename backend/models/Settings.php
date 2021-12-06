<?php

namespace backend\models;

use yii\base\Model;

class Settings extends Model {

    /* Основные */
    public $phone_one;
    public $phone_two;
    public $phone_three;
    public $phone_four;
    public $email;
    public $the_title_of_the_text_about_the_company;
    public $the_text_about_the_company_one;
    public $socials_network;
    public $map_city_one;
    public $map_city_two;
    public $map_city_three;
    public $social_one;
    public $social_two;
    public $social_three;
    public $social_four;
    public $address_place;
    public $yandex_score;
    public $yandex_link;
    public $advantages;
    public $services;

    /* SMTP */
    public $smtp_username;
    public $smtp_password;
    public $smtp_host;
    public $smtp_port;
    public $smtp_encrypt;

    /* Преимущества */
    public $header_advantage_1;
    public $text_advantage_1;
    public $header_advantage_2;
    public $text_advantage_2;
    public $header_advantage_3;
    public $text_advantage_3;
    public $header_advantage_4;
    public $text_advantage_4;

    /* SEO главной страницы */
    public $h1;
    public $h1_under;
    public $title;
    public $keywords;
    public $description;

    /* agreement */
    public $domain,
            $org_name,
            $org_address;
    
    /* Каталог */
    public $count_on_page;


    public function rules() {
        return [
            [
                [
                    'socials_network',
                    'phone_one',
                    'phone_two',
                    'phone_three',
                    'phone_four',
                    'email',
                    'the_title_of_the_text_about_the_company',
                    'the_text_about_the_company_one',
                    'header_advantage_1',
                    'text_advantage_1',
                    'header_advantage_2',
                    'text_advantage_2',
                    'header_advantage_3',
                    'text_advantage_3',
                    'header_advantage_4',
                    'text_advantage_4',
                    'h1',
                    'title',
                    'keywords',
                    'description',
                    'domain',
                    'org_name',
                    'org_address',
                    'h1_under',
                    'count_on_page',
                    'smtp_username',
                    'smtp_password',
                    'smtp_host',
                    'smtp_port',
                    'smtp_encrypt',
                    'map_city_one',
                    'map_city_two',
                    'map_city_three',
                    'social_one',
                    'social_two',
                    'social_three',
                    'social_four',
                    'address_place',
                    'yandex_score',
                    'yandex_link',
                    'advantages',
                    'services',
                ], 
                'string'
            ],
            [['textIndex'], 'safe'],
        ];
    }

    public function attributeLabels() {
        return [
            'phone_one' => 'Телефон',
            'phone_two' => 'Телефон',
            'phone_three' => 'Телефон (Розница)',
            'phone_four' => 'Телефон (Монтаж)',
            'email' => 'E-mail для уведомления о новых заказах',
            'the_title_of_the_text_about_the_company' => 'Заголовок текста на главной',
            'the_text_about_the_company_one' => 'Текст на главной',
            'header_advantage_1' => 'Заголовок преимущества №1',
            'text_advantage_1' => 'Преимущество №1',
            'header_advantage_2' => 'Заголовок преимущества №2',
            'text_advantage_2' => 'Преимущество №2',
            'header_advantage_3' => 'Заголовок преимущества №3',
            'text_advantage_3' => 'Преимущество №3',
            'header_advantage_4' => 'Заголовок преимущества №4',
            'text_advantage_4' => 'Преимущество №4',
            'h1' => 'H1',
            'title' => 'Title',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'domain' => 'Доменное имя',
            'org_name' => 'Название организации',
            'org_address' => 'Адрес организации',
            'h1_under' => 'Текст под H1',
            'count_on_page' => 'Кол-во объектов на странице',
            'socials_network' => 'Социальные сети',
            'smtp_username' => 'Имя пользователя',
            'smtp_password' => 'Пароль',
            'smtp_host' => 'Почтовый сервер(Хост)',
            'smtp_port' => 'Порт сервера',
            'smtp_encrypt' => 'Шифрование',
            'map_city_one' => 'Карта',
            'social_one' => 'Телеграм',
            'social_two' => 'Фейсбук',
            'social_three' => 'Инстаграм',
            'social_four' => 'Ютуб',
            'address_place' => 'Адрес',
            'yandex_score' => 'Числовая оценка отзывов',
            'yandex_link' => 'Ссылка на отзывы',
            'advantages' => 'Блок преимуществ на главной',
            'services' => 'Блок услуг на главной'
        ];
    }
}
