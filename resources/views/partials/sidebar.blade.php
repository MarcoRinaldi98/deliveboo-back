<div class="d-flex flex-column flex-shrink-0 p-2 bg-body-tertiary border-end sidebar">
    <div class="sidebar_top">
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="{{route('admin.dashboard')}}" class="nav-link {{Route::currentRouteName() == 'admin.dashboard'?'active':''}}">
            Ristorante
          </a>
        </li>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.dishes.index')}}" class="nav-link @if (Route::currentRouteName() == 'admin.dishes.index') active @endif">
            Piatti
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.orders.index')}}" class="nav-link @if (Route::currentRouteName() == 'admin.orders.index') active @endif">
            Ordini
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.dishes.create')}}" class="nav-link @if (Route::currentRouteName() == 'admin.dishes.create') active @endif">
            Nuovo Piatto
          </a>
        </li>
      </ul>
    </div>
</div>