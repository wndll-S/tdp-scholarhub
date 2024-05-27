@include('partials.admin_header')

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="/admin/applications">
                <span data-feather="home"></span>
                Applications
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/scholars">
                <span data-feather="file"></span>
                Scholars
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/schools">
                <span data-feather="shopping-cart"></span>
                Schools
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="users"></span>
                Documents
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Announcements
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="layers"></span>
                Logs
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Current month
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Last quarter
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button>
          </div>
        </div>

        <!--
        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
        -->

      </main>
      <div class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          <div class="row gx-* gy-*">
              <div class="col-md-4 bg-light text-dark rounded border border-dark">
                  <h2 class="display-4 text-dark fw-semibold p-5 text-center  ">Data Here!</h2>
              </div>
              <div class="col-md-4 bg-light text-dark rounded border border-dark">
                  <h2 class="display-4 text-dark fw-semibold p-5 text-center  ">Data Here!</h2>
              </div>
              <div class="col-md-4 bg-light text-dark rounded border border-dark">
                  <h2 class="display-4 text-dark fw-semibold p-5 text-center  ">Data Here!</h2>
              </div>
              <div class="col-md-4 bg-light text-dark rounded border border-dark">
                  <h2 class="display-4 text-dark fw-semibold p-5 text-center  ">Data Here!</h2>
              </div>
              <div class="col-md-4 bg-light text-dark rounded border border-dark">
                  <h2 class="display-4 text-dark fw-semibold p-5 text-center  ">Data Here!</h2>
              </div>
              <div class="col-md-4 bg-light text-dark rounded border border-dark">
                  <h2 class="display-4 text-dark fw-semibold p-5 text-center  ">Data Here!</h2>
              </div>
              <div class="col-md-4 bg-light text-dark rounded border border-dark">
                  <h2 class="display-4 text-dark fw-semibold p-5 text-center  ">Data Here!</h2>
              </div>
              <div class="col-md-4 bg-light text-dark rounded border border-dark">
                  <h2 class="display-4 text-dark fw-semibold p-5 text-center  ">Data Here!</h2>
              </div>
              <div class="col-md-4 bg-light text-dark rounded border border-dark">
                  <h2 class="display-4 text-dark fw-semibold p-5 text-center  ">Data Here!</h2>
              </div>
          </div>
      </div>
    </div>
  </div>


  <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-DBjhmceckmzwrnMMrjI7BvG2FmRuxQVaTfFYHgfnrdfqMhxKt445b7j3KBQLolRl"
    crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js"
    integrity="sha384-EbSscX4STvYAC/DxHse8z5gEDaNiKAIGW+EpfzYTfQrgIlHywXXrM9SUIZ0BlyfF"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
    integrity="sha384-i+dHPTzZw7YVZOx9lbH5l6lP74sLRtMtwN2XjVqjf3uAGAREAF4LMIUDTWEVs4LI"
    crossorigin="anonymous"></script>
  <script src="dashboard.js"></script>

@include('partials.footer')