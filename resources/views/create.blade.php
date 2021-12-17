<x-layout>
    <section class="py-8 max-w-md mx-auto">
<h1><b>Add a post</b></h1>
    <form method="POST" action="/create" enctype="multipart/form-data">
        @csrf

    <div class="mt-6">
      <label for="title">Title</label>
      <input type="text" name='title' id='title'>
      @error('title')
            <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-6">
        <label for="author">Author</label>
        <input type="text" name='author' id='author'>
        @error('author')
              <span class="text-xs text-red-500">{{ $message }}</span>
          @enderror
      </div>
      <div class="mt-6">
        <label for="year">Year</label>
        <input type="text" name='year' id='year'>
        @error('year')
              <span class="text-xs text-red-500">{{ $message }}</span>
          @enderror
      </div>
      <div class="mt-6">
        <label for="thumbnail">Thumbnail</label>
        <input type="file" name="thumbnail" id="thumbnail">
        @error('thumbnail')
              <span class="text-xs text-red-500">{{ $message }}</span>
          @enderror
      </div>

    <div class="mt-6">
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
            <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-6">
        <label for="summary">Summary</label>
        <textarea
            name="summary"
            class="w-full text-sm focus:outline-none focus:ring"
            rows="5"
            placeholder="Give me a summary"></textarea>

        @error('summary')
            <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-6">
    @can('admin')
    <label for="active">
        Online
    </label>
    <select name="active" id="active">
        <option value='1'>Yes</option>
        <option value='0' selected>No</option>
    </select>
    @error('active')
            <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror
    @endcan
    </div>

    <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
        <button type="submit">Submit</button>
    </div>

    </section>


</x-layout>
