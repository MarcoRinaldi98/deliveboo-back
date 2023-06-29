<section id="my-sidebarleft" class="d-none d-lg-flex flex-column flex-shrink-0 p-2 sidebar">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                Il Mio Ristorante
            </a>
        </li>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.dishes.index') }}" class="nav-link @if (Route::currentRouteName() == 'admin.dishes.index') active @endif">
                Lista Piatti
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.dishes.create') }}"
                class="nav-link @if (Route::currentRouteName() == 'admin.dishes.create') active @endif">
                Aggiungi Nuovo Piatto
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.orders.index') }}"
                class="nav-link @if (Route::currentRouteName() == 'admin.orders.index') active @endif">
                Lista Ordini
            </a>
        </li>
    </ul>
</section>
