@extends('layouts.profile')

@section('profileContent')

    <div class="profile-content">
        <form action="{{ route('storeRequest') }}" method="POST">
            {{ csrf_field() }}
            <div class="profile-content-inner">
                <h2>Add New Request</h2>
                <div class="row">
                    <div class="col-lg-6">

                        <div class="form-group row">
                            <div class="col-12">
                                <label for="brand">{{ __('Brand:') }}</label>
                            </div>
                            <div class="col-12">
                                <select name="brand" class="form-control form-select w-100" aria-label="Default select example">
                                    @if (old('brand'))
                                        <option>{{ old('brand') }}</option>
                                    @endif
                                    @foreach ($brands as $brand)
                                        <option>{{ $brand['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @error('brand')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="model">{{ __('Model:') }}</label>
                            <input type="text" class="form-control @error('model') is-invalid @enderror" id="part_no"
                                name="model" value="{{ old('model') }}" required autofocus>
                            @error('model')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="part_no">{{ __('Part-No:') }}</label>
                            <input type="text" class="form-control @error('part_no') is-invalid @enderror" id="part_no"
                                name="part_no" value="{{ old('part_no') }}" required autofocus>
                            @error('part_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="part_desc">{{ __('Part Description:') }}</label>
                            <input type="text" class="form-control @error('part_desc') is-invalid @enderror" id="part_desc"
                                name="part_desc" value="{{ old('part_desc') }}" required autofocus>
                            @error('part_desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="qty">{{ __('QTY:') }}</label>
                            <input type="number" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty"
                                value="{{ old('qty') }}" required autofocus>
                            @error('qty')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="condition">{{ __('Condition:') }}</label>
                            <div class="form-check">
                                @foreach ($conditions as $condition)
                                    <span class="{{ !$loop->first ? 'ml-5' : '' }}">
                                        <input class="form-check-input" type="checkbox" name="conditions[]"
                                            value="{{ $condition->id }}" id="{{ $condition->id }}">
                                        <label class="form-check-label" for="{{ $condition->id }}">
                                            {{ $condition->name }}
                                        </label>
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="condition">{{ __('Manufacturer:') }}</label>
                            <div class="form-check">
                                @foreach ($manufacturers as $manufacturer)
                                    <span class="{{ !$loop->first ? 'ml-5' : '' }}">
                                        <input class="form-check-input" type="checkbox" name="manufacturers[]"
                                            value="{{ $manufacturer->id }}" id="{{ $manufacturer->id }}_manu">
                                        <label class="form-check-label" for="{{ $manufacturer->id }}_manu">
                                            {{ $manufacturer->name }}
                                        </label>
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn dashboard-btn">Submit Request</button>
        </form>
    </div>


@endsection
