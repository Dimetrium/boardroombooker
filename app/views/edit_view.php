<section id="main-content" class="clearfix">
    <h2>Edit book</h2>
    <hr/>
    <form action="" method="POST" enctype="multipart/form-data">
        <p>
            <label>
                <h4>Book name
                    <input type="text" name="book_title" value="<?= htmlspecialchars( $product[ 'book_title' ] ) ?>">
                </h4>
            </label>
        </p>
        <p>
            <label>
                <h4>Price
                    <input type="text" name="price" value="<?= $product[ 'price' ] ?>">
                </h4>
            </label>
        </p>
        <table id="table_reg">
            <tr>
                <th>
                    <Label for='glist[]'><p id="btngenre">

                        <h4>Add genre</h4></p></Label>
                    <select multiple size="5" name="glist[]" class="btngenre">
                        <?php foreach ( $genres as $genre ): ?>
                            <option><?= $genre[ 'genre_title' ] ?></option>
                        <?php endforeach; ?>
                    </select>
                </th>
                <th>
                    <Label for='alist[]'><p id="btnauthor">

                        <h4>Add author</h4></p></Label>
                    <select multiple size="5" name="alist[]" class="btnauthor">
                        <?php foreach ( $authors as $author ): ?>
                            <option><?= $author[ 'author_title' ] ?></option>
                        <?php endforeach; ?>
                    </select>
                </th>
                <th>
                    <div class="authors_reg">
                        <p>

                        <h4>Delete author</h4></p>

                        <?php foreach ( $authors as $author ): ?>
                            <p>
                                <input type='checkbox' name='alistA[]' value='$alist'><?= $author[ 'author_title' ] ?>
                            </p>
                        <?php endforeach; ?>

                    </div>
                </th>
                <th>
                    <div class="genre_reg">
                        <p>

                        <h3>Delete genre</h3></p>
                        <?php foreach ( $genres as $genre ): ?>
                            <p>
                                <input type='checkbox' name='alistA[]' value='$alist'><?= $genre[ 'genre_title' ] ?>
                            </p>
                        <?php endforeach; ?>
                    </div>
                </th>
            </tr>
        </table>
        <div class="reviews"></div>
        <p><label for="full_text"><h4>Description</h4></label></p>
        <textarea name="full_text" cols="94" rows="20" id="full_text"><?= $product[ 'full_text' ] ?></textarea>

        <div>
            <p>
                <input type="submit" name="submit" value="Save" id="submitMail">
            </p>
        </div>
    </form>
</section>