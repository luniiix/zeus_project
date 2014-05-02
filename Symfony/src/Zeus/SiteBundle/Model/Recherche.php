<?php

namespace Zeus\SiteBundle\Model;
use Doctrine\ORM\Query\ResultSetMapping;

/**
 * Description of Recherche
 *
 * @author David ETIENNE
 */
class Recherche {

    private $data;
    private $em;

    /**
     * 
     * @param type $em entity manager
     * @param type $data criteres de la recherche
     */
    public function __construct($em, $data) {
        $this->data = $data;
        $this->em = $em;
    }

    /**
     * 
     * @return type renvoie les exemplaires correspondant aux criteres de la recherche sous forme de tableau
     */
    public function getExemplaires() {
        
        //on écrit une requête préparée en fonction des critères de recherche
        $sql = "SELECT * FROM edition AS e
                INNER JOIN parution AS p ON e.ref_parution = p.id
                INNER JOIN exemplaire AS ex ON ex.ref_edition = e.id
                INNER JOIN parution_auteur AS p_a ON p_a.ref_parution = p.id
                INNER JOIN auteur AS a ON a.id = p_a.ref_auteur
                INNER JOIN sous_categorie AS s_c ON s_c.id = p.ref_sous_categorie
                INNER JOIN categorie AS c ON c.id = s_c.ref_categorie
                INNER JOIN type_parution AS t ON t.id = p.ref_type_parution
                WHERE ";
        //tableau des variables a bind dans la reqete préparée
        $tBindValue = array();
        if($this->data['titre']!==null)
        {
            $sql .= "p.titre LIKE :titre AND ";
            $tBindValue['titre'] = "%{$this->data['titre']}%";
        }
        if($this->data['auteur']!==null)
        {
            $sql .= "(CONCAT(a.nom, ' ', a.prenom) LIKE :nom_prenom "
            . "OR CONCAT(a.prenom, ' ', a.nom)  LIKE :prenom_nom ) AND ";
            $tBindValue['nom_prenom'] = "%{$this->data['auteur']}%";
            $tBindValue['prenom_nom'] = "%{$this->data['auteur']}%";
        }
        if($this->data['type']!==null)
        {
            $sql .= "t.libelle LIKE :type AND ";
            $tBindValue['type'] = "%{$this->data['type']}%";
        }
        if($this->data['categorie']!==null)
        {
            $sql .= "c.intitule LIKE :categorie AND ";
            $tBindValue['categorie'] = "%{$this->data['categorie']}%";
        }
        if($this->data['date']!==null)
        {
            $date = strftime("%Y-%m-%d", $this->data['date']->getTimestamp() );
            $sql .= "e.date = :date AND ";
            $tBindValue['date'] = $date;
        }
        if($this->data['isDispo']!==null)
        {
            if($this->data['isDispo']==='yes')
                $sql .= "ex.is_dispo = 1 AND ";
            elseif($this->data['isDispo']==='no')
                $sql .= "ex.is_dispo = 0 AND ";
        }
        $sql .= " 1 = 1;";
        
        $statement = $this->em->getConnection()->prepare($sql);
        foreach ($tBindValue as $k => $v)
        {
            $statement->bindValue($k, $v);
        }
        $statement->execute();
        return $statement->fetchAll();
    }

}
