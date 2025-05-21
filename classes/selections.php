<?php

require_once('dbConnex.php');
//Fonction abstract ici , les selects seront appeles directement dans l'enfant modifications de cette classe.
abstract class selections
{
    //Appel a la classe dbConnex afin de creer l'objet db. Puisque la connection est hors de la classe, elle nous permet d'assurer la connection a la db a partir de cette fonction.
    //La valeur est protegee afin qu'elle soit plus securitaire tout en permettant son usage dans la fonction enfant
    // Source: https://stackoverflow.com/questions/43630810/how-to-use-pdo-connection-in-other-classes
    protected $db;

    public function __construct(dbConnex $db)
    {
        $this->db = $db;
    }

    //selection de toutes les donnees d'un tableau
    public function select($table, $field = 'id', $order = 'ASC')
    {
        $sql = "SELECT * FROM $table ORDER BY $field $order";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    //selection d'un seul row d'un tableau
    public function selectId($table, $value, $field = 'id')
    {
        $sql = "SELECT * FROM $table WHERE $field = :$field";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1) {
            return $stmt->fetch();
        } else {
            return false;
        }
    }

    //Selection unique au tableau transactions. Il y a plusieurs inner join dans celui-ci
    public function selectTransactions($table, $field, $order)
    {
        $sql = "SELECT * FROM  $table
        INNER JOIN client ON client_id = idClient
        INNER JOIN Tea ON tea_id = idTea
        INNER JOIN PaymentMethod ON paymentmethod_id = idPaymentMethod
        ORDER BY $field $order";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }
}
