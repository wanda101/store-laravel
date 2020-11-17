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
                    <form id="locations" action="{{ route('dashboard-settings-redirect','dashboard-settings-account') }}" method="POST" enctype="multipart/form-data" >
                      @csrf
                      <div class="card">
                        <div class="card-body">
                          <div
                            class="row mb-2"
                            data-aos="fade-up"
                            data-aos-delay="200"
                          >
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="name">Your name</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="name"
                                  id="name"
                                  value="{{ $user->name }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="email">Your Email</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="email"
                                  id="email"
                                  value="{{ $user->email }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="address_one">Address 1</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="address_one"
                                  id="address_one"
                                  value="{{ $user->address_one }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="address_two">Address 2</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="address_two"
                                  id="address_two"
                                  value="{{ $user->address_two }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="provinces_id">Province</label>
                                <select name="provinces_id" id="provinces_id" v-if="provinces" v-model="provinces_id" class="form-control">
                                  <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                                </select>
                                <select v-else class="form-control" name="" id=""></select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="regencies_id">City</label>
                                <select name="regencies_id" id="regencies_id" v-if="regencies" v-model="regencies_id" class="form-control">
                                  <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                                </select>
                                <select v-else class="form-control" name="" id=""></select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="zip_code">Postal Code</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="zip_code"
                                  id="zip_code"
                                  value="{{ $user->zip_code }}"
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
                                  value="{{ $user->country }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="phone_number">Mobile</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="phone_number"
                                  id="phone_number"
                                  value="{{ $user->phone_number }}"
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
@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script>
            var locations = new Vue({
                el: "#locations",
                mounted() {
                    AOS.init();
                    this.getProvincesData();
                },
                data: {
                    provinces: null,
                    regencies: null,
                    provinces_id: null,
                    regencies_id: null,
                },
                methods: {
                  getProvincesData(){
                    var self = this;
                    axios.get('{{ route('api-provinces') }}')
                    .then(function(response){
                      self.provinces = response.data;
                    })
                  },
                  getRegenciesData(){
                    var self = this;
                    axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                    .then(function(response){
                      self.regencies = response.data;
                    })
                  },
                },
                watch: {
                  provinces_id: function(val, oldVal){
                    this.regencies_id = null;
                    this.getRegenciesData();
                  }
                },
            });
        </script>
        <script src="/script/navbar-scroll.js"></script>
@endpush