<section id="my-sidebartop" class="mt-3">
    <ul class="nav d-flex flex-row justify-content-center align-items-center nav-pills my-1">
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
        <li class="nav-item">
            <a href="http://127.0.0.1:8000/admin/statistics"
                class="nav-link @if (Route::currentRouteName() == 'admin.statistics.index') active @endif">
                Statistiche
            </a>
        </li>
    </ul>
</section>
