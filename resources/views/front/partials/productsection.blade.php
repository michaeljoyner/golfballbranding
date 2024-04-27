<div id="products-section" class="w-section productsection">
    <h1 class="sectionheading">SELECT YOUR GOLF BALLS</h1>
    <div class="w-container productcontainer">
        @foreach($products->chunk(3) as $row)
            <div class="w-row productrow">
                @foreach($row as $product)
                    <div class="w-col w-col-4 productcolumn">
                        <div class="productdiv group">
                            <div class="product-image-box">
                                <img class="productimage" src="{{ $product->smallestImageSrc() }}">
                            </div>
                            <p class="producttext">{{ $product->name }}</p>
                            <a id="btn_{{ $product->id }}" data-product-id="{{ $product->id }}" class="button product product-btn" href="#">ADD TO QUOTE</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
