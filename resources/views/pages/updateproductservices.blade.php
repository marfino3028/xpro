@extends('layouts.index')

@section('title')
X Pro - Edit Product & Services
@endsection

@section('content')
<!-- Circle Buttons -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="/products_&_services" class="breadcrumb-item">Product & Service</a>
                    <span class="breadcrumb-item active">Archive</span>
                </div>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">

                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">
        <!-- Invoice archive -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Edit Product & Service</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        
                    </div>
                </div>
            </div>    
            <div class="card-body">
                <form action="{{ route('updateproductservices', ['id' => $update[0]->id ])}}" method="POST">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="title" name="name" value="{{ $update[0]->name }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ $update[0]->stock }}">
                                @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> 

                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ $update[0]->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $update[0]->price }}">
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <input type="submit" class="btn btn-primary btn-block" value="save" name="save" /> 
                        </div>
                        <div class="col-6">
                            <a href="{{ route('productservices') }}" class="btn btn-secondary btn-block" value="saveDraft" name="save">Cancel</a>    
                        </div>
                        @csrf   
                </form>
            </div> 
        </div>
    </div>
</div>
@endsection