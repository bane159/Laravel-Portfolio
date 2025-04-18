@extends("layouts.main")
@section("content")


<section>
    <div class="container">
        <div class = "row">
            <h1>Admin Dashboard</h1>
            <p>Welcome to the admin dashboard. Here you can manage your application settings.</p>
            <p>Make sure to check the latest updates and notifications.</p>
        </div>
    </div>


</section>


<section>
<div class="container">
    <div class = "row">

            <div class="col-12 col-lg-7 order-first order-md-last mt-sm-4 mt-lg-0">
                <form id="form-contact" class="contact-form z-100" method="POST" action="/projects/create" enctype="multipart/form-data">
                    @csrf          
                    <!-- Name Field -->
                    <div class="form-floating mb-3 z-100">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                            id="name" name="name" placeholder="Name" value="{{ old('name') }}" >
                        <label for="name">Name</label>
                        
                            <div class="invalid-feedback d-block" id = "invalid-name">@error('name'){{ $message }}@enderror</div>
                        
                    </div>

                    <div class="form-floating mb-3 z-100">
                        <input type="text" class="form-control @error('client') is-invalid @enderror" 
                            id="client" name="client" placeholder="client" value="{{ old('client') }}" >
                        <label for="name">Client</label>
                        
                            <div class="invalid-feedback d-block" id = "invalid-name">@error('name'){{ $message }}@enderror</div>
                        
                    </div>
                    <!-- Task Field -->
                    <div class="form-floating mb-4">
                        <textarea class="form-control @error('task') is-invalid @enderror" 
                                id="task" placeholder="Leave a comment here" style="height: 100px" 
                                name="task">{{ old('task') }}</textarea>
                        <label for="task">Task</label>
                        
                            <div class="invalid-feedback d-block" id = "invalid-task">@error('task'){{ $message }}@enderror </div>
                        
                    </div>
                
                    <!-- url Field -->
                    <div class="form-floating mb-3">
                        <input type="url" class="form-control @error('url') is-invalid @enderror" 
                            id="url" name="url" placeholder="url" value="{{ old('url') }}">
                        <label for="url">url</label>
                        
                            <div class="invalid-feedback d-block" id = "invalid-url">@error('url'){{ $message }}@enderror</div>
                        
                    </div>
                
                    <!-- Description -->
                    <div class="form-floating mb-4">
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                id="description" placeholder="Leave a comment here" style="height: 100px" 
                                name="description">{{ old('description') }}</textarea>
                        <label for="description">Description</label>
                        
                            <div class="invalid-feedback d-block" id = "invalid-description">@error('description'){{ $message }}@enderror </div>
                        
                    </div>
                
                    
                
                    <!-- Interest Radio Buttons -->
                    {{-- <div class="form-group mb-3">

                        <div class="form-input-group">
                            <label class="animated-checkbox">
                                <input type="checkbox" value = "selected" name = "selected" id = "selected" class="form-check-input @error('selected') is-invalid @enderror" 
                                    {{ old('selected') ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                                <span class="label-text">Selected</span>
                            </label>
                        
                        </div>
                        
                            <div class="invalid-feedback d-block" id = "invalid-selected">@error('selected'){{ $message }}@enderror</div>
                        
                    </div> --}}
                    <div class="form-group mb-3">
                        <label class="form-label d-block">Project Selection</label>
                        
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('selected') is-invalid @enderror" 
                                   type="radio" name="selected" id="selected-1" 
                                   value="1" {{ old('selected', 0) == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="selected-1">Selected</label>
                        </div>
                        
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('selected') is-invalid @enderror" 
                                   type="radio" name="selected" id="selected-0" 
                                   value="0" {{ old('selected', 0) == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="selected-0">Not Selected</label>
                        </div>
                        
                        <div class="invalid-feedback d-block" id="invalid-selected">
                            @error('selected'){{ $message }}@enderror
                        </div>
                    </div>

                   <!-- Add this after your existing form fields -->
                    <div class="mb-4">
                        <label class="form-label">Project Pictures</label>
                        <div id="picture-uploads">
                            <div class="picture-entry mb-3">
                                <div class="row g-2">
                                    <div class="col-md-8">
                                        <input type="file" name="pictures[]" class="form-control" accept="image/*" required>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="picture_types[]" class="form-select" required>
                                            <option value="">Select Type</option>
                                            @foreach ( App\Models\PicType::all() as $types)
                                                <option value="{{ $types -> type }}">{{ $types -> type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-danger remove-picture" disabled>X</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" id="add-picture" class="btn btn-secondary btn-sm">+ Add Another Picture</button>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Project Tags</label>
                        <div id="tag-uploads">
                            <div class="tag-entry mb-3">
                                <div class="row g-2">
                                    <div class="col-md-11">
                                        <input type="text" name="tags[]" class="form-control" placeholder="Enter a tag" required>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-danger remove-tag" disabled>X</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" id="add-tag" class="btn btn-secondary btn-sm">+ Add Another Tag</button>
                    </div>
                
                    <!-- Submit Button -->
                    <button type="submit" class="btn magnetic-button">
                        Submit <i class="icon bi bi-arrow-right ms-1"></i><span></span>
                    </button>
                </form>
                
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const pictureUploads = document.getElementById('picture-uploads');
        const addButton = document.getElementById('add-picture');
        
        addButton.addEventListener('click', function() {
            const newEntry = pictureUploads.querySelector('.picture-entry').cloneNode(true);
            newEntry.querySelector('input').value = '';
            newEntry.querySelector('select').value = '';
            newEntry.querySelector('.remove-picture').disabled = false;
            pictureUploads.appendChild(newEntry);
        });
        
        pictureUploads.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-picture')) {
                const entries = pictureUploads.querySelectorAll('.picture-entry');
                if (entries.length > 1) {
                    e.target.closest('.picture-entry').remove();
                }
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const tagUploads = document.getElementById('tag-uploads');
        const addTagButton = document.getElementById('add-tag');
        
        addTagButton.addEventListener('click', function() {
            const newTagEntry = tagUploads.querySelector('.tag-entry').cloneNode(true);
            newTagEntry.querySelector('input').value = '';
            newTagEntry.querySelector('.remove-tag').disabled = false;
            tagUploads.appendChild(newTagEntry);
        });
        
        tagUploads.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-tag')) {
                const entries = tagUploads.querySelectorAll('.tag-entry');
                if (entries.length > 1) {
                    e.target.closest('.tag-entry').remove();
                }
            }
        });
    });
    </script>
@endsection