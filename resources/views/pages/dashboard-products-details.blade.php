@extends('layouts.dashboard')

@section('title')
  Store - Dashboard Products Details
@endsection

@section('content')
<!-- section content -->
<div
            data-aos="fade-up"
            class="section-content section-dashboard-home"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Sirup Marjan</h2>
                <p class="dashboard-subtitle">Product Details</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <form action="{{ route('dashboard-product-update', $product->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="users_id" value="{{ Auth::user()->id }}" >
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Product Name</label>
                                <input type="text" name="name" value="{{ $product->name }}" class="form-control" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" name="price" value="{{ $product->price }}" class="form-control" />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Kategori</label>
                                <select
                                  name="categories_id"
                                  class="form-control"
                                  id=""
                                >
                                <option value="{{ $product->categories_id }}">Tidak Diganti ({{ $product->category->name }})</option>
                                  @foreach ($categories as $category)
                                      <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                      </option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="editor">{!! $product->description !!}</textarea>
                              </div>
                            </div>
                          </div>
                          <div class="row mt-4">
                            <div class="col text-right">
                              <button
                                type="submit"
                                class="btn btn-success btn-block"
                              >
                                Update
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          @foreach ($product->galleries as $gallery)
                              <div class="col-md-4">
                                <div class="gallery-container">
                                  <img
                                    src="{{ Storage::url($gallery->photos ?? '') }}"
                                    class="w-100"
                                    alt=""
                                  />
                                  <a href="{{ route('dashboard-product-gallery-delete', $gallery->id) }}" class="delete-gallery">
                                    <img src="/images/icon-delete.svg" alt="" />
                                  </a>
                                </div>
                              </div>
                          @endforeach
                          <div class="col-12">
                            <form action="{{ route('dashboard-product-gallery-upload') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="products_id" value="{{ $product->id }}">
                              <input
                              type="file"
                              name="photos"
                              id="file"
                              style="display: none"
                              onchange="form.submit()"
                              />
                              <button
                                type="button"
                                class="btn btn-secondary btn-block mt-3"
                                onclick="thisFileUpload()"
                              >
                                Add Foto
                              </button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>          
<!-- section content -->    
@endsection

@push('addon-script')
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <script>
      function thisFileUpload() {
        document.getElementById("file").click();
      }
    </script>
    <script>
      CKEDITOR.replace("editor");
    </script>
    
@endpush