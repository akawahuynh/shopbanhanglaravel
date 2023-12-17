@extends('admin_layouts')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập Nhật Thương Hiệu Sản Phẩm
                </header>
                <div class="panel-body">
                    @foreach ($edit_brand_product as $key=>$edit_value)
                    <div class="position-center">
                        <?php
                            $message=Session::get('message');
                            if ($message) {
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}" method="POST">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Thương Hiệu</label>
                            <input type="text" class="form-control" name="brand_product_name" value="{{$edit_value->brand_name}}" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả Thương Hiệu</label>
                            <textarea class="form-control" name="brand_product_description"  >{{$edit_value->brand_desc}} </textarea>
                        </div>
                        
                        <button type="submit" name="update_brand_product" class="btn btn-info">Cập Nhật</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>
    </div>
</div>
@endsection