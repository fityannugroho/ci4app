<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-3">
    <?= $this->include('layout/alert'); ?>
    <div class="row">
        <div class="col">
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <h1>My Books</h1>
                <a href="<?= base_url('/books/add'); ?>" class="btn btn-primary">
                    <i class="material-icons">add</i>
                    <span>Add Book</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <form action="" method="get">
                <div class="input-group mb-3">
                    <button class="btn btn-outline-primary" type="submit" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Search">
                        <i class="material-icons">search</i>
                    </button>
                    <input type="text" class="form-control" name="keyword" placeholder="Search book by title, writer, or publisher" value="<?= $keyword; ?>" required>
                    <a href="<?= base_url('/books'); ?>" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Reset Search">
                        <i class="material-icons">clear</i>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <?php if (sizeof($books) > 0) : ?>
                    <div class="responsive-table">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Cover</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 + ($rowEachPage * ($currentPage - 1)) ?>
                                <?php foreach ($books as $book) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><img src="/db/<?= $book['cover']; ?>" width="100" alt="book_cover" class=".book-cover"></td>
                                        <td><?= $book['title']; ?></td>
                                        <td>
                                            <a href="<?= base_url("/books/$book[slug]"); ?>" class="btn btn-success">
                                                <i class="material-icons">description</i>
                                                <span>Details</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?= $pager->links('book', 'books_pagination'); ?>
                <?php else : ?>
                    <p class="p-3 border bg-light">There are no book.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
