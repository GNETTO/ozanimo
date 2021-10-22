<?php ob_start(); ?>
<table class="table table-sm">
<thead>
    <tr>
        <th>id</th>
        <th>Nom</th>
        <th>Age</th>
        <th>Taille</th>
        <th>Race</th>
        <th>Prix</th>
        <th>Genre</th>
        <th>Action</th>
        
    </tr>
</thead>
<?php 
// href='dashboard_updatechien?id=".$chien['id']."'
    while($chien = $data->fetch()){
        echo "<tr class='ligne-livre' data-bgmouseover='lightblue' data-bgmouseout='white' data-chien=".$chien['id']." data-selected='0'>
                <td>".$chien['id']."</td>
                <td>".$chien['nom']."</td>
                <td>".$chien['age']."</td>
                <td>".$chien['taille']."</td>
                <td>".$chien['race']."</td>
                <td>".$chien['prix']."</td>
                <td>".$chien['genre']."</td>
                <td>
                    <button class='btn btn-sm btn-outline-secondary btn-sm btn-action-c' data-idanimal='".$chien['id']."' data-action='0' > ... </button>
                    <a class='btn btn-sm btn-outline-secondary btn-sm btn-action-c' href='dashboard_updatechien?id=".$chien['id']."' data-idanimal='".$chien['id']."'  data-action='1'> <img src''> </a>
                    <a class='btn btn-sm btn-outline-secondary btn-sm btn-action-c' href='dashboard_deletechien?id=".$chien['id']."' data-idanimal='".$chien['id']."'   data-action='2'> - </a>
                </td>
        
        </tr>";
    }
?>
</table>

<?php $content=ob_get_clean(); ?>