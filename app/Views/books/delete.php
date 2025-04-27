<h2>Are you sure you want to delete "<?= esc($book['title']) ?>"</h2>
<form action="/library/confirm/<?= esc($book['id']) ?>" method="post" style="display:inline;">
    <?= csrf_field() ?>
    <button type="submit" class="yes">Yes</button>
</form>
<a href="/library" class="no">No</a>

<style>
    .yes {
  border: 2px solid green;
  color: green;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  margin-left: 70px;
  cursor: pointer;
}

.no {
  border: 2px solid red;
  color: red;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  margin-left: 50px;
  cursor: pointer;
}
</style>