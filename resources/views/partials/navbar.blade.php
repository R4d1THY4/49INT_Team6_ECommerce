<style>
    .team-navbar {
        background: rgba(255, 255, 255, 0.88);
        backdrop-filter: blur(6px);
        border-bottom: 2px solid #ffffff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        padding: 12px 24px;
        margin-bottom: 24px;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        font-family: "Comic Sans MS", "Comic Sans", sans-serif;
    }

    .team-navbar-brand {
        font-weight: bold;
        font-size: 18px;
        color: #d98bb3 !important;
        text-decoration: none !important;
        margin: 0 !important;
    }

    .team-navbar-links {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .team-navbar-links a {
        text-decoration: none !important;
        color: #4a90b8 !important;
        font-weight: bold;
        font-size: 14px;
        padding: 6px 14px;
        border-radius: 999px;
        border: 1px solid transparent;
        margin: 0 !important;
        transition: all 0.2s ease;
    }

    .team-navbar-links a:hover {
        background: rgba(107, 174, 214, 0.15);
        border-color: #6baed6;
    }

    .team-navbar-links a.active {
        background: linear-gradient(to right, #6baed6, #d98bb3);
        color: #ffffff !important;
    }

    .team-navbar-user {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13px;
        color: #555;
    }

    .team-navbar-logout {
        background: #d98bb3;
        color: #ffffff;
        border: none;
        border-radius: 999px;
        padding: 6px 14px;
        font-family: inherit;
        font-size: 13px;
        font-weight: bold;
        cursor: pointer;
    }

    .team-navbar-logout:hover {
        background: #c7749f;
    }
</style>

<nav class="team-navbar">
    <a href="{{ route('dashboard') }}" class="team-navbar-brand">Team 6 E-Commerce</a>

    <div class="team-navbar-links">
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('catalog.index') }}" class="{{ request()->routeIs('catalog.*') ? 'active' : '' }}">Catalog</a>
        <a href="{{ route('customers.index') }}" class="{{ request()->routeIs('customers.*') ? 'active' : '' }}">Customers</a>
        <a href="{{ route('vouchers.index') }}" class="{{ request()->routeIs('vouchers.*') ? 'active' : '' }}">Vouchers</a>
        <a href="{{ route('shipments.index') }}" class="{{ request()->routeIs('shipments.*') ? 'active' : '' }}">Shipments</a>
    </div>

    @auth
        <div class="team-navbar-user">
            <span>Hi, {{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" class="team-navbar-logout">Logout</button>
            </form>
        </div>
    @endauth
</nav>