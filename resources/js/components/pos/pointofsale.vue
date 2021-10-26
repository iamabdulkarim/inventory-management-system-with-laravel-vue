<template>
  <div>
    <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">POS Dashboard</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">POS</li>
        </ol>
      </div>

      <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->

        <!-- Area Chart -->
        <div class="col-xl-5 col-lg-5">
          <div class="card mb-4">
            <div
              class="
                card-header
                py-3
                d-flex
                flex-row
                align-items-center
                justify-content-between
              "
            >
              <h6 class="m-0 font-weight-bold text-primary">
                Expense Insert
              </h6>
              <a class="btn btn-sm btn-info" href=""><font color="#fff"></font>Add customer</a>
            </div>
            
             
                <div class="table-responsive" style="font-size:12px">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="cart in carts" :key="cart.id">
                        <td>{{cart.pro_name}}</td>
                        <td><input type="text" readonly style="width:15px;" :value="cart.pro_quantity">
                            <button class="btn btn-sm btn-success" >+</button>
                            <button class="btn btn-sm btn-danger" >-</button>
                        </td>
                        <td>{{cart.product_price}}</td>
                        <td>{{cart.sub_total}}</td>
                        <td>X</td>
                      </tr>
                    
                    </tbody>
                  </table>
                </div>
                  
                <div class="card-footer">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">Total Quantity
                          <strong>56</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Sub Total
                          <strong>56</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Vat:
                          <strong>56</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Total Amount
                          <strong>56</strong>
                        </li>
                    </ul>
                    <br>
                    <form action="">
                      <label for="">Customer Name</label>
                      <select class="form-control" v-model="customer_id">
                        <option v-for="customer in customers" :key="customer.id" value="">{{customer.name}}</option>
                      
                      </select>
                      <label >pay</label>
                      <input type="text" class="form-control" required v-model="pay">
                      <label >due</label>
                      <input type="text" class="form-control" required v-model="due">
                      <label for="">Payment</label>
                      <select class="form-control" v-model="customer_id">
                        <option value="HandCash">Hand Cash</option>
                        <option value="Cheaque">Cheaque</option>
                        <option value="GiftCard">Gift card</option>
                      </select>

                      <br>
                      <button type="submit" class="btn btn-success">Submit</button>
                    </form>
     
                 </div>
            <div class="card-body">
              <div class="chart-area">

                

              </div>
            </div>
          </div>
        </div>
        <!-- Pie Chart -->
        <div class="col-xl-7 col-lg-7">
          <div class="card mb-4">
            <div
              class="
                card-header
                py-3
                d-flex
                flex-row
                align-items-center
                justify-content-between
              "
            >
              <h6 class="m-0 font-weight-bold text-primary">Products Sold</h6>
            </div>
            <!-- category wise product -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a
                  class="nav-link active"
                  id="home-tab"
                  data-toggle="tab"
                  href="#home"
                  role="tab"
                  aria-controls="home"
                  aria-selected="true"
                  >All Product</a
                >
              </li>
              <li
                class="nav-item"
                v-for="category in categories"
                :key="category.id"
              >
                <a
                  class="nav-link"
                  id="profile-tab"
                  data-toggle="tab"
                  href="#profile"
                  role="tab"
                  aria-controls="profile"
                  aria-selected="false"
                  @click="subProduct(category.id)"
                  >{{ category.category_name }}</a
                >
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div
                class="tab-pane fade show active"
                id="home"
                role="tabpanel"
                aria-labelledby="home-tab"
              >
                <div class="card-body">
                  <input
                    type="text"
                    v-model="searchTerm"
                    class="form-control"
                    style="width: 760px; margin-bottom: 10px"
                    placeholder="Search product"
                  />
                  <div class="row">
                    <div
                      class="col-lg-3 col-md-3 col-sm-6 col-6"
                      v-for="product in filtersearch"
                      :key="product.id"
                    >
                      <button class="btn btn-sm" @click.prevent="AddToCard(product.id)">
                        <div
                          class="card"
                          style="width: 8.5rem; margin-bottom: 10px"
                        >
                          <img
                            :src="product.image"
                            id="em_photo"
                            class="card-img-top"
                          />
                          <div class="card-body">
                            <h6 class="card-title">
                              {{ product.product_name }}
                            </h6>
                            <span
                              class="badge badge-success"
                              v-if="product.product_quantity >= 1"
                              >Avilable {{ product.product_quantity }}</span
                            >
                            <span class="badge badge-danger" v-else=""
                              >Stock Out</span
                            >
                          </div>
                        </div>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="profile"
                role="tabpanel"
                aria-labelledby="profile-tab"
              >
                <input
                  type="text"
                  v-model="getsearchTerm"
                  class="form-control"
                  style="width: 760px; margin-bottom: 10px"
                  placeholder="Search product"
                />
                <div class="row">
                  <div
                    class="col-lg-3 col-md-3 col-sm-6 col-6"
                    v-for="getproduct in getfiltersearch"
                    :key="getproduct.id"
                  >
                    <a href="#">
                      <div
                        class="card"
                        style="width: 8.5rem; margin-bottom: 10px"
                      >
                        <img
                          :src="getproduct.image"
                          id="em_photo"
                          class="card-img-top"
                        />
                        <div class="card-body">
                          <h6 class="card-title">
                            {{ getproduct.product_name }}
                          </h6>
                          <span
                            class="badge badge-success"
                            v-if="getproduct.product_quantity >= 1"
                            >Avilable {{ getproduct.product_quantity }}</span
                          >
                          <span class="badge badge-danger" v-else=""
                            >Stock Out</span
                          >
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- category wise product -->
          </div>
        </div>
        <!-- Invoice Example -->
      </div>
      <!--Row-->
    </div>
  </div>
</template>

<script type="text/javascript">
export default {
  created() {
    if (!User.loggedIn()) {
      this.$router.push({ name: "/" });
    }
  },
  created() {
    this.allProduct();
    this.allCategory();
    this.allCustomer();
    this.cartProduct();
    Reload.$on('AfterAdd',()=>{
      this.cartProduct();
    })
  },
  data() {
    return {
      products: [],
      categories: "",
      getproducts: [],
      searchTerm: "",
      getsearchTerm: "",
      customers: "",
      errors:"",
      carts:[]
    };
  },
  computed: {
    filtersearch() {
      return this.products.filter((product) => {
        return product.product_name.match(this.searchTerm);
      });
    },
    getfiltersearch() {
      return this.getproducts.filter((getproduct) => {
        return getproduct.product_name.match(this.getsearchTerm);
      });
    },
  },

  methods: {

     AddToCard(id){
        axios
        .get("/api/addToCart/" + id)
        .then(() => {
          Reload.$emit('AfterAdd');
           Notification.cart_success();
        })
        .catch();
      },
      cartProduct(){
        axios
        .get("/api/cart/product/")
        .then(({ data }) => (this.carts = data))
        .catch();
      },


    allProduct() {
      axios
        .get("/api/product/")
        .then(({ data }) => (this.products = data))
        .catch();
    },
    allCategory() {
      axios
        .get("/api/category/")
        .then(({ data }) => (this.categories = data))
        .catch();
    },
    allCustomer() {
      axios
        .get("/api/customer/")
        .then(({ data }) => (this.customers = data))
        .catch(console.log('error'));
    },
    subProduct(id) {
      axios
        .get("/api/getting/product/" + id)
        .then(({ data }) => (this.getproducts = data))
        .catch();
    },
  },
};
</script>

<style type="text/css" scoped>
#em_photo {
  height: 100px;
  width: 135px;
}
</style>
