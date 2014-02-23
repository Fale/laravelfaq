<h3>Categories</h3>
    <ul>
        @foreach(App\Models\Category::orderBy('name')->get() as $c)
            <li><a href="/{{ $c->path }}">{{ ucfirst($c->name) }}</a> ({{ $c->faqs_number }})</li>
        @endforeach
    </ul>
<h3>Tags</h3>
    <ul>
        @foreach(App\Models\Tag::orderBy('name')->get() as $t)
            <li><a href="/tags/{{ $t->name }}">{{ ucfirst($t->name) }}</a> ({{ $t->faqs_number }})</li>
        @endforeach
    </ul>
