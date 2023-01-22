<form class="width flex flex-col justify-start items-center multi-form ovrflow-y-scroll max-h-screen" enctype="multipart/form-data">
    <div class="w-1/2">
        <div class="flex justify-between items-center border-2 p-3">
            <div>
                <i class="fa-solid fa-plus"></i>
                <span class="font-semibold">
                    Product <span class="product-counter">1</span>
                </span>
            </div>
            <i class="fa-solid fa-chevron-up"></i>
        </div>
        <div class="flex flex-col gap-5 border-2 border-t-0 p-3">
            <div class="flex flex-col gap-2">
                <label for="name" class="font-semibold">Name</label>
                <input class="p-2 border-2 rounded-md" type="text" name="name[]" required id="name" />
            </div>
            <div class="flex flex-col gap-2">
                <label for="price" class="font-semibold">Price</label>
                <input class="p-2 border-2 rounded-md" type="text" name="price[]" required id="price" />
            </div>
            <div class="flex flex-col gap-2">
                <label for="category" class="font-semibold">Category</label>
                <select name="category[]" required class="p-2 bg-white border-2 rounded-md" id="category">
                    <option value="shampo" selected>Shampo</option>
                    <option value="lotion">lotion</option>
                    <option value="creeme">creeme</option>
                </select>
            </div>
            <div class="flex flex-col gap-2">
                <label class="font-semibold" for="description">Description</label>
                <textarea name="description[]" required class="p-2 bg-white border-2 rounded-md"></textarea>
            </div>
            <input type="file" name="image[]" required />
        </div>
    </div>
    <div class="p-2 flex gap-5 buttons">
        <button class="bg-green-600 p-4 rounded-md text-white font-semibold">send</button>
        <span class="cursor-pointer bg-blue-600 p-4 rounded-md text-white font-semibold add-product">add another product</span>
    </div>
</form>