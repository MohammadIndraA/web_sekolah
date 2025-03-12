<ul class="side-nav">

    <li class="side-nav-item">
        <a href="/dashboard" class="side-nav-link">
            <i class="uil-home-alt"></i>
            <span> Dashboards </span>
        </a>
    </li>
    <li class="side-nav-title side-nav-item">Managemen</li>

    <li class="side-nav-item">
        <a href="/jurusans" class="side-nav-link">
            <i class="uil-books"></i>
            <span>Jurusan </span>
        </a>
    </li>
    <li class="side-nav-title side-nav-item">Berita</li>

    <li class="side-nav-item">
        <a href="/beritas" class="side-nav-link">
            <i class="uil-newspaper"></i>
            <span>Berita </span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="/tag-berita" class="side-nav-link">
            <i class="uil-sim-card"></i>
            <span>Tag</span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="/kategori-berita" class="side-nav-link">
            <i class="uil-keyboard-hide"></i>
            <span>Kategori </span>
        </a>
    </li>
    <li class="side-nav-title side-nav-item">Event</li>

    <li class="side-nav-item">
        <a href="/events" class="side-nav-link">
            <i class="uil-focus-target"></i>
            <span>Event </span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="/daftar-sekolah" class="side-nav-link">
            <i class="dripicons-graduation"></i>
            <span>Daftar Sekolah </span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="/daftar-peserta" class="side-nav-link">
            <i class="uil-users-alt"></i>
            <span>Daftar Peserta </span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="/kategori-lomba" class="side-nav-link">
            <i class="uil-sitemap"></i>
            <span>Kategori Lomba </span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="/gambar-lomba" class="side-nav-link">
            <i class="uil-comment-image"></i>
            <span>Gambar Lomba </span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="/tamus" class="side-nav-link">
            <i class="uil-wrap-text"></i>
            <span>Daftar Tamu </span>
        </a>
    </li>

    <li class="side-nav-title side-nav-item">Setting</li>

    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#manajemenReferensi" aria-expanded="false" aria-controls="manajemenReferensi"
            class="side-nav-link">
            <i class="uil-clipboard-alt"></i>
            <span>Manajemen</span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="manajemenReferensi">
            <ul class="side-nav-second-level">
                <li>
                    <a href="/banner">Banner</a>
                </li>
                <li>
                    <a href="/abouts">About</a>
                </li>
                <li>
                    <a href="/settings">Settings</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="side-nav-item">
        {{-- @can('view-user') --}}
        <a href="/users" class="side-nav-link">
            <i class="dripicons-user-group"></i>
            <span>Users</span>
        </a>
    </li>
    {{-- @endcan --}}
    @can('view-permission')
        <a href="/permissions" class="side-nav-link">
            <i class="uil-lock-access"></i>
            <span>Permissions</span>
        </a>
    @endcan
    {{-- @can('view-role') --}}
    <li class="side-nav-item">
        <a href="/roles" class="side-nav-link">
            <i class="uil-gold"></i>
            <span>Roles </span>
        </a>
    </li>
    {{-- @endcan --}}
    <li class="side-nav-item mt-4">
        <hr>
        <a href="/logout" class="side-nav-link">
            <i class="dripicons-user-group"></i>
            <span> Logput </span>
        </a>
    </li>

</ul>
