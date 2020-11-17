@extends('admin.layout.app')

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>New Product</h4>
                  </div>
                  <div class="card-body">
                    <form action="#">
                    <div class="row mb-5">
                            <div class="col-md-4"><label for="">Product Name</label><input type="text" id="prodname" required autofocus class="form-control"></div>
                            <div class="col-md-3"><label for="">Product Type</label>
                                <select type="text" id="prodtype" required autofocus class="form-control">
                                    <option value="" disabled selected>Select Material</option>
                                    @foreach($prod_types as $type)
                                        <option value="{{$type}}">{{$type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3"><label for="">Product Category</label>
                                <select type="text" id="prodcat" required autofocus class="form-control">
                                    <option value="" disabled selected>Select Category</option>
                                    @foreach($prod_cats as $cat)
                                        <option value="{{$cat}}">{{$cat}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 mt-4"><button type="submit" class="btn btn-block btn-primary mt-2" id="addprod">Add</button></div>
                        </div>
                    </form>
                  </div>
                </div>

                <div class="card-body"  style="display: block">
                    
                    <h6 class="text-center"><label for="">Product Images</label></h6>
                    <div class="row product_images mb-4">
                        
                        <div class="col-md-2">
                            <input type="file" id="prodimage" style="display: none">
                            <a href="#" id="new_img" style="margin:60px;">Click here to add! <i class="ti-image" style="margin-left:65px;font-size: 130px"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-5">
                            <label for="">Quantities and Discounts </label>
                            <div class="quantity_list">
                            </div>
                            <form action="#">
                                <div class="row mt-3">
                                    <div class="col-4"><label for="">Quantity</label><input type="number" id="prodquantity" class="form-control" required /></div>
                                    <div class="col-4"><label for="">Discount</label><input type="number" id="proddiscount" class="form-control" required /></div>
                                    <div class="col-4"><button type="submit" class="btn btn-block btn-primary mt-4" id="addprodquantity">Add</button></div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="col-md-3 mb-5">
                            <label for="">Price by Type </label>
                            <div class="pricetype_list">
                            </div>
                            <form action="#">
                                <div class="row mt-3">
                                    <div class="col-5"><label for="">Material name</label><input type="text" id="prodtypename" class="form-control" required /></div>
                                    <div class="col-4"><label for="">Price/1 (N)</label><input type="number" id="prodtypeprice" class="form-control" required /></div>
                                    <div class="col-3"><button type="submit" class="btn btn-block btn-primary mt-4" id="addprodtype">Add</button></div>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-3 mb-5">
                            <label for="">Product Features</label>
                            <ul class="features_list">
                            </ul>
                            <form action="#">
                                <div class="row mt-3">
                                    <div class="col-12"><label for="">Feature</label><textarea type="text" id="prodfeature" rows="3" class="form-control"placeholder="Enter product feature here" required></textarea></div>
                                    <div class="col-12"><button type="submit" class="btn btn-block btn-primary mt-2" id="addprodfeature">Add</button></div>
                                </div>
                            </form>
                        </div>   
                        
                        <div class="col-md-3 mb-5">
                            <label for="">Product Specifications</label>
                            <div class="specs_list">
                                
                            </div>
                            <form action="#" id="newspecform" enctype="multipart/form-data">
                                <div class="row mt-3">
                                    <div class="col-12"><label for="">Spec name</label><input type="text" name="name"  id="prodspecname" class="form-control" required /></div>
                                    <div class="col-12"><label for="">Caption</label><textarea type="text" name="caption" id="prodspeccaption" rows="3" class="form-control"placeholder="Enter specification caption here..." required /></textarea></div>
                                    <div class="col-7"><label for="">Image</label><input type="file" name="image" id="prodspecimage" class="form-control" required /></div>
                                    <div class="col-5 mt-4"><button type="submit" class="btn btn-block btn-primary mt-2" id="addprodspec">Add</button></div>
                                </div>
                            </form>
                        </div>   
                    </div>

                    <div><button class="btn btn-success btn-block" id="saveproduct"> Save Product</button></div>

                </div>
        </div>
    </section>
</div>

@stop