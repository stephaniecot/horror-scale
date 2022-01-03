<x-layout>
    <header>
        <div class='video-banner'>
            <video class='video-content' autoplay muted loop>
                <source src="{{URL::asset("/images/smoke-1.mp4")}}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <div class='heading'>
            <h1>We like heavy stuff</h1>
        </div>

    </header>
    <main>
        <section>
            <div class='container'>
                <h2 class='heading-secondary'>Members top pick</h2>
                <div class="cards-container">
                    <div class="card">
                        <h3>title</h3>
                        <p>text</p>
                        <span>vote</span>
                    </div>
                    <div class="card">

                    </div>
                    <div class="card">

                    </div>
                </div>
            </div>
        </section>

    </main>
</x-layout>
