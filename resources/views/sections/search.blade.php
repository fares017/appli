<div class="col-md-6">
    <div class="header-search">
        <form action="{{ route('product.search', app()->getLocale() ) }}">  
            <select class="input-select">
                <option value="0">Categories</option>
                @foreach (App\Category::all() as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <input class="input" placeholder="{{ request()->input('search_input') ??  'Entrer le code ou Nom'}}" name="search_input">
            <button class="search-btn">Rechercher</button>
        </form>
    </div>
</div>