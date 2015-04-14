<section id="main-content" class="clearfix">
  <h2>Add New Book</h2>
<form action="" method="POST" enctype="multipart/form-data">
<p><label><h4>Book name
<input type="text" name="book_title"></h4></label></p>
<p><label><h4>Price <input type="text" name="price" value="<?=$_SESSION['book_add']['price']?>"></h4></label></p>
  <table id="table_reg">
    <tr>
        <th>
        <Label for='genre_title'><p id="btngenre"><h3>Genre</h3></p></Label>
        <select multiple required size="5" name="genre_title" class="btngenre">
        <?php foreach($genres as $genre): ?>
        <option><?=$genre['genre_title']?></option>
        <?php endforeach; ?>
        </select>
        </th>
        <th>
        <Label for='author_title'><p id="btnauthor"><h3>Author</h3></p></Label>
        <select multiple required size="5" name="author_title" class="btnauthor">
        <?php foreach($authors as $author): ?>
        <option><?=$author['author_title']?></option>
        <?php endforeach; ?>
        </select>
        </th>
    </tr>
  </table>
<p><label for="full_text"><h4>Description</h4></label></p>
  <textarea name="full_text" cols="64" rows="20" id="full_text"><?=$_SESSION['book_add']['full_text']?></textarea></p>
  <div><p><input type="submit" name="submit" value="Save" id="submitMail" ></p></div> 
</form>

<?php unset($_SESSION['book_add']['res']); ?>
</section>