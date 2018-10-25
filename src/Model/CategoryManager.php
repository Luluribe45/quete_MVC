<?php
namespace Model;

/**
 * Class CategoryManager
 * @package Model
 */
class CategoryManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'category';

    /**
     * CategoryManager constructor.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }


    /**
     * @param Category $category
     * @return int
     */
    public function insert(Category $category): int
    {
        $statement = $this->pdo->prepare("INSERT INTO $this->table (`title`) VALUES (:title)");
        $statement->bindValue('title', $category->getTitle(), \PDO::PARAM_STR);

        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
    }


    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        $statement = $this->pdo->prepare("DELETE FROM $this->table WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }

    /**
     * @param Category $category
     * @return int
     */
    public function update(Category $category):int
    {
        $statement = $this->pdo->prepare("UPDATE $this->table SET `title` = :title WHERE id=:id");
        $statement->bindValue('id', $category->getId(), \PDO::PARAM_INT);
        $statement->bindValue('title', $category->getTitle(), \PDO::PARAM_STR);

        return $statement->execute();
    }
}
