@extends('layouts.app')

@section('title')
  Store Cart Page
@endsection

@section('content')
<!-- Awal page content -->
    <div class="page-content page-cart">
      <!-- breadcrumbs  -->
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="/index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Cart</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <!-- breadcrumbs  -->
      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
              <table class="table-borderless table-cart">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Name &nbsp; Seller</th>
                    <th>Price</th>
                    <th>Menu</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($carts as $cart)
                  <tr>
                    <td style="width: 20%">
                      @if($cart->product->galleries)
                        <img
                        src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                        class="cart-image"
                        alt=""
                        />
                      @endif
                    </td>
                    <td style="width: 35%">
                      <div class="product-title">{{ $cart->product->name }}</div>
                      <div class="product-subtitle">By {{ $cart->product->user->store_name }}</div>
                    </td>
                    <td style="width: 35%">
                      <div class="product-title">Rp. {{ number_format($cart->product->price) }}</div>
                      <div class="product-subtitle">Rupiah</div>
                    </td>
                    <td style="width: 35%">
                      <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-remove-cart"> Remove </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Shipping Details</h2>
            </div>
          </div>
          <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
            <div class="col-md-6">
              <div class="form-group">
                <label for="AddressOne">Address 1</label>
                <input
                  type="text"
                  class="form-control"
                  name="addressOne"
                  id="addressOne"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="AddressTwo">Address 2</label>
                <input
                  type="text"
                  class="form-control"
                  name="addressTwo"
                  id="addressTwo"
                />
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="Province">Province</label>
                <select name="province" id="province" class="form-control">
                  <option value="">Jawa Barat</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="City">City</label>
                <select name="city" id="city" class="form-control">
                  <option value="">Cirebon</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="PostalCode">Postal Code</label>
                <input
                  type="text"
                  class="form-control"
                  name="postalCode"
                  id="postalCode"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="Country">Country</label>
                <input
                  type="text"
                  class="form-control"
                  name="country"
                  id="country"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="Mobile">Mobile</label>
                <input
                  type="text"
                  class="form-control"
                  name="mobile"
                  id="mobile"
                />
              </div>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-2">Payment Information</h2>
            </div>
          </div>
          <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
            <div class="col-4 col-md-2">
              <div class="product-title">Rp. 10.000</div>
              <div class="product-subtitle">Country Tax</div>
            </div>
            <div class="col-4 col-md-2">
              <div class="product-title">Rp. 10.000</div>
              <div class="product-subtitle">Product Insurance</div>
            </div>
            <div class="col-4 col-md-2">
              <div class="product-title">Rp. 10.000</div>
              <div class="product-subtitle">Ship To Jakarta</div>
            </div>
            <div class="col-4 col-md-3">
              <div class="product-title text-success">Rp. 100.000</div>
              <div class="product-subtitle">Total</div>
            </div>
            <div class="col-8 col-md-3">
              <a
                href="/success.html"
                class="btn btn-success mt-4 px-4 btn-block"
              >
                Chackout Now
              </a>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- Akhir Content -->
@endsection