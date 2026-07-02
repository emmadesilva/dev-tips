{{-- The Post Page Layout --}}
@extends('hyde::layouts.app')
@section('content')

    <main id="content" class="mx-auto max-w-7xl py-16 px-8">
        @include('hyde::components.post.article')

        <footer @class(['post-article mx-auto', config('markdown.prose_classes', 'prose dark:prose-invert')])>
            <p class="text-sm">
                Noticed a mistake in the article?
                <a href="https://github.com/emmadesilva/dev-tips/edit/master/_posts/{{ $page->getIdentifier() }}.md">Suggest an edit</a>!
            </p>
        </footer>
    </main>

@endsection
