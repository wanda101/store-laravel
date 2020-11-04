@extends('layouts.dashboard')

@section('title')
  Store - Dashboard Account
@endsection

@section('content')
<!-- section content -->
          <div
            data-aos="fade-up"
            class="section-content section-dashboard-home"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Store Settings</h2>
                <p class="dashboard-subtitle">
                  Make store date that profitable
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="">
                      <div class="card">
                        <div class="card-body">
                          <div
                            class="row mb-2"
                            data-aos="fade-up"
                            data-aos-delay="200"
                          >
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="AddressOne">Your name</label>
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
                                <label for="AddressTwo">Your Email</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="addressTwo"
                                  id="addressTwo"
                                />
                              </div>
                            </div>
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
                                <select
                                  name="province"
                                  id="province"
                                  class="form-control"
                                >
                                  <option value="">Jawa Barat</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="City">City</label>
                                <select
                                  name="city"
                                  id="city"
                                  class="form-control"
                                >
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
                          <div class="row mt-4">
                            <div class="col text-right">
                              <button
                                type="submit"
                                class="btn btn-success px-5"
                              >
                                Save Now
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- section content -->
@endsection