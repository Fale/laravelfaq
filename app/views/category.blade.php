<ul>
    @foreach($category->faqs as $faq)
        <li>{{ link_to( '/' . $faq->path, $faq->question) }}</li>
    @endforeach
</ul>
