<?php ob_start(); ?>
<div class="content-header">
    <h2>New Book</h2>
    <a class="btn btn-default" href="<?= BASE_URL ?>/book/">Book List</a>
</div>


<form method="post" action="<?= BASE_URL ?>/book/update/" class="form-horizontal">
	<input type="hidden" name="id" value="<?php echo $record['id'] ?>">
      <div class="form-group">
        <div class="input-container">
            <input type="text" class="form-control input" id="title" name="title" required value="<?php echo $record['title'] ?>">
          <label for="title">Book Title</label>
          <div class="border-line"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="input-container">
          <input type="text" class="form-control" id="author" name="author" required value="<?php echo $record['author'] ?>">
          <label for="author">Author</label>
          <div class="border-line"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="input-container">
          <input type="text" class="form-control" id="publisher" name="publisher" required value="<?php echo $record['publisher'] ?>">
          <label for="publisher">Publisher</label>
          <div class="border-line"></div>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group half">
          <div class="input-container">
           <input type="number" class="form-control" id="published_year" name="published_year" min="1900" max="<?= date('Y') ?>" required value="<?php echo $record['published_year'] ?>">
            <label for="year">Published Year</label>
            <div class="border-line"></div>
          </div>
        </div>

        <div class="form-group half">
          <div class="input-container">
            <input type="text" class="form-control" id="genre" name="genre" required value="<?php echo $record['genre'] ?>">
            <label for="genre">Genre</label>
            <div class="border-line"></div>
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Update Book</button>
    </form>
<?php $content = ob_get_clean(); ?>
<?php require 'views/layout.php'; ?>
