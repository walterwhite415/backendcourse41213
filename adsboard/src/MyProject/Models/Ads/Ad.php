<?php

namespace MyProject\Models\Ads;

use MyProject\Models\ActiveRecordEntity;

class Ad extends ActiveRecordEntity
{
    protected $title;
    protected $text;
    protected $price;
    protected $category;
    protected $createdAt;

    public static $categories = [
        'Электроника',
        'Одежда',
        'Транспорт',
        'Недвижимость',
        'Разное',
    ];

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public static function findByCategory(string $category): array
    {
        $db = \MyProject\Services\Db::getInstance();
        return $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE category = :category ORDER BY created_at DESC;',
            [':category' => $category],
            static::class
        );
    }

    protected static function getTableName(): string
    {
        return 'ads';
    }
}