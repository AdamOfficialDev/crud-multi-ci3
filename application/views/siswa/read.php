<div class="container col-md-8 mt-4">
    <?= $this->session->flashdata('msg') ?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h3 class="font-italic">Daftar Siswa RPL</h3>
                </div>
                <div class="col">
                    <a href="<?= base_url('Siswa/add') ?>" class="btn btn-primary float-right">Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="example" class="table table-bordered table-hover" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($siswa as $mhs) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $mhs['nama'] ?></td>
                            <td><?= $mhs['kelas'] ?></td>
                            <td><?= $mhs['jurusan'] ?></td>
                            <td>
                                <a href="<?= base_url('Siswa/delete/') . $mhs['id'] ?>" class="badge badge-pill badge-danger delete-btn">Delete</a> |
                                <a href="<?= base_url('Siswa/edit/') . $mhs['id'] ?>" class="badge badge-pill badge-success">Edit</a>
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
            Copyright ©
            <?= date('Y') ?> :
            <a class="text-reset fw-bold" href="https://www.youtube.com/adamerzchannel/" target="_black">Adam Official YouTube</a>
        </div>
        <!-- Copyright -->
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
<!-- Sweataler -->
<script>
    $(document).ready(function() {
        $('.delete-btn').on('click', function(e) {
            e.preventDefault(); //mencegah default action dari tombol hyperlink

            var deleteUrl = $(this).attr('href'); //mendapatkan URL dari hyperlink

            //menampilkan SweetAlert2 konfirmasi
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
                    //jika tombol "Ya, hapus data!" diklik, maka pindah ke URL hapus
                    window.location.href = deleteUrl;
                }
            });
        });
    });
</script>

<style>
    .btn,
    .form-control-sm {
        border-radius: 50px;
    }
</style>