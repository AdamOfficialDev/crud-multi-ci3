<div class="container col-md-8 mt-4">
    <?= $this->session->flashdata('msg') ?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h3 class="font-italic">Daftar Pengguna</h3>
                </div>
                <!-- <div class="col">
                    <a href="<?= base_url('User/add') ?>" class="btn btn-primary float-right">Add</a>
                </div> -->
            </div>
        </div>
        <div class="card-body">
            <table id="example" class="table table-bordered table-hover" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['role'] ?></td>
                            <td>
                                <a href="<?= base_url('User/delete/') . $user['id'] ?>" class="badge badge-pill badge-danger delete-btn">Delete</a> |
                                <a href="<?= base_url('User/edit/') . $user['id'] ?>" class="badge badge-pill badge-success">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                </thead>
            </table>
        </div>
    </div>
    <!-- Footer -->
    <footer class="fixed-bottom">
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            Copyright © <?= date('Y') ?> : 
            <a class="text-reset fw-bold" href="https://www.youtube.com/adamerzchannel/" target="_black">Adam Official YouTube</a>
        </div>
    </footer>
</div>

<!-- DataTable -->
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            lengthChange: false,
            responsive: true,
            buttons: ['copy', 'excel', 'pdf']
        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- SweetAlert -->
<script>
    $(document).ready(function() {
        $('.delete-btn').on('click', function(e) {
            e.preventDefault();
            var deleteUrl = $(this).attr('href');
            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus data ini?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus data!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = deleteUrl;
                }
            });
        });
    });
</script>

<style>
    .btn, .form-control-sm {
        border-radius: 50px;
    }
</style>
