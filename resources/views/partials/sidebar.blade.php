<aside class="left-sidebar">
  
  <div>
    <div class="brand-logo d-flex align-items-center justify-content-between p-4  text-white">
      <div class="text-center w-100">
        <h5 class="mb-0 fw-bold ">
          <i class="ti ti-user-circle fs-5 me-2"></i>
          {{ Auth::check() ? Auth::user()->name : 'Guest' }}
        </h5>
        <small class="text-black mt-3.5">
          <i class="ti ti-shield-check fs-4 me-1"></i>
          {{ ucfirst(Auth::check() ? Auth::user()->role : 'Guest') }}
        </small>
      </div>
      <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-8 text-white"></i>
      </div>
    </div>
    
    
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
      <ul id="sidebarnav">
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
          <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('home') }}" aria-expanded="false">
            <span>
              <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
            </span>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>
        
        <!-- Staff Section -->
        @if(Auth::check() && Auth::user()->role === 'staff')
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
            <span class="hide-menu">STAFF</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('product.index') }}" aria-expanded="false">
              <span>
                <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Products</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('transaction.index') }}" aria-expanded="false">
              <span>
                <iconify-icon icon="solar:file-text-bold-duotone" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Transactions</span>
            </a>
          </li>
        @endif
        
        @if(Auth::check() && Auth::user()->role === 'user')
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
            <span class="hide-menu">MENU</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('product.index') }}" aria-expanded="false">
              <span>
                <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Products</span>
            </a>
          </li>
        @endif
        <!-- Admin Section -->
        @if(Auth::check() && Auth::user()->role === 'admin')
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
            <span class="hide-menu">ADMIN</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('category.index') }}" aria-expanded="false">
              <span>
                <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Category</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('product.index') }}" aria-expanded="false">
              <span>
                <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Products</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('transaction.index') }}" aria-expanded="false">
              <span>
                <iconify-icon icon="solar:file-text-bold-duotone" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Transactions</span>
            </a>
          </li>
        @endif
        
        <!-- My Profile Link di Sidebar -->
        @if(Auth::check())
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
            <span class="hide-menu">ACCOUNT</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('profile.show') }}" aria-expanded="false">
              <span>
                <iconify-icon icon="solar:user-bold-duotone" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">My Profile</span>
            </a>
          </li>
        @endif
        
        
        <li class="sidebar-item">
          <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button type="submit" class="sidebar-link bg-red-600" style="border: none; background: none; cursor: pointer; width: 100%; text-align: left; padding: 12px 20px;">
              <span>
                <iconify-icon icon="solar:logout-3-bold-duotone" class="fs-6"></iconify-icon>
              </span>
              <span class="hide-menu">Logout</span>
            </button>
          </form>
        </li>
        
      </ul>
    </nav>
  </div>
</aside>