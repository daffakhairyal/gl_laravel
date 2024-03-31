<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/summernote/summernote-bs4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  @include('partials.navbar')

  @include('partials.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mt-5">
  @yield('container')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="https://github.com/daffakhairyal">Daffa Khairy Almayrizq</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<!-- jQuery -->

<script src="{{ asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('lte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $("#detail").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('accounts.search') }}",
                    dataType: "json",
                    data: {
                        query: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            minLength: 2,
            response: function(event, ui) {
                // Menghapus konten sebelumnya dari dropdown
                $('#detail-dropdown').empty();
                
                // Menambahkan hasil pencarian ke dalam dropdown
                $.each(ui.content, function(index, item) {
                    // Membuat tautan yang dapat diklik dengan judul hasil pencarian
                    var link = $('<a>')
                        .addClass('dropdown-item')
                        .attr('href', '#')
                        .text(item.label)
                        .click(function() {
                            // Ketika tautan diklik, isi input detail dengan nilai hasil pencarian
                            $('#detail').val(item.label);
                        });

                    // Menambahkan tautan ke dalam dropdown
                    $('#detail-dropdown').append(link);
                });
            }
            // Jumlah karakter minimum sebelum pencarian dimulai
        });
    });
</script>




<script>
    $(document).ready(function() {
        var count = $("#tableBody tr").length > 0 ? $("#tableBody tr").length : 1;

        // Mengecek apakah tabel memiliki data saat halaman dimuat
        if ($("#tableBody tr").length > 0) {
            // Jika tabel memiliki data, kunci input nomor voucher, jenis, dan tanggal
            $("#noVoucher").prop('readonly', true);
            $("#jenis").prop('disabled', true);
            $("#tanggal").prop('readonly', true);
        }

        // Ketika tombol "Add" diklik
        $("#addMore").click(function() {
            var newRow = $("<tr>");
            var cols = "";

            // Menambahkan nomor urut
            cols += '<td>' + count + '</td>';

            // Menambahkan nomor voucher dari input field
            cols += '<td>' + $("#noVoucher").val() + '</td>';

            // Tambahkan kolom-kolom tambahan sesuai kebutuhan
            cols += '<td>' + $("#detail").val() + '</td>';
            cols += '<td>' + $("#account").val() + '</td>';
            cols += '<td>' + $("#jenis").val() + '</td>';
            cols += '<td>' + $("#tanggal").val() + '</td>';
            cols += '<td>' + $("#karyawan").val() + '</td>';
            cols += '<td>' + $("#divisi").val() + '</td>';
            cols += '<td>' + $("#deskripsi").val() + '</td>';
            cols += '<td>' + $("#debit").val() + '</td>';
            cols += '<td>' + $("#credit").val() + '</td>';
            cols += '<td>' + $("#createdBy").val() + '</td>';
            cols += '<td><div><button class="btn btn-primary btn-sm btn-edit"><i class="fas fa-pen mr-1"></i></button><button class="ml-2 btn btn-danger btn-sm btn-delete"><i class="fas fa-trash-alt mr-1"></i></button></div></td>';

            // Menambahkan kolom-kolom ke dalam baris baru
            newRow.append(cols);

            // Menambahkan baris baru ke dalam tabel
            $("#tableBody").append(newRow);

            // Menambahkan 1 ke nomor urut
            count++;

            // Bersihkan input fields
            $("#detail").val('');
            $("#account").val('');

            // Periksa apakah tabel memiliki data
            if ($("#tableBody tr").length === 0) {
                // Jika tabel kosong, input nomor voucher, jenis, dan tanggal tetap terbuka untuk diedit
                $("#noVoucher").prop('readonly', false);
                $("#jenis").prop('disabled', false); // Mengaktifkan select jenis
                $("#tanggal").prop('readonly', false);
            } else {
                // Jika tabel memiliki data, kunci input nomor voucher, jenis, dan tanggal
                $("#noVoucher").prop('readonly', true);
                $("#jenis").prop('disabled', true); // Menonaktifkan select jenis
                $("#tanggal").prop('readonly', true);
            }

            return false;
        });

        // Ketika tombol "Delete" di klik
        $("#tableBody").on("click", ".btn-delete", function() {
            $(this).closest("tr").remove();
            updateCount(); // Update nomor urut setelah dihapus

            // Periksa apakah tabel kosong setelah dihapus
            if ($("#tableBody tr").length === 0) {
                // Jika tabel kosong, buka kunci input nomor voucher, jenis, dan tanggal
                $("#noVoucher").prop('readonly', false);
                $("#jenis").prop('disabled', false); // Mengaktifkan select jenis
                $("#tanggal").prop('readonly', false);
            }
        });

        // Ketika tombol "Edit" di klik
        $("#tableBody").on("click", ".btn-edit", function() {
            // Ambil data dari baris tabel dan isi ke dalam form
            var row = $(this).closest("tr");
            $("#noVoucher").val(row.find("td:eq(1)").text());
            $("#detail").val(row.find("td:eq(2)").text());
            $("#account").val(row.find("td:eq(3)").text());
            $("#jenis").val(row.find("td:eq(4)").text());
            $("#tanggal").val(row.find("td:eq(5)").text());
            $("#karyawan").val(row.find("td:eq(6)").text());
            $("#divisi").val(row.find("td:eq(7)").text());
            $("#deskripsi").val(row.find("td:eq(8)").text());
            $("#debit").val(row.find("td:eq(9)").text());
            $("#credit").val(row.find("td:eq(10)").text());
            $("#createdBy").val(row.find("td:eq(11)").text());

            // Tampilkan tombol "Apply Changes" disebelah tombol "Add"
            $("#applyChanges").show();
        });

        // Ketika tombol "Apply Changes" di klik
        $("#applyChanges").click(function() {
            // Ambil data dari form dan isi kembali ke dalam baris tabel yang sedang diedit
            var row = $("#tableBody").find("tr").eq(count - 2);
            row.find("td:eq(1)").text($("#noVoucher").val());
            row.find("td:eq(2)").text($("#detail").val());
            row.find("td:eq(3)").text($("#account").val());
            row.find("td:eq(4)").text($("#jenis").val());
            row.find("td:eq(5)").text($("#tanggal").val());
            row.find("td:eq(6)").text($("#karyawan").val());
            row.find("td:eq(7)").text($("#divisi").val());
            row.find("td:eq(8)").text($("#deskripsi").val());
            row.find("td:eq(9)").text($("#debit").val());
            row.find("td:eq(10)").text($("#credit").val());
            row.find("td:eq(11)").text($("#createdBy").val());

            // Sembunyikan tombol "Apply Changes" setelah selesai
            $(this).hide();
        });

        // Function untuk mengupdate nomor urut setelah dihapus
        function updateCount() {
            $("#tableBody tr").each(function(index) {
                $(this).find("td:eq(0)").text(index + 1);
            });
            count = $("#tableBody tr").length + 1; // Update count sesuai jumlah data yang tersisa
        }
    });
</script>



<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('lte/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('lte/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('lte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('lte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('lte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('lte/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('lte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{ asset('lte/dist/js/demo.js')}}"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('lte/dist/js/pages/dashboard.js')}}"></script>
<script>
    $(document).ready(function() {
        $('input[name="table_search"]').on('input', function() {
            var keyword = $(this).val().toLowerCase().trim();

            // Menampilkan hanya baris yang cocok dengan keyword
            $('table tbody tr').each(function() {
                var rowText = $(this).text().toLowerCase();
                if (rowText.includes(keyword)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>



</body>
</html>
