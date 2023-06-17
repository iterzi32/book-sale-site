<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('admin.index')}}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('product.index')}}">
                    <span class="bi bi-book-half"></span>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('customer.index')}}">
                    <span  class="align-text-bottom"><i class="bi bi-people-fill"></i></span>
                    Customers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('category.index')}}">
                    <span class="align-text-bottom"><i class="fa fa-list-ul"></i></span>
                    Categories
                </a>
            </li>
        </ul>
    </div>
</nav>

