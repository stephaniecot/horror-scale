<x-layout>
    <section>
        <header>
            <h1 class='heading'>Add a post</h1>
        </header>

        <div class="container">
            <div class="post-form">

                <form method="POST" action="/create" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label for="title">Title</label>
                        <input type="text" name='title' id='title' value='{{old('title')}}'>
                        @error('title')
                        <span class="error-msg">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="author">Author</label>
                        <input type="text" name='author' id='author' placeholder='Movie Director, Book Author, Podcast Host, etc.' value='{{old('author')}}'>
                        @error('author')
                        <span class='error-msg'>{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="year">Year</label>
                        <input type="text" name='year' id='year' placeholder='Original Release Date'value='{{old('year')}}'>
                        @error('year')
                        <span class='error-msg'>{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file" name="thumbnail" id="thumbnail" value='{{old('thumbnail')}}'>
                        @error('thumbnail')
                        <span class='error-msg'>{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="category">Category</label>
                        <select name="category_id" id='category_id'>
                            @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : ''}}>
                                {{ ucwords($category->name) }}
                            </option>
                            @endforeach
                        </select>
                        @error('category')
                        <span class='error-msg'>{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="summary">Summary</label>
                        <textarea name="summary" rows="5"
                            placeholder="Write a small plot summary">{{old('summary')}}</textarea>

                        @error('summary')
                        <span class='error-msg'>{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        @can('admin')
                        <label for="active">
                            Online
                        </label>
                        <select name="active" id="active">
                            <option value='1'>Yes</option>
                            <option value='0' selected>No</option>
                        </select>
                        @error('active')
                        <span class='error-msg'>{{ $message }}</span>
                        @enderror
                        @endcan
                    </div>

                    <div>
                        <button class='submit-button' type="submit">Submit</button>
                    </div>
            </div>

        </div>
    </section>


</x-layout>
