<aside class="sidebar">
    <div class="brand">Sintesa</div>
    <ul style="list-style: none; padding-left: 0; margin: 0;">
        <li><a href="/siswa" class="nav-link {{ request()->is('siswa*') ? 'active' : '' }}">Data Siswa</a></li>
        <li><a href="/absensi" class="nav-link {{ request()->is('absensi*') ? 'active' : '' }}">Absensi</a></li>
    </ul>
</aside>