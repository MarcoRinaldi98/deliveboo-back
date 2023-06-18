<div class="d-flex flex-column flex-shrink-0 p-2 bg-body-tertiary border-end">
    <div class="sidebar_top">
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="{{route('admin.dashboard')}}" class="nav-link {{Route::currentRouteName() == 'admin.dashboard'?'active':''}}">
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.restaurants.index')}}" class="nav-link @if (Route::currentRouteName() == 'admin.restaurants.index') active @endif">
            Restaurant
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.types.index')}}" class="nav-link @if (Route::currentRouteName() == 'admin.types.index') active @endif">
            Type
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.dishes.index')}}" class="nav-link @if (Route::currentRouteName() == 'admin.dishes.index') active @endif">
            Dish
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.restaurants.create')}}" class="nav-link @if (Route::currentRouteName() == 'admin.restaurants.create') active @endif">
            New Restaurant
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.types.create')}}" class="nav-link @if (Route::currentRouteName() == 'admin.types.create') active @endif">
            New Type
          </a>
        </li>
      </ul>
    </div>
</div>