<div>
    <div class="container">

        <div class="col-md-12">
            <div class="card">
                <div class="card-hearder">
                    <h5 style="float: left;"><strong>All Posts</strong></h5>
                    <button class="btn btn-primary" style="float: right;" data-bs-toggle="modal"
                        data-bs-target="#addPostModal"> Add Post</button>


                    @if (session()->has('message'))
                        <div class="alert alert-success text-center">{{ session('message') }}</div>
                    @endif
                </div>
                {{-- <div class="card-body">

                </div> --}}
            </div>

        </div>

        <div>
            @foreach ($posts as $post)
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-12">
                        <div class="card mb-5 shadow-sm">
                            <img src="{{ asset('/images/img2.jpg') }}" alt="" class="img-fluid">
                            <div class="card-board">

                                <h3 class="text-center"> {{ $post->title }}</h3>

                            </div>

                            <div class="card-text">

                                <p>{{ $post->description }}...</p>
                                <a href="#" class="btn btn-outline-primary rounded-3 float-end">Read More</a>
                                <button class="btn btn-sm btn-primary color-green" style="float: left;"
                                    data-bs-toggle="modal" data-bs-target=""> Add Comment</button>

                                <button class="btn btn-sm btn-secondary " data-bs-toggle="modal"
                                    data-bs-target="#viewPostModal"> View</button>

                                <button class="btn btn-sm btn-secondary" wire:click ="updatePost{{ $post->id}}">Update</button>
                                

                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deletePostModal"> Delete</button>

                            </div>

                            <div>
                                <span>Created by {{ $post->user->name }}, at {{ $post->created_at }}</span>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>


    </div>

    <!-- Add Post Modal -->
    <div wire:ignore.self class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="storePostData">
                        <div class="form-group row">
                            <label for="title">Title</label>
                            <div class="col-9">
                                <input type="text" id="title" class="form-control" wire:model='title'>
                                @error('title')
                                    <span class="text-denger" style="font-size: 10.5px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description">Description</label>
                            <div class="col-9">
                                <textarea type="text" name="description" id="description" cols="30" rows="10" class="form-control"
                                    wire:model="description"></textarea>
                                @error('description')
                                    <span class="text-denger" style="font-size: 10.5px">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Add
                                Post</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!--Update Post Modal -->
    <div wire:ignore.self class="modal fade" id="updatePostModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Update Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updatePostData">
                        <div class="form-group row">
                            <label for="title">Title</label>
                            <div class="col-9">
                                <input type="text" id="title" class="form-control" wire:model='title'>
                                @error('title')
                                    <span class="text-denger" style="font-size: 10.5px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description">Description</label>
                            <div class="col-9">
                                <textarea type="text" name="description" id="description" cols="30" rows="10" class="form-control"
                                    wire:model="description"></textarea>
                                @error('description')
                                    <span class="text-denger" style="font-size: 10.5px">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-sm btn-primary" >Update
                                Post</button>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!--Delete Post Modal -->
    <div wire:ignore.self class="modal fade" id="deletePostModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Delete Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="storePostData">
                        <div class="form-group row">
                            <label for="title">Title</label>
                            <div class="col-9">
                                <input type="text" id="title" class="form-control" wire:model='title'>
                                @error('title')
                                    <span class="text-denger" style="font-size: 10.5px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description">Description</label>
                            <div class="col-9">
                                <textarea type="text" name="description" id="description" cols="30" rows="10" class="form-control"
                                    wire:model="description"></textarea>
                                @error('description')
                                    <span class="text-denger" style="font-size: 10.5px">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Delete
                                Post</button>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>

@push('scripts')
    <script>
        window.addEventListener('close-modal'), event => [
            $('#addPostModal').modal('hide');
        ]
    </script>
@endpush
