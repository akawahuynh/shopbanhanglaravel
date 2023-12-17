@extends('admin_layouts')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cật Nhật Sản Phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <?php
                            $message=Session::get('message');
                            if ($message) {
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                            @foreach ($edit_product as $key=>$pro)
                        <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                            <input type="text" class="form-control" name="product_name" value="{{$pro->product_name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá Sản Phẩm</label>
                            <input type="text" class="form-control" name="product_price" value="{{$pro->product_price}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ảnh Sản Phẩm</label>
                            <input type="file" class="form-control" name="product_image">
                            <br/>
                            <img src="/uploads/product/{{$pro->product_image}}" alt="{{$pro->product_image}}" width="500" height="500">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả Sản Phẩm</label>
                            <textarea class="form-control" name="product_description">{{$pro->product_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội Dung Sản Phẩm</label>
                            <textarea class="form-control" name="product_content">{{$pro->product_content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Danh Mục Sản Phẩm</label>
                            <select name="product_category" class="form-control input-lg m-bot15">
                                @foreach ($cate_product as $key=>$cate)
                                @if ($cate->category_id==$pro->category_id)
                                <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @else
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thương Hiệu Sản Phẩm</label>
                            <select name="product_brand" class="form-control input-lg m-bot15">
                                @foreach ($brand_product as $key=>$brand)
                                @if ($brand->brand_id==$pro->brand_id)
                                <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>    
                                @else
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hiển Thị</label>
                            <select name="product_status" class="form-control input-lg m-bot15">
                                @if ($pro->product_status==0)
                                <option selected value="{{$pro->product_status}}">Hiển Thị</option>
                                <option value="1">Ẩn</option>
                                @else
                                <option selected value="{{$pro->product_status}}">Ẩn</option>
                                <option value="0">Hiển Thị</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" name="add_product" class="btn btn-info">Cập Nhật</button>
                    </form>
                    @endforeach
                    </div>

                </div>
            </section>
    </div>
</div>
@endsection