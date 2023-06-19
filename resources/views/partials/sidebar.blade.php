<div class="d-flex flex-column flex-shrink-0 p-2 bg-body-tertiary border-end">
    <div class="sidebar_top">
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="{{route('admin.dashboard')}}" class="nav-link {{Route::currentRouteName() == 'admin.dashboard'?'active':''}}">
            Dashboard
          </a>
        </li>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.dishes.index')}}" class="nav-link @if (Route::currentRouteName() == 'admin.dishes.index') active @endif">
            Dish
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.dishes.create')}}" class="nav-link @if (Route::currentRouteName() == 'admin.dishes.create') active @endif">
            New Dishes
          </a>
        </li>
      </ul>
    </div>
</div>