<?php ob_start(); ?>
<table class="table table-sm">
<thead>
    <tr>
        <th>id</th>
        <th>Nom</th>
        <th>Genre</th>
        <th>Prix</th>
        <th>Cat</th>
        <th>Bruit</th>
        <th>Action</th>
        
    </tr>
</thead>
<?php 
// href='dashboard_updateoiseau?id=".$oiseau['id']."'
    while($oiseau = $data->fetch()){
        echo "<tr class='ligne-livre' data-bgmouseover='lightblue' data-bgmouseout='white' data-oiseau=".$oiseau['id']." data-selected='0'>
                <td>".$oiseau['id']."</td>
                <td>".$oiseau['nom']."</td>
                <td>".$oiseau['genre']."</td>
                <td>".$oiseau['prix']."</td>
                <td>".$oiseau['cat']."</td>
                <td>".$oiseau['bruit']."</td>
                
                <td>
                    <button class='btn btn-sm btn-outline-secondary btn-sm btn-action-c' data-idanimal='".$oiseau['id']."' data-action='0' > ... </button>
                    <a class='btn btn-sm btn-outline-secondary btn-sm btn-action-c' href='dashboard_updateoiseau?id=".$oiseau['id']."' data-idanimal='".$oiseau['id']."'  data-action='1'> <img src''> </a>
                    <a class='btn btn-sm btn-outline-secondary btn-sm btn-action-c' href='dashboard_deleteoiseau?id=".$oiseau['id']."' data-idanimal='".$oiseau['id']."'   data-action='2'> - </a>
                </td>
        
        </tr>";
    }
?>
</table>

<?php $content=ob_get_clean(); ?>