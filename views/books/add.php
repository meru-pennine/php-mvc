<?php ob_start(); ?>
<div class="content-header">
    <h2>New Book</h2>
    <a class="btn btn-default" href="<?= BASE_URL ?>/book/">Book List</a>
</div>


  <form method="post" action="<?= BASE_URL ?>/book/create/" class=" book-form">
      <div class="form-group">
        <div class="input-container">
           <input type="text" class="form-control" id="title" name="title" required>
          <label for="title">Book Title</label>
          <div class="border-line"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="input-container">
          <input type="text" class="form-control" id="author" name="author"  required>
          <label for="author">Author</label>
          <div class="border-line"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="input-container">
          <input type="text" class="form-control" id="publisher" name="publisher"  required>
          <label for="publisher">Publisher</label>
          <div class="border-line"></div>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group half">
          <div class="input-container">
            <input type="number" class="form-control" id="published_year" name="published_year" min="1900" max="<?= date('Y') ?>" required>
            <label for="year">Published Year</label>
            <div class="border-line"></div>
          </div>
        </div>

        <div class="form-group half">
          <div class="input-container">
            <input type="text" class="form-control" id="genre" name="genre"  required>
            <label for="genre">Genre</label>
            <div class="border-line"></div>
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
<?php $content = ob_get_clean(); ?>
<?php require 'views/layout.php'; ?>
