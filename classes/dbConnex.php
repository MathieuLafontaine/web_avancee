<?php

//Creation d'une classe qui effectue la connection a la db selon le modele CRUD vu en classe. 
//Considerant les demandes du TP1, plusieurs classes sont requises afin d'accomplir le travail. Considerant que nous n'avions pas vu CRUD lors de la remise de l'enonce,
// j'ai decide d'eviter de faire usage de cette structure dans ce TP considerant qu'une seule classe aurait ete necessaire. J'ai toutefois juger pertinent de les grouper en trois sections:
// soit dbConnex qui effectuer la connection, selections pour les selections des items dans la db et modifications pour tout ce qui attrait aux changements dans la db.

class dbConnex extends PDO
{
    public function __construct()
    {
        parent::__construct('mysql:host=localhost;dbname=TeaShop;port=3306;charset=utf8', 'root', 'TravailPratique2!');
    }
}
