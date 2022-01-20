<x-layout>
    <header>
        <h1 class="heading">
            Edit Post : {{$post->title}}
        </h1>
    </header>
    <section>
        <div class='container'>
            <div class="general-form">

                <form action='/admin/posts/{{ $post->id }}' method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label for="title">Title</label>
                        <input type="text" name='title' id='title' value="{{$post->title}}" }}'>
                    </div>
                    @error('title')
                    <span class="error-msg">{{ $message }}</span>
                    @enderror
                    <div>
                        <label for="author">Author</label>
                        <input type="text" name='author' id='author' value="{{$post->author}}" }}'>
                    </div>
                    @error('author')
                    <span class="error-msg">{{ $message }}</span>
                    @enderror
                    <div>
                        <label for="year">Year</label>
                        <input type="text" name='year' id='year' value="{{$post->year}}" }}'>
                    </div>
                    @error('year')
                    <span class="error-msg">{{ $message }}</span>
                    @enderror
                    <div class='img-form'>
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file" name="thumbnail" id="thumbnail" value="{{$post->thumbnail}}">
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" width='150'>

                    </div>
                    @error('thumbnail')
                    <span class="error-msg">{{ $message }}</span>
                    @enderror
                    <div>
                        <label for="category">Category</label>
                        <select name="category_id" id='category_id'>
                            @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>
                                {{ ucwords($category->name) }}
                            </option>
                            @endforeach
                        </select>

                    </div>
                    @error('category')
                    <span class="error-msg">{{ $message }}</span>
                    @enderror
                    <div>
                        <label for="summary">Summary</label>
                        <textarea name="summary" rows="5" placeholder="Give me a summary">{{$post->summary}}</textarea>


                    </div>
                    @error('summary')
                    <span class="error-msg">{{ $message }}</span>
                    @enderror
                    <div>
                        @can('admin')
                        <label for="active">
                            Online
                        </label>

                        <select name="active" id="active">
                            @if ($post->active == 1)
                            <option value='1' selected>Yes</option>
                            <option value='0'>No</option>
                            @else
                            <option value='1'>Yes</option>
                            <option value='0' selected>No</option>
                            @endif
                        </select>
                        @error('active')
                        <span class="error-msg">{{ $message }}</span>
                        @enderror
                        @endcan
                    </div>
                    <div>
                        <button class='submit-button' type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>
