<x-landing-layout>
    <div class="shop-main">
        <div class="bag-product ratio_square pt-4">
            <div class="container-fluid p-0">
                <h5 class="mb-4">Shopping cart</h5>
                <div class="row" id="content">


                    <div x-data="cart()" x-init="fetchCartData()" class="">
                        <form action="/addtocarts" method="post">
                            @csrf
                            <div class="">

                                <div rclass="my-3">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Rental Days</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-for="cart in carts">

                                                <tr>
                                                    <td class="align-middle">
                                                        <span x-text="cart.name"></span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <img :src="cart.image" class="img-fluid"
                                                            style="width:200px" />
                                                    </td>
                                                    <td class="align-middle">
                                                        <span x-text="cart.category"></span>
                                                    </td>
                                                     <td class="align-middle">
                                                        <input type="hidden" x-model="cart.id" name="ids[]" />
                                                        <input type="number" name="perdays[]" x-model="cart.perdays"
                                                            min="1" class="form-control"
                                                            style="border-radius: 0px" placeholder="1" />
                                                    </td>
                                                     <td class="align-middle">
                                                        <span>$</span>
                                                        <span x-text="cart.perdays * cart.price"></span>
                                                    </td>
                                                     <td class="align-middle">
                                                        <button type="button" @click="removeItem(cart.id)"
                                                            class="btn btn-primary">
                                                            Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                            </template>

                                        </tbody>
                                    </table>
                                   
                                    </template>
                                </div>
                                <div class="px-4 py-1">
                                    <div class="d-flex justify-content-between">
                                        <p>Total</p>
                                        <p><span>$</span><span x-text="total"></span></p>
                                    </div>
                                    <div class="mt-3 d-flex justify-content-end">
                                        <button href="/checkout" class="btn btn-primary">
                                            Checkout
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <a class="d-flex justify-content-center  text-dark" href="/">Continue
                                        Shopping</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script>
          function cart() {
            return {
                carts: [],
                total: 0,
                // isChange: false,
                isUploading: false,
                removeItem: async function (id) {
                    this.isUploading = true;
                    const response = await fetch("/removeItem/" + id)
                        .then((r) => {
                            r.json();
                            window.location.reload();
                        })
                        .catch((e) => {
                            return null;
                        });
                    if (response) {
                        let newCarts = this.carts.filter(
                            (cart) => cart.id !== id
                        );
                        // calculate total
                        let total = newCarts.reduce(
                            (accumulator, item) =>
                                accumulator +
                                parseInt(item.price) * parseInt(item.perdays),
                            0
                        );
                        this.total = total;
                        this.carts = newCarts;

                        window.Alpine.store("totalCount").update(
                            this.carts.length
                        );
                        this.isUploading = false;
                    }
                    this.isUploading = true;
                },
                onChangeQty: function qty(id, qty) {
                    // this.isChange = true;
                },
                fetchCartData: async function () {
                    const carts = await fetch("/cart/api")
                        .then((r) => {
                           return r.json();
                        })
                        .catch((e) => {
                            return null;
                        });
                       

                    if (carts) {
                        console.log(carts);
                          console.log(typeof(carts));
                        this.carts = carts.map((cart) => {
                            return { ...cart, perdays: parseInt(cart.perdays) };
                        });
                        let total = carts.reduce(
                            (accumulator, item) =>
                                accumulator +
                                parseInt(item.price) * parseInt(item.perdays),
                            0
                        );
                         console.log(total);
                        this.total = total;
                        
                      
                    }
                    this.$watch("carts", async (newValue) => {
                        console.log(newValue[0].perdays);
                        this.isUploading = true;

                        const response = await fetch(
                            "/cart/update?perdays=" +
                                newValue[0].perdays +
                                "&id=" +
                                newValue[0].id
                        )
                            .then((r) => r.json())
                            .catch((e) => {
                                return null;
                            });
                        if (!response) {
                            return;
                        }

                        let total = this.carts.reduce(
                            (accumulator, item) =>
                                accumulator +
                                parseInt(item.price) * parseInt(item.perdays),
                            0
                        );
                        this.total = total;

                        this.isUploading = false;
                    });
                },
            };
        }
    </script>
</x-landing-layout>
