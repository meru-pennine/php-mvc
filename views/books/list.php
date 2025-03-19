<?php ob_start(); ?>
<div class="content-header">
    <h2>Book List</h2>
    <a class="btn btn-default" href="<?= BASE_URL ?>/book/add/">Add Book</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Published Year</th>
            <th>Genre</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if( !empty($books)){
                foreach ($books as $key => $book) { 
                $key = $key + 1;
                ?>
                <tr>
                    <th>#<?php echo $key ?></th>
                    <td><?php echo $book['title'] ?></td>
                    <td><?php echo $book['author'] ?></td>
                    <td><?php echo $book['publisher'] ?></td>
                    <td><?php echo $book['published_year'] ?></td>
                    <td><?php echo $book['genre'] ?></td>
                    <td>
                        <a href="<?php echo BASE_URL .'/book/delete/'. $book['id'] ?>/"><span class="glyphicon glyphicon-trash"></span></a>
                        <a href="<?php echo BASE_URL .'/book/edit/'. $book['id'] ?>/"><span class="glyphicon glyphicon-edit"></span></a>
                    </td>
                </tr>
            <?php } } else{ ?>
            <tr>
                <td style="text-align: center;"  colspan="7">No book found!</td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php $content = ob_get_clean(); ?>
<?php require 'views/layout.php'; ?>
