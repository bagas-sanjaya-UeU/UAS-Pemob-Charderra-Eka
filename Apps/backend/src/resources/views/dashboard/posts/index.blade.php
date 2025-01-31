@extends('dashboard')

@section('title', 'Dashboard Donasi')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title
                        ">Data Donasi</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Tambah Data Donasi
                        </button>

                        <!-- Modal Tambah -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Donasi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('dashboard.posts.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="title" class="form-label">Judul</label>
                                                <input type="text" class="form-control" id="title" name="title">
                                                <div id="emailHelp" class="form-text">Judul donasi</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Deskripsi</label>
                                                <textarea class="form-control" id="description" name="content"
                                                    rows="3"></textarea>
                                                <div id="emailHelp" class="form-text">Deskripsi donasi</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="slug" class="form-label">Slug</label>
                                                <input type="text" class="form-control" id="slug" name="slug">
                                                <div id="emailHelp" class="form-text">Slug</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="thumbnail" class="form-label">Thumbnail</label>
                                                <input type="file" class="form-control" id="image" name="image">
                                                <div id="emailHelp" class="form-text">
                                                jpeg,png,jpg. Max 2MB
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="category" class="form-label">Kategori</label>
                                                <select class="form-select" aria-label="Default select example" name="category">
                                                    <option value="Pendidikan">Pendidikan</option>
                                                    <option value="Kesehatan">Kesehatan</option>
                                                    <option value="Sosial">Sosial</option>
                                                    <option value="Lingkungan">Lingkungan</option>
                                                </select>
                                            </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Slug</th>
                                        <th>Thumbnail</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($posts as $post)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->content }}</td>
                                            <td>{{ $post->slug }}</td>
                                            <td>{{ $post->image }}</td>
                                            <td>{{ $post->category }}</td>
                                            <td>
                                                
                                                 <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $post->id }}">
                                                    Edit
                                                </button>
                                                <form action="{{ route('dashboard.posts.destroy', $post->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{{ $post->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data
                                                            Donasi</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('dashboard.posts.update', $post->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <div class="mb-3">
                                                                <label for="title" class="form-label">Judul</label>
                                                                <input type="text" class="form-control" id="title"
                                                                    name="title" value="{{ $post->title }}">
                                                                <div id="emailHelp" class="form-text">Judul donasi</div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="description" class="form-label">Deskripsi</label>
                                                                <textarea class="form-control" id="description" name="content"
                                                                    rows="3">{{ $post->content }}</textarea>
                                                                <div id="emailHelp" class="form-text">Deskripsi donasi</div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="slug" class="form-label">Slug</label>
                                                                <input type="text" class="form-control" id="slug" name="slug"
                                                                    value="{{ $post->slug }}">
                                                                <div id="emailHelp" class="form-text">Slug</div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="thumbnail" class="form-label">Thumbnail</label>
                                                                <input type="file" class="form-control" id="image"
                                                                    name="image" >
                                                                <div id="emailHelp" class="form-text">Thumbnail</div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="category" class="form-label">Kategori</label>
                                                                <select class="form-select" aria-label="Default select example"
                                                                    name="category">
                                                                    <option value="Pendidikan" {{ $post->category == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                                                                    <option value="Kesehatan" {{ $post->category == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                                                                    <option value="Sosial" {{ $post->category == 'Sosial' ? 'selected' : '' }}>Sosial</option>
                                                                    <option value="Lingkungan" {{ $post->category == 'Lingkungan' ? 'selected' : '' }}>Lingkungan</option>
                                                                    
                                                                </select>
                                                            </div>
                                                    </div>


                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endforelse

                                </tbody>

                                {{ $posts->links() }}

                            </table>

                            Note : No 1 adalah Data terbaru
                        </div>
                        {{-- <a href="{{ route('dashboard.transaction.create') }}" class="btn btn-primary">Tambah Data</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
