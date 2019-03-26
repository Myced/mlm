@extends('layouts.admin')

@section('title')
    {{ $product->name }}
@endsection

@section('content')

<div class="content-header">

    <div class="header-section">
        <h1>
            <i class="gi gi-luggage"></i>
            {{ $product->name }}
            <br>
            <small>Product Detail</small>
        </h1>
    </div>
</div>

@include('admin_includes.notification')

<div class="row">
    <div class="col-md-12">
        <a href="{{ route('admin.products') }}"
            class="btn btn-warning">
            <i class="fa fa-arrow-left"></i>
            <strong>Back to Products</strong>
        </a>

        <a href="{{ route('product.edit', ['id' => $product->id]) }}"
            class="btn btn-primary">
            <i class="fa fa-pencil"></i>
            <strong>Edit Product</strong>
        </a>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-6">

        <div class="block">
            <!-- General Data Title -->
            <div class="block-title">
                <h2>
                    <i class="fa fa-luggage"></i>
                    <strong>General</strong> Product Details
                </h2>
            </div>
            <!-- END General Data Title -->


            <div class="table-responsive">
                <table class="table table-borderless table-striped table-vcenter f-16">
                    <tbody>
                        <tr>
                            <td class="text-right" style="width: 50%;">
                                <strong>Product Code</strong>
                            </td>
                            <td>
                                {{ $product->code }}
                            </td>
                        </tr>

                        <tr>
                            <td class="text-right">
                                <strong>Product Name</strong>
                            </td>
                            <td>
                                {{ $product->name }}
                            </td>
                        </tr>

                        <tr>
                            <td class="text-right">
                                <strong>Product Category</strong>
                            </td>
                            <td>
                                {{ $product->category->name }}
                            </td>
                        </tr>

                        <tr>
                            <td class="text-right">
                                <strong>Product Brand</strong>
                            </td>
                            <td>
                                {{ is_null($product->brand) ? 'No Brand' : $product->brand->name }}
                            </td>
                        </tr>

                        <tr>
                            <td class="text-right">
                                <strong>Cost Price</strong>
                            </td>
                            <td>
                                {{ number_format($product->cost_price) }} FCFA
                            </td>
                        </tr>

                        <tr>
                            <td class="text-right">
                                <strong>Selling Price</strong>
                            </td>
                            <td>
                                {{ number_format($product->price) }} FCFA
                            </td>
                        </tr>

                        <tr>
                            <td class="text-right">
                                <strong>Quantity</strong>
                            </td>
                            <td>
                                {{ $product->quantity }}
                            </td>
                        </tr>

                        <tr>
                            <td class="text-right">
                                <strong>Published</strong>
                            </td>
                            <td>
                                @if($product->published)
                                <strong class="text-success">YES</strong>
                                @else
                                <strong class="text-danger">NO</strong>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td class="text-right">
                                <strong>Added On</strong>
                            </td>
                            <td>
                                {{ $product->created_at->format(\App\Functions::DATE_FORMAT) }}
                            </td>
                        </tr>

                        <tr>
                            <td class="text-right">
                                <strong>Product Views</strong>
                            </td>
                            <td>
                                {{ $product->views }} Views
                            </td>
                        </tr>

                        <tr>
                            <td class="text-right">
                                <strong>Total Product Orders</strong>
                            </td>
                            <td>
                                {{ $product->orders() }}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>

        <div class="block">
            <!-- General Data Title -->
            <div class="block-title">
                <h2>
                    <i class="fa fa-luggage"></i>
                    <strong>Product Description</strong>
                </h2>
            </div>

            <div class="row">
                <div class="col-md-12 f-16 m-b-20">
                    {!! $product->description !!}
                </div>
            </div>

        </div>


        <div class="block">
            <!-- Product Images Title -->
            <div class="block-title">
                <h2><i class="fa fa-picture-o"></i> <strong>Product</strong> Images</h2>
            </div>
            <!-- END Product Images Title -->

            <!-- Product Images Content -->
            <div class="block-section">

                <form action="{{ route('product.image.upload', ['id' =>$product->id ] ) }}"
                    class="dropzone dz-clickable" method="post">
                    @csrf
                    <div class="dz-default dz-message">
                        <span>Drop files here to upload</span>
                    </div>
                </form>
            </div>
            <table class="table table-bordered table-striped table-vcenter">
                <tbody>
                    <tr>
                        <td style="width: 20%;">
                            <a href="{{ $product->tiny_image }}"
                                data-toggle="lightbox-image">
                                <img src="{{ $product->tiny_image }}" alt=""
                                class="img-responsive center-block" style="max-width: 110px;">
                            </a>
                        </td>
                        <td class="text-center">
                            <strong>Tiny Image</strong>
                        </td>
                        <td class="text-center">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ $product->thumbnail }}" data-toggle="lightbox-image">
                                <img src="{{ $product->thumbnail }}" alt=""
                                    class="img-responsive center-block" style="max-width: 110px;">
                            </a>
                        </td>
                        <td class="text-center">
                            <strong>Thumbnail</strong>
                        </td>
                        <td class="text-center">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ $product->image }}" data-toggle="lightbox-image">
                                <img src="{{ $product->image }}" alt=""
                                    class="img-responsive center-block" style="max-width: 110px;">
                            </a>
                        </td>
                        <td class="text-center">
                            <strong>Image</strong>
                        </td>
                        <td class="text-center">
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- END Product Images Content -->

            <table class="table table-bordered table-striped table-vcenter">
                <tbody>

                    @foreach($product->images as $image)
                    <tr>
                        <td style="width: 20%;">
                            <a href="{{ $image->image }}"
                                data-toggle="lightbox-image">
                                <img src="{{ $image->image }}" alt=""
                                class="img-responsive center-block" style="max-width: 110px;">
                            </a>
                        </td>
                        <td class="text-center">
                            <strong>Product Image</strong>
                        </td>
                        <td class="text-center">
                            <a href="javascript:void(0)"
                                data-id1="{{ $image->id }}"
                                class="btn btn-xs btn-danger del">
                                <i class="fa fa-trash-o"></i>
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>


        </div>


    </div>

    <div class="col-md-6">
        <div class="block">
            <!-- General Data Title -->
            <div class="block-title">
                <h2>
                    <i class="fa fa-luggage"></i>
                    <strong>Full Description</strong>
                </h2>
            </div>

            <div class="row">
                <div class="col-md-12 f-16 m-b-20">
                    {!! $product->description_long !!}
                </div>
            </div>

        </div>

        <div class="block">
            <!-- General Data Title -->
            <div class="block-title">
                <h2>
                    <i class="fa fa-luggage"></i>
                    <strong>Product Specifications</strong>
                </h2>
            </div>

            <div class="row">
                <div class="col-md-12 f-16 m-b-20">
                    {!! $product->specifications !!}
                </div>
            </div>

        </div>

        <div class="block">
            <!-- General Data Title -->
            <div class="block-title">
                <div class="block-options pull-right">

                    <a href="javascript:void(0)"
                        class="btn btn-alt btn-sm btn-default"
                        data-toggle="tooltip"
                        title="See all product movements"
                        onclick="window.open('{{ route('product.movements', ['is' => $product->id]) }}',
                                    'Commissions', 'width=1200,height=720')">
                        <i class="fa fa-exchange"></i>
                        Full Product Movements
                    </a>
                </div>
                <h2>
                    <i class="fa fa-luggage"></i>
                    <strong>Latest Product Movement</strong>
                </h2>
            </div>

            <div class="row">
                <div class="col-md-12 ">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>S/N</th>
                                <th>Date</th>
                                <th>Previous Qty</th>
                                <th>Change</th>
                                <th>New Qty</th>
                                <th>Comment</th>
                            </tr>

                            @if($product->movements->count() == 0)
                            <tr>
                                <td colspan="6" class="text-center">
                                    <strong>No Product Movements</strong>
                                </td>
                            </tr>
                            @else
                                <?php
                                $count = 1;
                                 ?>

                                 @foreach($product->movements as $movement)
                                    <?php if($count == 11) break; ?>
                                 <tr>
                                     <td>{{ $count++ }}</td>
                                     <td>{{ $movement->created_at->format(\App\Functions::DATE_FORMAT) }}</td>
                                     <td>{{ $movement->old_quantity }}</td>
                                     <td>{{ $movement->difference }}</td>
                                     <td>
                                         @if($movement->old_quantity < $movement->new_quantity)
                                            <strong class="text-success">
                                                <i class="fa fa-chevron-up"></i>
                                                {{ $movement->new_quantity }}
                                            </strong>
                                         @else
                                             <strong class="text-danger">
                                                 <i class="fa fa-chevron-down"></i>
                                                 {{ $movement->new_quantity }}
                                             </strong>
                                         @endif
                                     </td>
                                     <td>
                                         {!! $movement->comment !!}
                                     </td>
                                 </tr>
                                 @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('.del').click(function(){
            var image = $(this).data('id1');

            if(confirm("Do you want to delete this image?"))
            {
                url = '/admin/product/{{ $product->id }}/image/' + image + '/destroy';

                window.location.href = url;
            }
        });
    })
</script>
@endsection
