<!--begin::Sidebar-->
<aside class="app-sidebar bg-white shadow">
  <!--begin::Sidebar Brand-->
  <div class="sidebar-brand">
      <!--begin::Brand Link-->
      <a href="{{ route('dashboard') }}" class="brand-link">
          <!--begin::Brand Image-->
          <img src="{{ asset('assets/img/AdminLTELogo.png') }}" 
               alt="AdminLTE Logo" 
               class="brand-image opacity-75 shadow"/>
          <!--end::Brand Image-->
          <!--begin::Brand Text-->
          <span class="brand-text fw-light text-dark">Weightless Childern</span>
          <!--end::Brand Text-->
      </a>
      <!--end::Brand Link-->
  </div>
  <!--end::Sidebar Brand-->

  <!--begin::Sidebar Wrapper-->
  <div class="sidebar-wrapper">
      <nav class="mt-2">
          <!--begin::Sidebar Menu-->
          <ul class="nav sidebar-menu flex-column text-dark" 
              data-lte-toggle="treeview" 
              role="menu" 
              data-accordion="false">
              <p>Menu</p>

              <!-- Exercises Link -->
              <li class="nav-item">
                  <a href="{{ route('dashboard') }}" class="nav-link text-dark">
                      <i class="nav-icon bi bi-list-ul"></i>
                      <p>
                          Overview
                          <i class="nav-arrow bi bi-chevron-right"></i>
                      </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('exercises.index') }}" class="nav-link text-dark">
                      <i class="nav-icon bi bi-list-ul"></i>
                      <p>
                          Exercises
                          <i class="nav-arrow bi bi-chevron-right"></i>
                      </p>
                  </a>
              </li>

              <!-- Gyms Link -->
              <li class="nav-item">
                  <a href="{{ route('gyms.index') }}" class="nav-link text-dark">
                      <i class="nav-icon bi bi-list-ul"></i>
                      <p>
                          Gyms
                          <i class="nav-arrow bi bi-chevron-right"></i>
                      </p>
                  </a>
              </li>

              <!-- Doctors Link -->
              <li class="nav-item">
                  <a href="{{ route('doctors.index') }}" class="nav-link text-dark">
                      <i class="nav-icon bi bi-list-ul"></i>
                      <p>
                          Doctors List
                          <i class="nav-arrow bi bi-chevron-right"></i>
                      </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('foodsystem.index') }}" class="nav-link text-dark">
                      <i class="nav-icon bi bi-list-ul"></i>
                      <p>
                          Food System
                          <i class="nav-arrow bi bi-chevron-right"></i>
                      </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('subscriber.index') }}" class="nav-link text-dark">
                      <i class="nav-icon bi bi-list-ul"></i>
                      <p>
                         Subscribers
                          <i class="nav-arrow bi bi-chevron-right"></i>
                      </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('contact.index') }}" class="nav-link text-dark">
                      <i class="nav-icon bi bi-list-ul"></i>
                      <p>
                        Messages
                          <i class="nav-arrow bi bi-chevron-right"></i>
                      </p>
                  </a>
              </li>

          <!--end::Sidebar Menu-->
          </ul>
      </nav>
  </div>
  <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
