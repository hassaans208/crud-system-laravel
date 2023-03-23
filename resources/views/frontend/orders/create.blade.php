@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.order.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.orders.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="order">{{ trans('cruds.order.fields.order') }}</label>
                            <input class="form-control" type="text" name="order" id="order" value="{{ old('order', '') }}" required>
                            @if($errors->has('order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.order_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="products">{{ trans('cruds.order.fields.product') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="products[]" id="products" multiple required>
                                @foreach($products as $id => $product)
                                    <option value="{{ $id }}" {{ in_array($id, old('products', [])) ? 'selected' : '' }}>{{ $product }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('products'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('products') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.product_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.order.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="total_cost">{{ trans('cruds.order.fields.total_cost') }}</label>
                            <input class="form-control" type="number" name="total_cost" id="total_cost" value="{{ old('total_cost', '0.0') }}" step="0.01">
                            @if($errors->has('total_cost'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('total_cost') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.total_cost_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="tax">{{ trans('cruds.order.fields.tax') }}</label>
                            <input class="form-control" type="number" name="tax" id="tax" value="{{ old('tax', '0.0') }}" step="0.01">
                            @if($errors->has('tax'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tax') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.tax_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection