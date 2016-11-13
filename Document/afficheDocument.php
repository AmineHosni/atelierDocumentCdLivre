<meta charset="utf-8"> 
<link rel="stylesheet" type="text/css" href="../styleTableau.css">

<table>
   <tr>
       <th>Référence</th>
       <th>Nom</th>
       <th>Date</th>
       <th>Prix</th>
       <th>Auteur</th>
   </tr>

   <tr>

    <?php
    include("Document.php"); // pour pouvoir utiliser l'objet Document
    include("../config.php");

      $c = new config();
      $conn = $c->getConnexion();

      /*$doc = new Document("d","a",2016-10-8,"d","dff");
      $result = $doc->afficherDocument($conn);*/
      $result =Document::afficherDocument($conn);

      foreach ($result as $r) {
       ?>
        <tr>
          <td><?php echo $r[0] ?></td>
          <td><?php echo $r[1] ?></td>
          <td><?php echo $r[2] ?></td>
          <td><?php echo $r[3] ?></td>
          <td><?php echo $r[4] ?></td>
          <td><a href="suppDocument.php?r=<?php echo $r[0]; ?>" onclick="return confirm('Êtes-vous sûre ?')" ><input type="button" value="Supprimer"></a></td>
          <td><a href="modifDocument.php?r=<?php echo $r[0]; ?>&amp;n=<?php echo $r[1]; ?>&amp;d=<?php echo $r[2]; ?>
            &amp;p=<?php echo $r[3]; ?>&amp;a=<?php echo $r[4]; ?>"><input type="button" value="Modifier"></a></td>


        </tr>
        <?php
      }
?>

   </tr>
   
</table>
      
      
      <nav>
        <ul>
          <li><a href="rechercheDocument.php" target="_blank">Recherche Document</a></li>
          <li><a href="ajoutDocument.html" target="_blank">Ajouter Document</a></li>
          <li><a href="../CD/ajoutCD.html" target="_blank">Ajouter CD</a></li>
          <li><a href="../Livre/ajoutLivre.html" target="_blank">Ajouter Livre</a></li>
          <li><a href="../CD/afficheCD.php" target="_blank">Afficher Liste des CD</a></li>
          <li><a href="../Livre/afficheLivre.php" target="_blank">Afficher Liste des Livres</a></li>
        </ul>
      </nav>
      