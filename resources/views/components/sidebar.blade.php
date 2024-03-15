<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Grocery</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown ">
                <a href="{{ route('users.index') }}" class=" nav-link"><i class="fas fa-user"></i><span>Users</span></a>
            </li>
            <li class="nav-item dropdown ">
                <a href="{{ route('products.index') }}" class=" nav-link"><i class="fas fa-file"></i><span>Product</span></a>
            </li>
            <li class="nav-item dropdown ">
                <a href="{{ route('targets.index') }}" class=" nav-link"><i class="fas fa-file"></i><span>Target</span></a>
            </li>
            <li class="nav-item dropdown ">
                <a href="{{ route('businesses.index') }}" class=" nav-link"><i class="fas fa-file"></i><span>Business</span></a>
            </li>
    </aside>
</div>