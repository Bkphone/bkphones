<?php

namespace app\models;

use app\core\Database;
use app\core\DBModel;

class Category extends DBModel
{
    public string $id;
    public string $name;
    
    public function __construct(
        $id = '',
        $name = ''
    ) {
        $this->name = $name;
        $this->id = $id;
    }

    public function getName() 
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDisplayName(): string
    {
        return $this->name;
    }

    public function getLabel($attribute)
    {
        return $this->labels()[$attribute];
    }
    
    public static function tableName(): string
    {
        return 'categories';
    }

    public function attributes(): array
    {
        return ['id', 'name'];
    }

    
    public function labels(): array
    {
        return [
            'name' => 'Tên danh mục',
        ];
    }

    public function rules(): array
    {
        return [
            // 'name' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' <= 30]],
            'name' => [self::RULE_REQUIRED],
        ];
    }

    public static function getCategoryByPaging($page_idx, $num_cate)
    {
        $list = [];
        $db = Database::getInstance();
        $starting_limit_number = ($page_idx - 1) * $num_cate;
        $sql = "SELECT * FROM categories LIMIT " . $starting_limit_number . ',' . $num_cate;
        $req = $db->query($sql);
        foreach ($req->fetchAll() as $item) {
            $list[] = new Category(
                $item['id'],
                $item['name']
            );
        }
        return $list;
    }

    public function save()
    {
        $this->id = uniqid();
        return parent::save();
    }

    public static function delete($id)
    {
        $sql = "DELETE FROM categories WHERE id=?";
        $stmt= self::prepare($sql);
        $stmt->execute([$id]);
        return true;
    }

    public static function update($category)
    {
        $sql = "UPDATE categories SET name='$category->name' 
                                    WHERE id='$category->id'";
        $statement = self::prepare($sql);
        $statement->execute();
        return true;         
    }

    public static function getAllCategories()
    {
        $list = [];
        $db = Database::getInstance();
        $req = $db->query('SELECT * FROM categories');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Category($item['id'], $item['name']);
        }
        return $list;
    }

    public static function get($id)
    {
        $db = Database::getInstance();
        $req = $db->query("SELECT * FROM categories WHERE id = '$id'");
        $item = $req->fetchAll()[0];
        $categories = new Category($item['id'], $item['name']);
        return $categories;
    } 
}