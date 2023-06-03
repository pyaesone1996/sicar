<div class="col-3">
    <div class="product-box product-style-5 border border-primary shadow mb-4">
        <div class="img-wrapper">
            <div class="front" style="height: 200px">
                <img alt="" src="{{ asset($image) }}" class="img-fluid"></a>
            </div>
        </div>
        <a href="product-page.html">
            <h6>{{ $name }}</h6>
        </a>
        <p class="mb-0"><span>Price / Day : </span>{{ $price }} $</p>
        <p class="mb-0"><span>FuelType : </span>{{ $fuelType }}</p>
        <p class="mb-0"><span>Seat : </span>{{ $seat }}</p>
        <p class="mb-0"><span>Mileage : </span>{{ $mileage }}</p>
        <p class=""><span>Category : </span>{{ $category }}</p>
        {{-- <p class=""><span>"Left/Right" : </span>{{ $side }}</p> --}}
        <div class="my-3">
            @if ($avaliable == 'true')
                <span class="badge bg-success">Avaliable</span>
            @else
                <span class="badge bg-danger">UnAvaliable</span>
            @endif
            </span>
        </div>
        <p style="height: 100px">
            {{ $description }}
        </p>

        <span class="badge badge-pill badge-primary">Primary</span>
        <div class="d-flex align-items-end">
            <div class="addtocart_btn">
                <form method="post" action="/cart">
                    @csrf
                    <input type="hidden" name="id" value="{{ $id }}" />
                    <input type="hidden" name="name" value="{{ $name }}" />
                    <input type="hidden" name="price" value="{{ $price }}" />
                    <input type="hidden" name="seat" value="{{ $mileage }}" />
                    <input type="hidden" name="category" value="{{ $category }}" />
                    <input type="hidden" name="image" value="{{ $image }}" />
                    <input type="hidden" name="perdays" value="1" />
                    <button class="add-button bg-primary add_cart" title="Add to cart">
                        <i class="fa fa-plus"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
