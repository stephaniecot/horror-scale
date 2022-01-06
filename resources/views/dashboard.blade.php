<x-layout>


    <section>
        <header><h1 class='heading'>My Account</h1></header>
        <div class="container">
            <h2>Welcome back {{ Auth::user()->username}}</h2>


            <ul>
                <li>
                    <a href="/favorites">My favorites</a>
                </li>
                <li>
                    @can('admin')
                    <a href="/admin/posts">Manage posts</a>
                    @endcan
                </li>
            </ul>
        </div>

    </section>
</x-layout>
