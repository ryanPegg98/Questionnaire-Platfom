<div class="fixed">
<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
        <li class="name">
            <h1><a href="#">Questionnaires</a></h1>
        </li>
        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

    <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="right">
            <li><a href="#"><i class="fas fa-user"></i> {{ Auth::user()->name }}</a></li>
            <li><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>

        <!-- Left Nav Section -->
        <ul class="left">
            <li><a href="/admin/questionnaires">Questionnaires</a></li>
        </ul>
    </section>
</nav>
</div>