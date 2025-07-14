<h5 class="mb-4"> Menu Admin</h5>
<div class="list-group">

    {{-- Menu Statis --}}
    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">
        Dashboard
    </a>

    <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action">
        Manajemen Pengguna
    </a>

    <a href="{{ route('kategoris.index') }}" class="list-group-item list-group-item-action">
        Manajemen Kategori
    </a>

    <a href="{{ route('infos.index') }}" class="list-group-item list-group-item-action">
        Manajemen Informasi
    </a>

    <a href="#" class="list-group-item list-group-item-action">
        Halaman Statis
    </a>

    <a href="{{ route('galleries.index') }}" class="list-group-item list-group-item-action">
        Galeri
    </a>

    <a href="{{ route('downloads.index') }}" class="list-group-item list-group-item-action">
        File Download
    </a>

    <a href="{{ route('contacts.index') }}" class="list-group-item list-group-item-action">
        Kontak
    </a>

    {{-- Menu Dinamis dari Database --}}
    @if(isset($mainMenus) && $mainMenus->count())
        <hr>
        <h6 class="text-muted ps-2 mt-3">Menu Website</h6>

        @foreach($mainMenus as $menu)
            @if($menu->children->count())
                <div class="list-group-item">
                    <strong>{{ $menu->title }}</strong>
                    <div class="list-group ps-3">
                        @foreach($menu->children as $child)
                            <a href="{{ $child->url ?? '#' }}" class="list-group-item list-group-item-action">
                                {{ $child->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @else
                <a href="{{ $menu->url ?? '#' }}" class="list-group-item list-group-item-action">
                    {{ $menu->title }}
                </a>
            @endif
        @endforeach
    @endif
</div>
