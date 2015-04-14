<section id="main-content" class="clearfix">
    <h2>List author</h2>

<p><a href="?view=author_add" class="cart-btn">Add author</a></p>

<table cellspacing="1" class="tabl">
    <tr>
        <th class="numGenre">N</th>
        <th class="strName">Name</th>
        <th class="str_action">Action</th>
    </tr>
<?php $i=1; ?>
<?php foreach($getauthors as $author): ?>
    <tr class="qwer">
        <td class="nomer"><?=$i?></td>
        <td class="nameGanre"><?=$author['author_title']?></td>
        <td class="genreaction"><a href="?view=author_edit&authors_id=<?=$author['author_id']?>">edit</a>&nbsp; | &nbsp;<a href="?view=author_del&authors_id=<?=$author['author_id']?>" class="delGenre">delete</a></td>
    </tr>

<?php $i++; ?>
<?php endforeach; ?>
</table>