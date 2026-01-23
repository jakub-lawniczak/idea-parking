@extends('/layouts/main')
@yield('title', 'Idea with id =' . $idea->id )

<div>
    <ul>
        <li>{{ $idea->id }}</li>
        <li><b><a href="{{ route('ideas.single', [$idea->id]) }}">{{ $idea->title }}</a></b></li>
        <li>{{ $idea->description }}</li>
        <li>{{ $idea->category }}</li>
        <li>{{ $idea->created_at }}</li>
    </ul>
</div>
