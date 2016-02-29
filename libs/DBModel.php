<?php
namespace libs;

class DBModel
{
    protected $connection;

    public function __construct()
    {
        $this->connection = DBConnector::getConnection();
    }

    public function add($insName, $insData)
    {
        $values = array();
        $keys = " (`" . implode("`, `", array_keys($insData)) . "`)";

        foreach ($insData as $key => $value) {
            $val[] = ':' . $key;
        }

        $values = '(' . implode(',', $val) . ')';
        $sql = "INSERT INTO `$insName`" . $keys . "VALUES" . $values;
        $stmt = $this->connection->prepare($sql);

        foreach ($insData as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }

        $stmt->execute();

    }

    public function select($tableName, $columnName, $tableData = '', $params = '',$limit = 1)
    {
            $columnNameValues = implode(',', $columnName);
            $sql = "SELECT $columnNameValues FROM $tableName";
            $stmt = $this->connection->prepare($sql);
            if ($tableData == '') {
                $stmt->execute();

            } else {
                $sql .= " WHERE $tableData LIMIT $limit";
                $stmt = $this->connection->prepare($sql);
                $stmt->execute($params);
            }
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
    }

    public function delete($tableName, $fields, $amtFields = 5)
    {
        $values = array();
        $keys = " (`" . implode("`, `", array_keys($fields)) . "`)";

        foreach ($fields as $key => $value) {
            $val[] = ':' . $key;
        }

        $values = '(' . implode(',', $val) . ')';
        $sql = "DELETE FROM `$tableName`WHERE $keys = " . $values . "  LIMIT $amtFields";
        $stmt = $this->connection->prepare($sql);

        foreach ($fields as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }

        $stmt->execute();

    }

    public function update($tableName, $tableData, $id)
    {
        $values = array();
        $keys = implode("`, `", array_keys($tableData));

        foreach ($tableData as $key => $value) {
            $val[] = ':' . $key;
        }

        $values = implode(',', $val);
        $sql = "UPDATE $tableName SET $keys = $values WHERE id = :id";
        $stmt = $this->connection->prepare($sql);

        foreach ($tableData as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
            $stmt->bindParam(':id', $id);
        }

        $stmt->execute();

    }
}