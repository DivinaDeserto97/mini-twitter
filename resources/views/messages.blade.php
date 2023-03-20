<!--extend layout master.blade.php -->
@extends('layouts.master')

<!--sets value for section title to "Mini Twitter" (section title is used as yield in messages.blade.php) -->
@section('title', 'Mini Twitter')


<!--starts section content, defines the title for the section and also defines some html for section content
(html is between section... and endsection) section content is used as yield in messages.blade.php) -->
@section('content')



    <h2>Recent messages:</h2>
    <ul>
        <!-- loops through the $messages, that this blade template
                           gets from MessageController.php. for each element of the loop which
                           we call $message we print the properties (title, content
                           and created_at in an <li> element -->

        @foreach ($messageList as $message)
            <li>
                <b>
                    <!-- this link to the message details is created dynamically
                                and will point to /messages/1 for the first message -->
                    <a href="/message/{{ $message->id }}">{{ $message->title }}:</a>
                    @if (@isset($message->like))
                        <span>{{ $message->like }}</span>
                    @endif

                </b><br>
                {{ $message->content }}<br>
                @if (@isset($message->created_at))
                    {{ $message->created_at->diffForHumans() }}
                @endif
            </li>
            <form action="/create" method="post">
                <input type="button" name="like" value="0" style="display: none;">
            </form>
        @endforeach

    </ul>


    <h2>Create new message: </h2>


    <form action="/create" method="post">
        <input type="text" name="title" placeholder="Title"><br>
        <input type="text" name="content" placeholder="Content"><br>
        <input type="number" name="like" value="0" style="display: none;">
        <!-- this blade directive is necessary for all form posts somewhere in between
                               the form tags -->
        @csrf
        <button type="submit">Submit</button>
    </form>

    @hello(Lara Shout)

@endsection
