<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="mb-4">
                <h1>Book Details</h1>
                <a href="<?= base_url('/books'); ?>" class="btn btn-outline-secondary btn-sm">
                    <i class="material-icons">arrow_back</i>
                    <span>Back to list</span>
                </a>
            </div>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 book-cover">
                        <img src="/assets/images/<?= $book['cover']; ?>" class="img-fluid rounded-start" alt="book_cover_<?= $book['slug']; ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $book['title']; ?></h5>
                            <table class="table">
                                <tr>
                                    <th>Writer</th>
                                    <td><?= $book['writer']; ?></td>
                                </tr>
                                <tr>
                                    <th>Publisher</th>
                                    <td><?= $book['publisher']; ?></td>
                                </tr>
                            </table>
                            <!-- <p class="card-text"></p> -->
                            <p class="card-text"><small class="text-muted">Last updated on <?= $book['updated_at']; ?></small></p>
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="" class="btn btn-warning">
                                    <i class="material-icons">edit</i>
                                    <span>Edit</span>
                                </a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmBookDeletion">
                                    <i class="material-icons">delete</i>
                                    <span>Delete</span>
                                </button>

                                <!-- Confirm Book Deletion Modal -->
                                <div class="modal fade" id="confirmBookDeletion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Delete This Book?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to delete this book?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                                                <form action="<?= base_url("/books/$book[id]"); ?>" method="post">
                                                    <?= csrf_field(); ?>

                                                    <!-- Using HTTP Method Spoofing -->
                                                    <input type="hidden" name="_method" value="DELETE">

                                                    <button type="submit" class="btn btn-danger">
                                                        <span>Yes, Delete it</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
