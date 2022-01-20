<x-layout>
    <header>
        <h1 class='heading'>Manage Posts</h1>
    </header>
    <main>
        <section>
            <div class="container">
                <div class="manage-posts-container">

                    <table>
                        <tbody>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            @foreach ($posts as $post)
                            <tr>
                                <td>
                                    {{$post->title}}
                                </td>

                                <td>
                                    {{$post->author}}
                                </td>
                                <td>
                                    {{ucwords($post->category->name)}}
                                </td>

                                <td>

                                    @if ($post->active == 1)
                                    <span class='online-span'>
                                        Online
                                    </span>

                                    @else
                                    <span class='offline-span'>
                                        Offline
                                    </span>
                                    @endif
                                </td>

                                <td>
                                    <a class='small-link' href="/admin/posts/{{$post->id}}/edit">Edit</a>
                                </td>
                                <td>

                                    <form action="/admin/posts/{{ $post->id }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button class='delete-button' type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                {{ $posts->links() }}
            </div>
        </section>
    </main>
    @include('components.message')
</x-layout>
