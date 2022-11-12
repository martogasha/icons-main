<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(){
        $products = Stock::all();
        return view('admin.stock',[
            'products'=>$products
        ]);
    }
    public function addStock(){
        return view('admin.addProduct');
    }
    public function storeStock(Request $request){
        if (!is_null($request->number_of_pack)){
            $incompleteQuantity = $request->quantity;
            $packs = $request->number_of_pack;
            $packsQuantity = $request->quantity_of_pack;
            $quantity = $packs*$packsQuantity+$incompleteQuantity;
        }
        else{
            $quantity = $request->quantity;
        }
        $store = new Stock();
        $store->barcode = $request->input('barcode');
        $store->product_name = $request->input('product_name');
        $store->quantity = $quantity;
        $store->quantity_of_pack = $request->input('quantity_of_pack');
        $store->number_of_pack = $request->input('number_of_pack');
        $store->buying_price = $request->input('buying_price');
        $store->selling_price = $request->input('selling_price');
        $store->date = $request->input('date');
        if ($request->image) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('uploads/product/', $filename);
            $store->image = $filename;
        }
        $store->save();
        return redirect()->back()->with('success','PRODUCT ADDED SUCCESS');
    }
    public function viewStock(Request $request){
        $output = "";
        $product = Stock::find($request->id);
        $output = '
<div class="modal-header">
                                                <div class="modal-title h4">'.$product->product_name.'</div> <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="card-body">
                                                    <div id="example-form">
                                                        <h3>General Information</h3>
                                                        <h6 class="h-0 m-0">&nbsp;</h6>
                                                        <div class="row gutters">
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                                                <div class="field-wrapper">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" value="'.$product->barcode.'" placeholder="Set Barcode" name="barcode" required>
                                                                    </div>
                                                                    <div class="field-placeholder">Barcode</div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                                                <div class="field-wrapper">
                                                                    <input type="text" placeholder="Enetr Product Name" value="'.$product->product_name.'" name="product_name" required>
                                                                    <div class="field-placeholder">Product Name</div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                                                <div class="field-wrapper">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" value="'.$product->buying_price.'" placeholder="Set Buying Price" name="buying_price" required>
                                                                        <span class="input-group-text">Ksh</span>
                                                                    </div>
                                                                    <div class="field-placeholder">Buying Price</div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                                                <div class="field-wrapper">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" value="'.$product->selling_price.'" placeholder="Set Selling Price" name="selling_price" required>
                                                                        <span class="input-group-text">Ksh</span>
                                                                    </div>
                                                                    <div class="field-placeholder">Selling Price</div>
                                                                </div>

                                                            </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                                                        <div class="field-wrapper">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" value="'.$product->quantity.'" placeholder="Quantity" name="quantity">
                                                                            </div>
                                                                            <div class="field-placeholder">Quantity(Incomplete Park)</div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                                                        <div class="field-wrapper">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" value="'.$product->quantity_of_pack.'" placeholder="Quantity in pack" name="quantity_of_pack">
                                                                            </div>
                                                                            <div class="field-placeholder">Quantity in pack</div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                                                        <div class="field-wrapper">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" value="'.$product->number_of_pack.'" placeholder="Pack No:" name="number_of_pack">
                                                                            </div>
                                                                            <div class="field-placeholder">Pack Number</div>
                                                                        </div>

                                                                    </div>

                                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                                                <div class="field-wrapper">
                                                                    <div class="input-group">
                                                                        <input type="date" value="'.$product->date.'" class="form-control" name="date">
                                                                    </div>
                                                                    <div class="field-placeholder">Date</div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
        ';
        return response($output);
    }
    public function eStock(Request $request){
        if (!is_null($request->number_of_pack)){
            $incompleteQuantity = $request->quantity;
            $packs = $request->number_of_pack;
            $packsQuantity = $request->quantity_of_pack;
            $quantity = $packs*$packsQuantity+$incompleteQuantity;
        }
        else{
            $quantity = $request->quantity;
        }
        $edit = Stock::find($request->stockId);
        $currentQuantity = $edit->quantity;
        $finalQuantity = $currentQuantity+$request->addStock;
        $edit->barcode = $request->barcode;
        $edit->product_name = $request->product_name;
        $edit->quantity = $finalQuantity;
        $edit->quantity_of_pack = $request->input('quantity_of_pack');
        $edit->number_of_pack = $request->input('number_of_pack');
        $edit->buying_price = $request->buying_price;
        $edit->selling_price = $request->selling_price;
        $edit->date = $request->date;
        if ($request->image) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('uploads/product/', $filename);
            $edit->image = $filename;
        }
        $edit->save();
        return redirect(url('stock'))->with('success','PRODUCT EDITED SUCCESS');
    }
    public function stockEdit($id){
        $edit = Stock::find($id);
        return view('admin.stockEdit',[
            'edit'=>$edit
        ]);
    }
}
