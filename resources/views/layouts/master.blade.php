<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - MIRO SAP</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Miro SAP</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
          <div class="row">
            <label for="balance" class="col-sm-2 col-form-label col-form-label-sm text-light fw-bold" style="width: 60px">Balance</label>
            <div class="col-sm-5">
              <input type="text" name="balance" class="form-control form-control-sm" id="balance" value="0" readonly style="width:200px">
            </div>
          </div>
        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{route('actionLogout')}}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
          <div class="sb-sidenav-menu">
            <div class="nav">
              <div class="sb-sidenav-menu-heading">Core</div>
              <a class="nav-link @yield('index_active')" href="{{route('SAP.index')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
              </a>
              <a class="nav-link @yield('tablelist_active')" href="{{route('tablelist')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Table List
              </a>
              </div>
            </div>
          </nav>
        </div>
        <div id="layoutSidenav_content">
          @yield('content')
          <footer class="py-4 bg-light mt-auto">
              <div class="container-fluid px-4">
                  <div class="d-flex align-items-center justify-content-between small">
                      <div class="text-muted">Copyright &copy; MIRO SAP 2022</div>
                  </div>
              </div>
          </footer>
        </div>
      </div>
      @foreach($items as $item)
        @include('components.modal-upload-file')
        @include('components.modal-list-file')
      @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{asset('js/datatables-simple-demo.js')}}"></script>
		<script src="{{ asset('/js/bootstrap5-dropdown-ml-hack.js') }}"></script>
    @yield('search_script')
    <script>
      function getAmountValue(){
        const taxAmount = document.getElementById("taxAmount").value;
        const amount = document.getElementById("amount").value;
        const balance = document.getElementById("balance")
        const saveBtn = document.getElementById("save-btn");
        let totalAmountItem = Number(document.getElementById("totalAmount").value);

        const formatIDR = (number)=>{
          return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR"
          }).format(number);
        }

        let totalAmountHeader = Number(amount) + Number(taxAmount)

        totalAmountItem = totalAmountItem + (0.1 * totalAmountItem)
        balance.value = formatIDR(totalAmountHeader - totalAmountItem)

        if(balance.value < 0){
          saveBtn.setAttribute("disabled",'')
        }

        const referenceAmount = document.getElementById("reference_amount").innerText;
        console.log(balance.value)
      }
    </script>
  </body>
</html>
