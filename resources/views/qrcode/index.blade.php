<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mesquita | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vendor/adminlte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="img/logo.png" alt="" class="brand-image " style="opacity: .8; width: 100px">
        <span class="brand-text font-weight-light">Mesquita</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>

          </div>3
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="pages/widgets.html" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Dashboard
                  <!-- <span class="right badge badge-danger"></span>New -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('qrcode') }}" class="nav-link {{ request()->is('catraca*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>Catraca</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/widgets.html" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Guarda Volume
                  <!-- <span class="right badge badge-danger"></span>New -->
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Relatórios
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./index.html" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Semanal</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./index2.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mensal</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./index3.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Diario</p>
                  </a>
                </li>
              </ul>

            </li>

            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Cadastros
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('filiais') }}" class="nav-link {{ request()->is('filiais*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Filiais</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('produtos.index') }}"
                    class="nav-link {{ request()->is('produtos*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Produtos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('formapagamento.index') }}" class="nav-link">
                    <i class="fas fa-money-bill nav-icon"></i>
                    <p>Formas de Pagamento</p>
                  </a>
                </li>

              </ul>
            </li>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- Total QR Codes -->
            <div class="col-lg-3 col-6">
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $totalQRCodes }}</h3>
                  <p>Total de QR Codes</p>
                </div>
                <div class="icon">
                  <i class="ion ion-qr-scanner"></i> <!-- Ícone relacionado a QR Codes -->
                </div>

              </div>
            </div>
            <!-- Usados -->
            <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $qrcodesUsados }}</h3>
                  <p>QR Codes Usados</p>
                </div>
                <div class="icon">
                  <i class="ion ion-checkmark-circled"></i>
                </div>

              </div>
            </div>
            <!-- Disponíveis -->
            <div class="col-lg-3 col-6">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ $qrcodesDisponiveis }}</h3>
                  <p>QR Codes Disponíveis</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-box-outline"></i>
                </div>

              </div>
            </div>
            <!-- Espaço para mais algum dado se quiser -->
            <div class="col-lg-3 col-6">
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{ $totalQRCodes - $qrcodesUsados - $qrcodesDisponiveis }}</h3>
                  <p>Outros Status</p>
                </div>
                <div class="icon">
                  <i class="ion ion-alert-circled"></i>
                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="text-end my-3">
          <button type="button" id="btnAbrirModalQrCode" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Gerar Novo QR Code
          </button>

        </div>
