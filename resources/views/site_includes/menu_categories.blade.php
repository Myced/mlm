<ul class="vertical-menu ovic-clone-mobile-menu">

    @foreach($categories as $category)
        <li>
            <a href="{{ route('products.category', ['category' => $category->slug]) }}"
                class="ovic-menu-item-title" title="{{ $category->name }}">
                {{ $category->name }}
            </a>
        </li>
    @endforeach

</ul>
<div class="view-all-categori">
    <a href="#" class="button">All Categories <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
</div>
