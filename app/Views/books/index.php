<?php if ($book_list !== []): ?>
    <?php if (session()->getFlashdata('success')): ?>
    <div id="success-message">
        <?= session()->getFlashdata('success') ?>
    </div>

    <script>
        // Redirect after 2 seconds (2000 ms)
        setTimeout(function() {
            window.location.href = '/library';
        }, 2000);
    </script>
<?php endif; ?>



    <a href="http://localhost:8080/library/new">
    <button class="button">Create Book</button></a>
    <table style = "width:60%" border="1" cell padding = "8" cellspacing="0">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($book_list as $book_item): ?>
            <tr>
                <td>
                        <a href="/library/<?= esc($book_item['slug'], 'url') ?>">
                        <?= esc($book_item['title']) ?>
                    </a>
                </td>
                <td><?= esc($book_item['author']) ?></td>
                <td><?= esc($book_item['genre']) ?></td>
                <td><?= esc($book_item['publication_year']) ?></td>
                <td><a href="/library/edit/<?= esc($book_item['id']) ?>"><button class="edit-button">Edit</button></a></td>
            </tr>
            <?php endforeach ?>

        </tbody>
    </table>


<?php else: ?>

    <h3>No Books</h3>

    <p>Unable to find any Books for you.</p>

<?php endif ?>

<style>
.button {
  border: none;
  color: green;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.edit-button {
  border: 2px solid blue;
  background: white;
  color: blue;
  padding: 5px 10px;
  font-size: 14px;
  width: 70px;
  cursor: pointer;
}
</style>