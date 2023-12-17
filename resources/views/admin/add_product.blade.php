@extends('admin_layouts')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Sản Phẩm
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
                        <form role="form" action="{{URL::to('/save-product')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                            <input type="text" class="form-control" name="product_name" placeholder="Tên Sản Phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá Sản Phẩm</label>
                            <input type="text" class="form-control" name="product_price" placeholder="Giá Sản Phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ảnh Sản Phẩm</label>
                            <input type="file" class="form-control" name="product_image">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả Sản Phẩm</label>
                            <textarea class="form-control" name="product_description" placeholder="Mô Tả Sản Phẩm"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội Dung Sản Phẩm</label>
                            <textarea class="form-control" name="product_content" placeholder="Nội Dung Sản Phẩm"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Danh Mục Sản Phẩm</label>
                            <select name="product_category" class="form-control input-lg m-bot15">
                                @foreach ($cate_product as $key=>$cate)
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thương Hiệu Sản Phẩm</label>
                            <select name="product_brand" class="form-control input-lg m-bot15">
                                @foreach ($brand_product as $key=>$brand)
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hiển Thị</label>
                            <select name="product_status" class="form-control input-lg m-bot15">
                                <option value="0">Hiển Thị</option>
                                <option value="1">Ẩn</option>
                            </select>
                        </div>
                        <button type="submit" name="add_product" class="btn btn-info">Thêm</button>
                    </form>
                    </div>

                </div>
            </section>
    </div>
</div>
@endsection