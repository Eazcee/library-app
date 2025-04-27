<h2>Edit Book</h2>

<a href="/library"><button class="button">Back to List of Books</button></a>
</h2>

<form action="/library/update/<?= esc($book['id']) ?>" method="post">
    <?= csrf_field()?>

    <label for="title">Title</label>
    <input type="text" name = "title" value="<?= set_value('title', $book['title']) ?>">
    <br>

    <label for="author">Author</label>
    <input type="text" name = "author" value="<?= set_value('author', $book['author'])?>">
    <br>

    <label for="genre">Genre</label>
    <input type="text" name = "genre" value="<?= set_value('genre', $book["genre"])?>">
    <br>


    <label for="publication_year">Year</label>
    <input type ="number" name="publication_year" value="<?= set_value('publication_year', $book['publication_year'])?>">
    <br>

    <input class = "submit" input type = "submit" name="submit" value="Update Book">

</form>