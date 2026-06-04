<?php

namespace MyProject\Models;

use MyProject\Services\Db;

abstract class ActiveRecordEntity
{
    protected $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function __set(string $name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    private function camelCaseToUnderscore(string $source): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $source));
    }

    public static function findAll(): array
    {
        $db = Db::getInstance();
        return $db->query('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
    }

    public static function getById(int $id): ?self
    {
        $db = Db::getInstance();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE id=:id;',
            [':id' => $id],
            static::class
        );
        return $entities ? $entities[0] : null;
    }

    public function save(): void
    {
        $mappedProperties = $this->mapPropertiesToDbFormat();
        if ($this->id !== null) {
            $this->update($mappedProperties);
        } else {
            $this->insert($mappedProperties);
        }
    }

    public function delete(): void
    {
        $db = Db::getInstance();
        $db->query(
            'DELETE FROM `' . static::getTableName() . '` WHERE id = :id',
            [':id' => $this->id]
        );
        $this->id = null;
    }

    private function mapPropertiesToDbFormat(): array
{
    $reflector = new \ReflectionObject($this);
    $properties = $reflector->getProperties();
    $mappedProperties = [];
    foreach ($properties as $property) {
        if ($property->isStatic()) {
            continue; // пропускаем статические свойства
        }
        $propertyName = $property->getName();
        $propertyNameAsUnderscore = $this->camelCaseToUnderscore($propertyName);
        $mappedProperties[$propertyNameAsUnderscore] = $this->$propertyName;
    }
    return $mappedProperties;
}

    private function update(array $mappedProperties): void
    {
        $columns2params = [];
        $params2values = [];
        $index = 1;
        foreach ($mappedProperties as $column => $value) {
            $param = ':param' . $index;
            $columns2params[] = $column . ' = ' . $param;
            $params2values[$param] = $value;
            $index++;
        }
        $sql = 'UPDATE ' . static::getTableName() . ' SET ' . implode(', ', $columns2params) . ' WHERE id = ' . $this->id;
        $db = Db::getInstance();
        $db->query($sql, $params2values, static::class);
    }

    private function insert(array $mappedProperties): void
{
    $filteredProperties = array_filter($mappedProperties, function($value) {
        return $value !== null;
    });

    $columns = [];
    $paramsNames = [];
    $params2values = [];
    foreach ($filteredProperties as $columnName => $value) {
        $columns[] = '`' . $columnName . '`';
        $paramsNames[] = ':' . $columnName;
        $params2values[':' . $columnName] = $value;
    }

    $sql = 'INSERT INTO ' . static::getTableName() .
        ' (' . implode(', ', $columns) . ')' .
        ' VALUES (' . implode(', ', $paramsNames) . ');';

    $db = Db::getInstance();
    $db->query($sql, $params2values, static::class);
    $this->id = $db->getLastInsertId(); // получаем id новой записи
}

    abstract protected static function getTableName(): string;
}