<button class="btn btn-primary">Azul</button>
<button class="btn btn-secondary">Grafite</button>
<button class="btn btn-info">Laranja Queimado</button>
<button class="btn btn-dark">Preto</button>

        <!-- Modal -->
        <!-- Modal -->
        <div class="modal fade" id="modalQrCode" tabindex="-1" aria-labelledby="modalQrCodeLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form id="formQrCode">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalQrCodeLabel">Gerar Novo QR Code</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                  @csrf

                  <!-- Filial -->
                  <div class="mb-3">
                    <label for="idfilial" class="form-label">Filial</label>
                    <select id="idfilial" name="idfilial" class="form-select" required>
                      <option value="" disabled selected>Selecione a filial</option>
                      @foreach($filiais as $filial)
              <option value="{{ $filial->id }}">{{ $filial->nome }}</option>
            @endforeach
                    </select>
                  </div>

                  <!-- Produto -->
                  <div class="mb-3">
                    <label for="idproduto" class="form-label">Produto</label>
                    <select id="idproduto" name="idproduto" class="form-select" required>
                      <option value="" disabled selected>Selecione o produto</option>
                      @foreach($produtos as $produto)
              <option value="{{ $produto->id }}" data-valor="{{ $produto->valor }}">
              {{ $produto->nome }} - R$ {{ number_format($produto->valor, 2, ',', '.') }}
              </option>
            @endforeach
                    </select>
                  </div>

                  <!-- Valor -->
                  <div class="mb-3">
                    <label for="valor" class="form-label">Valor</label>
                    <input type="text" id="valor" name="valor" class="form-control" readonly>
                  </div>

                  <!-- Desconto -->
                  <div class="mb-3">
                    <label for="desconto" class="form-label">Desconto</label>
                    <input type="number" id="desconto" name="desconto" class="form-control" value="0" min="0"
                      step="0.01">
                  </div>

                  <!-- Acréscimo -->
                  <div class="mb-3">
                    <label for="acrescimo" class="form-label">Acréscimo</label>
                    <input type="number" id="acrescimo" name="acrescimo" class="form-control" value="0" min="0"
                      step="0.01">
                  </div>

                  <!-- Valor a pagar -->
                  <div class="mb-3">
                    <label for="valorapagar" class="form-label">Valor Total a Pagar</label>
                    <input type="text" id="valorapagar" name="valorapagar" class="form-control" readonly>
                  </div>

                  <!-- Forma de Pagamento -->
                  <div class="mb-3">
                    <label for="formadepagamento" class="form-label">Forma de Pagamento</label>
                    <select id="formadepagamento" name="formadepagamento" class="form-select" required>
                      <option value="" disabled selected>Selecione a forma de pagamento</option>
                      @foreach($formasPagamento as $forma)
              <option value="{{ $forma->nome }}">{{ $forma->nome }}</option>
            @endforeach
                    </select>
                  </div>

                  <div id="resultadoQrCode" class="text-center"></div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Gerar</button>
                </div>
              </div>
            </form>

          </div>
        </div>
        <!-- Modal de aviso caixa não aberto -->
        <div class="modal fade" id="modalAvisoCaixa" tabindex="-1" aria-labelledby="modalAvisoCaixaLabel"
          aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalAvisoCaixaLabel">Aviso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
              </div>
              <div class="modal-body">
                Não existe caixa aberto ainda.
              </div>
              <div class="modal-footer">
                <a href="{{ url('caixa/abrir') }}" class="btn btn-success">Abrir Caixa</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Fim Modal -->
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>QRcode</th>
              <th>Status</th>
              <th>Usuario</th>
              <th>Produto</th>
              <th>valor</th>
              <th>Data de Uso</th>
              <th>Criado em</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($qrcodes as $qr)
          <tr>
            <td>
            <button class="btn-custom" onclick="imprimirQRCode('qrcode-{{ $qr->id }}')">Imprimir</button>
            </td>
            <td>
            @if ($qr->used_at)
          <span class="badge badge-danger">Usado</span>
        @else
          <span class="badge badge-success">Disponível</span>
        @endif
            </td>
            <td>{{ $qr->user->name ?? '---' }}</td>
            <td>{{ $qr->produto->descricao ?? '---' }}</td>
            <td>R$ {{ number_format($qr->produto->valor ?? 0, 2, ',', '.') }}</td>
            <td>{{ $qr->used_at ? \Carbon\Carbon::parse($qr->used_at)->format('d/m/Y H:i') : '---' }}</td>
            <td>{{ $qr->created_at ? $qr->created_at->format('d/m/Y H:i') : '---' }}</td>
          </tr>
      @endforeach
          </tbody>

        </table>
    </div>









    <!-- right col -->
  </div>
  <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>

  <script>
    // Se você tiver vários botões e quiser passar o ID do produto para o select do modal
    document.querySelectorAll('.botao-produto').forEach(botao => {
      botao.addEventListener('click', function () {
        const produtoId = this.dataset.produtoId;
        document.querySelector('#produto_id').value = produtoId;
      });
    });
  </script>
  <!-- ./wrapper -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


  <!-- DataTables Config -->
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

  <script>
    function imprimirQRCode(elementId) {
      const qrContent = document.getElementById(elementId).innerHTML;
      const printWindow = window.open('', '', 'width=300,height=300');
      printWindow.document.write(`
        <html>
            <head>
                <title>Imprimir QR Code</title>
                <style>
                    body { text-align: center; padding: 30px; font-family: Arial, sans-serif; }
                </style>
            </head>
            <body>
                ${qrContent}
                <script>
                    window.onload = function () {
                        window.print();
                        window.onafterprint = function () {
                            window.close();
                        };
                    };
                <\/script>
            </body>
        </html>
    `);
      printWindow.document.close();
    }
    $(document).ready(function () {
      $('#btnAbrirModalQrCode').click(function (e) {
        e.preventDefault();

        $.ajax({
          url: '/api/verificar-caixa-aberto',
          method: 'GET',
          success: function (response) {
            if (response.aberto) {
              $('#modalQrCode').modal('show');
            } else {
              $('#modalAvisoCaixa').modal('show');
            }
          },
          error: function () {
            alert('Erro ao verificar o caixa. Tente novamente.');
          }
        });
      });
    });

  </script>
  <script>
  $(document).ready(function() {
    $('#idproduto').on('change', function() {
      const valor = $('option:selected', this).data('valor');
      $('#valor').val(parseFloat(valor).toFixed(2));
      calcularTotal();
    });

    $('#desconto, #acrescimo').on('input', function() {
      calcularTotal();
    });

    function calcularTotal() {
      const valor = parseFloat($('#valor').val()) || 0;
      const desconto = parseFloat($('#desconto').val()) || 0;
      const acrescimo = parseFloat($('#acrescimo').val()) || 0;
      const total = (valor - desconto + acrescimo).toFixed(2);
      $('#valorapagar').val(total);
    }
  });
</script>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="vendor/adminlte/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="vendor/adminlte/dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="vendor/adminlte/dist/js/pages/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script src="{{ asset('js/modal_qrcode.js?v=1.01') }}"></script>

</body>

</html>