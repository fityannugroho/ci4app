<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h1>My Books</h1>
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
                    <?php $i = 1; ?>
                    <?php foreach ($books as $book) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><img src="/assets/images/<?= $book['cover']; ?>" width="100" alt="book_cover" class=".book-cover"></td>
                            <td><?= $book['title']; ?></td>
                            <td>
                                <a href="<?= base_url("/books/$book[slug]"); ?>" class="btn btn-success">Details</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
