<section id="main-content" class="clearfix">
<h2>List genre</h2>

<p><a href="?view=genre_add" class="cart-btn">Add genre</a></p>
<table cellspacing="1" class="tabl">
    <tr>
        <th class="numGenre">N</th>
        <th class="strName">Name</th>
        <th class="str_action">Action</th>
    </tr>
<?php $i=1; ?>
<?php foreach($getgenre as $genre): ?>
    <tr class="qwer">
        <td class="nomer"><?=$i?></td>
        <td class="nameGanre"><?=$genre['genre_title']?></td>
        <td  class="genreaction"><a href="?view=genre_edit&amp;genre_id=<?=$genre['genre_id']?>">edit</a>&nbsp; | &nbsp;<a href="?view=genre_del&amp;genre_id=<?=$genre['genre_id']?>" class="delGenre" onclick="return confirmDelete();">delete</a></td>
    </tr>

<?php $i++; ?>
<?php endforeach; ?>
</table>
</section>