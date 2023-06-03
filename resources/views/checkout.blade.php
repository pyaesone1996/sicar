<x-landing-layout>
    <div x-data="checkout()">
        <div class="shop-main">
            <div class="bag-product ratio_square py-4">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-md-8">
                            <h5>Checkout</h5>
                            <form method="post" action="/checkout">
                                @csrf
                                <div class="mb-2">
                                    <label for="name" class="form-label">Username <span
                                            class="text-red-500">*</span></label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <input type="text" name="name" id="name" x-model="name"
                                            class="form-control" value="{{ old('name') }}" />
                                    </div>
                                    @if ($errors->has('name'))
                                        <div class="alert alert-danger text-red-500 text-base">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <label for="email" class="form-label">Email <span
                                            class="text-red-500">*</span></label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <input type="text" name="email" id="email" x-model="email"
                                            class="form-control" value="{{ old('username') }}" />
                                    </div>
                                    @if ($errors->has('email'))
                                        <div class="alert alert-danger text-red-500 text-base">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <label for="phone" class="form-label">Phone <span
                                            class="text-red-500">*</span></label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <input type="text" name="phone" id="phone" x-model="phone"
                                            class="form-control" value="{{ old('phone') }}" />
                                    </div>
                                    @if ($errors->has('phone'))
                                        <div class="alert alert-danger text-red-500 text-base">
                                            {{ $errors->first('phone') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <label for="address1" class="form-label">Address 1
                                        <span class="text-red-500">*</span></label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <input type="text" name="address1" id="address1" x-model="address1"
                                            class="form-control" value="{{ old('username') }}" />
                                    </div>
                                    @if ($errors->has('address1'))
                                        <div class="alert alert-danger text-red-500 text-base">
                                            {{ $errors->first('address1') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <label for="address2" class="form-label">Address
                                        2</label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <input type="text" name="address2" id="address2" x-model="address2"
                                            class="form-control" value="{{ old('address2') }}" />
                                    </div>
                                    @if ($errors->has('address2'))
                                        <div class="alert alert-danger text-red-500 text-base">
                                            {{ $errors->first('address2') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <label for="price" class="form-label">City <span
                                            class="text-red-500">*</span></label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <input type="text" name="city" id="city" x-model="city"
                                            class="form-control" value="{{ old('city') }}" />
                                    </div>
                                    @if ($errors->has('city'))
                                        <div class="alert alert-danger text-red-500 text-base">
                                            {{ $errors->first('city') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <label for="state" class="form-label">State <span
                                            class="text-red-500">*</span></label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <input type="text" name="state" id="state" x-model="state"
                                            class="form-control" value="{{ old('state') }}" />
                                    </div>
                                    @if ($errors->has('state'))
                                        <div class="alert alert-danger text-red-500 text-base">
                                            {{ $errors->first('state') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <label for="postal_code" class="form-label">postal code
                                        <span class="text-red-500">*</span></label>
                                    <div class="relative mt-2 rounded-md shadow-sm">
                                        <input type="text" name="postal_code" id="postal_code" x-model="postal_code"
                                            class="form-control" value="{{ old('username') }}" />
                                    </div>
                                    @if ($errors->has('postal_code'))
                                        <div class="alert alert-danger text-red-500 text-base">
                                            {{ $errors->first('postal_code') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop" @click="onSubmit">
                                        Submit
                                    </button>

                                </div>
                            </form>

                        </div>
                        <div class="col-md-4">
                            <div class="col-span-1">
                                <div class="shadow-md rounded-lg p-4 space-y-3">
                                    @foreach ($cars as $car)
                                        <div class="d-flex my-2">
                                            <div style="width: 500px">
                                                <img class="img-fluid" src="{{ $car['image'] }}" alt="Images" />
                                            </div>
                                            <div class="ps-3 d-flex flex-column" style="width: 500px">
                                                <h1 class="small">{{ $car['name'] }}</h1>
                                                <div>
                                                    <span class="text">
                                                        {{ $car['category'] }}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <span>Perday : {{ $car['perdays'] }}</span>
                                                    <span>$
                                                        {{ (int) $car['price'] * (int) $car['perdays'] }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="d-flex justify-content-between border-top border-primary p-3">
                                        <h1 class="small">Total</h1>
                                        <span>$ {{ $total }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->

        <!-- Modal -->
        <div x-show="isOpen">
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mt-2">
                                <template x-if="isFetch">
                                    <div>loading...</div>
                                </template>
                                <template x-if="!isFetch">
                                    <p class="text-sm text-gray-500">
                                        your total price is
                                        <span class="font-semibold">$</span>
                                        <span class="font-semibold" x-text="total"></span>
                                    </p>
                                </template>
                                <template x-if="count === 0">
                                    <p class="text-gray-500 text-sm mt-4">
                                        Note : $200 will be applied to
                                        new user
                                    </p>
                                </template>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <form method="post" action="/checkout">
                                @csrf
                                <input type="hidden" x-model="name" name="name" />
                                <input type="hidden" x-model="email" name="email" />
                                <input type="hidden" x-model="phone" name="phone" />
                                <input type="hidden" x-model="address1" name="address1" />
                                <input type="hidden" x-model="address2" name="address2" />
                                <input type="hidden" x-model="city" name="city" />
                                <input type="hidden" x-model="state" name="state" />
                                <input type="hidden" x-model="postal_code" name="postal_code" />
                                <button type="submit" class="btn btn-primary">
                                    Confirm
                                </button>
                            </form>

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        function checkout() {
            return {
                isOpen: false,
                count: 0,
                email: "",
                name: "",
                phone: "",
                address1: "",
                address2: "",
                city: "",
                state: "",
                postal_code: "",
                isFetch: false,
                total: 0,
                onSubmit: async function() {
                    if (this.email === "") {
                        $('.modal-backdrop').remove();
                        $('body').removeClass('modal-open');
                        $('body').removeAttr('style');
                        alert("please fill your email!");
                        return false;

                    }
                    this.isFetch = true;
                    this.isOpen = true;
                    const response = await fetch(
                        "/check/user?email=" + this.email
                    ).then((r) => r.json());
                    let total = response.total;
                    let count = response.count;
                    console.log(count);
                    if (total) {
                        this.total = parseInt(total);
                        this.count = parseInt(count);
                    }
                    this.isFetch = false;
                },
            };



        }
    </script>

</x-landing-layout>
