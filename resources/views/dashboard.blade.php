<x-layout>

    <header><h1 class='heading'>My Account</h1></header>
    <section>

        <div class="container">
            <h2>Welcome back {{ Auth::user()->username}}</h2>


            
                    <a class='small-link' href="/favorites">My favorites</a>

                    @can('admin')
                    <a class='small-link' href="/admin/posts">Manage posts</a>
                    @endcan

        </div>

    </section>
</x-layout>
