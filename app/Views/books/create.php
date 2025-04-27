<h2><?= esc($title) ?>
<a href="/library"><button class="button">Back to List of Books</button></a>
</h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/library/create" method="post">

    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input type="text" name="title" value="<?= set_value('title') ?>">
    <br>

    <label for="author">Author</label>
    <input type = "text" name="author" value="<?= set_value('author') ?>">
    <br>

    <label for="genre">Genre</label>
    <input type="text" name="genre" value="<?=set_value('genre') ?>">
    <br>

    <label for="publication_year">Publication Year</label>
    <input type="number" name= "publication_year" value="<?= set_value('publication_year') ?>">
    <br>

    <input class="submit" type="submit" name="submit" value="Create Book">

</form>


<style>
.submit {
  border: 2px solid green;
  color: green;
  padding: 15px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  width: 200px;
}

/*styles the typing box*/
input[type="text"] {
    width: 193px;
}

input[type="number"] {
    width: 193px;
}


label {
    text-align: left;
    display: block; /* block is needed for text-align to work properly */
}


.button {
  border: 2px solid green;
  color: green;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12x;
  margin: 4px 2px;
  margin-left: 100px;
  cursor: pointer;
}

</style>