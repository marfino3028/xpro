@extends('layouts.index')

@section('title')
X Pro - Add Product & Services
@endsection

@section('content')
<!-- Circle Buttons -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Create Product & Service</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    
                </div>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="/products_#" class="breadcrumb-item">Create Product & Service</a>
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
                <h5 class="card-title">Create Product & Service</h5>
                <div class="header-elements">
                    <div class="list-icons">

                    </div>
                </div>
            </div>       
            <div class="card-body">
                <form action="{{ route('addproductservice') }}" method="POST">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="title" name="name">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock">
                                @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> 

                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price">
                                    @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <input type="submit" class="btn btn-lg btn-outline-primary btn-block" value="save" name="save" /> 
                        </div>
                        @csrf   
                    </form>
                    <div class="col-6">
                        <input type="submit" class="btn btn-lg btn-outline-secondary btn-block" value="saveDraft" name="save" />    
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
