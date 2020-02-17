<?php
require_once('Database.php');
class donnees_acu extends database
{
    private $_query;
    private $_result;

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @param string correspond au(x) méridien(s) recherché(s)
     * @param string correspond à la(aux) pathologie(s) recherchée(s)
     * @param string correspond à la(aux) caractéristique(s) recherchée(s)
     * @param string correspond au mot-clef de la recherche
     * Cette fonction fait une recherche en prenant en compte à la fois les filtres et le mot-clef,
     * De plus, on peut rechercher selon plusieurs valeurs de filtres
     */
    public function recherche($meridien,$pathologie,$caracteristiques,$mot_clef)
    {   
    
        $array = [ $meridien , $pathologie , $caracteristiques];
        $flag_mot_clef = false;
        $my_str = "SELECT P.mer,P.type,P.desc,S.desc FROM patho P LEFT JOIN symptPatho SP ON P.idP = SP.idP LEFT JOIN symptome S ON S.idS = SP.idS LEFT JOIN keySympt KS ON S.idS = KS.idS LEFT JOIN keywords K ON KS.idK = K.idK ";   
        if (!($mot_clef ==""))
        {
            $my_str = $my_str."WHERE K.name = '".$mot_clef."'";
            $flag_mot_clef = true;
        }
        foreach ($array as $key => $value)
        {
            if (!(empty($value)))
            {
            if ($flag_mot_clef)
            {
                $my_str = $my_str." AND ( ";
            }
            else
            {
                $my_str = $my_str."WHERE ( ";
                $flag_mot_clef = true;
            }
            foreach ( $value as $table => $choix) {
                if ($key == 0)
                {
                    $my_str = $my_str." mer LIKE '%".$choix."%' OR ";
                }
                elseif ($key == 1)
                {
                    if ($choix == "mv")
                    {
                        $my_str = $my_str." P.mer = 'RM' OR P.mer = 'DM' OR "; //Merveilleux vaisseaux se gère à part car il se teste sur le méridien
                    }
                    else
                    {
                        $my_str = $my_str. " P.type LIKE '".$choix."%' OR ";
                    }
                }
                else
                {
                    $my_str = $my_str." P.desc LIKE '%".$choix."%' OR ";
                }
            }
            $my_str = substr($my_str,0,-4);
            $my_str = $my_str." ) ";
            }
        }
        #$my_str=substr($my_str,0,0);
        //echo $my_str;
        $_query = $this->_pdo->query($my_str);
        $_result = $_query->execute();
        $ma_table=[];
        while ( $row = $_query->fetch())
        {   
            $ma_table[]=$row; 
        }
        return $ma_table;
    }
}
?>