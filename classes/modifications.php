<?php

require_once('selections.php');

class modifications extends selections
{
    //fonction pour l'insertion de donnee dans la db 
    public function insert($table, $data)
    {
        $fieldName = implode(', ', array_keys($data));
        $fieldValue = ":" . implode(', :', array_keys($data));
        $sql = "INSERT INTO $table ($fieldName) VALUES ($fieldValue);";
        $stmt = $this->db->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    //Fonction pour la modification de donnees dans la db
    public function update($table, $data, $field = "id")
    {
        $fieldName = null;
        foreach ($data as $key => $value) {
            $fieldName .= "$key = :$key, ";
        }
        $fieldName = rtrim($fieldName, ', ');
        $sql = "UPDATE $table SET $fieldName WHERE $field = :$field";
        // return $sql;
        $stmt = $this->db->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //fonction pour la deletion de donnees dans la db
    public function delete($table, $value, $field = 'id')
    {

        $sql = "DELETE FROM $table WHERE $field = :$field";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":$field", $value);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
