<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('dashboard.index') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
          @if (Auth::user()->id_level == 1)
          <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('user.index')}}">
              <i class="bi bi-circle"></i><span>Users</span>
            </a>
          </li>
          <li>
            <a href="{{route( 'level.index')}}">
              <i class="bi bi-circle"></i><span>Levels</span>
            </a>
          </li>
          <li>
            <a href="{{route( 'customer.index')}}">
              <i class="bi bi-circle"></i><span>Customers</span>
            </a>
          </li>
          <li>
            <a href="{{route('service.index')}}">
              <i class="bi bi-circle"></i><span>Services</span>
            </a>
          </li>
        </ul>
        @endif
        @if (Auth::user()->id_level == 2)
        <li class="nav-item">
        <a class="nav-link collapsed" href="{{route( 'customer.index')}}">
          <i class="bi bi-grid"></i>
          <span>Customers</span>
        </a>
        @endif
      </li><!-- End Components Nav -->
      <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-journal-text"></i><span>Transaction</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @if (Auth::user()->id_level == 1 || Auth::user()->id_level == 2)
                <li>
                    <a href="{{route( 'trans.index')}}">
              <i class="bi bi-circle"></i><span>Trans Order</span>
            </a>
        </li>
        @endif
        @if (Auth::user()->id_level == 3)
        <li>
          <a href="{{route( 'report.index')}}">
            <i class="bi bi-circle"></i><span>Report</span>
          </a>
        </li>
        @endif
        </ul>
      </li><!-- End Forms Nav -->



    </ul>

  </aside><!-- End Sidebar-->
