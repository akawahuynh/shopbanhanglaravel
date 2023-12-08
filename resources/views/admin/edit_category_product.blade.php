@extends('admin_layouts')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập Nhật Danh Mục Sản Phẩm
                </header>
                <div class="panel-body">
                    @foreach ($edit_category_product as $key=>$edit_value)
                    <div class="position-center">
                        <?php
                            $message=Session::get('message');
                            if ($message) {
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="POST">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Danh Mục</label>
                            <input type="text" class="form-control" name="category_product_name" value="{{$edit_value->category_name}}" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả Danh Mục</label>
                            <textarea class="form-control" name="category_product_description"  >{{$edit_value->category_desc}} </textarea>
                        </div>
                        
                        <button type="submit" name="update_category_product" class="btn btn-info">Cập Nhật</button>
                    </form>
                    </div>
                    @endforeach
                </div>
            </section>
    </div>
</div>
@endsection